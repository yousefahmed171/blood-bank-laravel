<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class MainController extends Controller
{
    ////{{url(route("toggle-favourite"))}}
    public function home(Request $request)
    {
        // $client = Client::first();
        // auth('client')->login($client);
        //search
        $result= DonationRequest::Filter($request);

        $posts = Post::take(9)->get();
        $donations = DonationRequest::take(4)->get();
        $bloodtypes = BloodType::all();
        $cities = City::all();
        return view('front.home', compact('posts', 'donations', 'bloodtypes', 'cities', 'result'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact', compact('about'));
    }

    public function contactSend(Request $request)
    {

        $this->validate($request, [

        ],[

        ]);
        $request->merge(['client_id' => $request->user('client')->id]); 
        $contact = Contact::create($request->all());
        $contact->save();
        return redirect('/');

    }

    public function post($id)
    {
        $post = Post::findOrFail($id);
        $model = Post::all();

        return view('front.post', compact('post', 'model'));
    }

    public function  donationRequestCreate()
    {
        $citites =  City::pluck('name', 'id');
        $bloodtypes = BloodType::pluck('name', 'id');
        return view('front.donation_request_create', compact('citites', 'bloodtypes'));
    }

    public function donationRequestStore(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'age'               => 'required:digits',
            'bags'              => 'required:digits',
            'hospital_address'  => 'required',
            'phone'             => 'required',
            'details'           => 'required',
            'blood_type_id'     => 'required|exists:blood_types,id',
            'city_id'           => 'required|exists:cities,id',


        ]);

        // Create Donation Request
        $donationRequest = $request->user('client')->donationRequest()->create($request->all());


        //find clients for donation request
        $clientsIds = $donationRequest->city->governorate->clients()
            ->whereHas('bloodTypes', function($q) use($request){
            $q->where('blood_types.id', $request->blood_type_id);

        })->pluck('clients.id')->toArray();

        if((count($clientsIds)))
        {
            //create a notifications on databases
            $notification = $donationRequest->notifications()->create([
                'title'           =>  'يوجد حالة تبرع قريبه منك ',
                'content'         =>  $donationRequest->bloodType->name . 'محتاج فصيلة دم ', 
            ]);

            $notification->clients()->attach($clientsIds);

            return responseJson(1, 'تم الاضافة بنجاح ', $notification);

        }

        return redirect('/');
        
    }


    public function donationRequests()
    {
        $donations = DonationRequest::paginate(3);
        $bloodtypes = BloodType::all();
        $cities = City::all();

        return view('front.donation_requests', compact('donations', 'bloodtypes', 'cities'));
    }

    public function donationRequest($id)
    {
        $donation = DonationRequest::findOrFail($id);

        return view('front.donation_request', compact('donation'));
    }

    public function toggleFavourite(Request $request)
    {
        $toggle = $request->user('client-web')->posts()->toggle($request->post_id); 
        return responseJson(1, 'success', $toggle);
    }


}
