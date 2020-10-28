<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\DonationRequest;
use App\Models\Notification;
use App\Models\BloodType;
use App\Models\Token;



class MainController extends Controller
{

    // create contact
    public function contact(Request $request)
    {
        $validatorData = validator()->make($request->all(),[

        'subject' => 'required' ,
        'massage' => 'required',
        //'email'         => Rule::unique('clients')->ignore($request->user()->id),
        //'name'         => Rule::unique('clients')->ignore($request->user()->id),

        ]);
        //return $request->user()->id;
        if($validatorData->fails())
        {
            return responseJson(0, $validatorData->errors()->first(), $validatorData->errors());    
        }

        //$id = $request->user()->id;
        $request->merge(['client_id' => $request->user()->id]); 
        $contact = Contact::create($request->all());
        $contact->save();

        $contacts =  Contact::with('Client')->get();
        return responseJson(1, 'success', $contacts);

        //$contacts =  Contact::with('client')->get(); //paginate(10)
        //return responseJson(1, 'success', $contacts);

    }

    //get settings
    public function settings()
    {
        $settings =  Setting::all(); 
        return responseJson(1, 'success', $settings);
    }

    //get Notifications
    public function getNotifications()
    {
        $notifications =  Notification::with('clients')->get(); 
        return responseJson(1, 'success', $notifications);
    }

    //get BloodTypes
    public function getBloodTypes()
    {
        $getBloodTypes =  BloodType::all(); 
        return responseJson(1, 'success', $getBloodTypes);
    }

    //create posts
    public function posts()
    {
        $posts =  Post::with('category')->paginate(10); //paginate(10) //get mean all 
        return responseJson(1, 'success', $posts);
    }

    //get posts
    public function post($id)
    {
        $post =  Post::findOrFail($id);

        return responseJson(1, 'success', $post);
    } 

    //get governorates
    public function governorates()
    {
        $governorates =  Governorate::all(); //paginate(10)
        return responseJson(1, 'success', $governorates);
    }

    //if condation city
    public function cities(Request $request)
    {
        //$cities =  City::all(); //paginate(10)
        //use condation 
        // $cities =  City::where('governorate_id', $request->id)->get();
        //use filter if have id or not 
        $cities = City::where(function ($query) use($request){
            if ($request->has('governorate_id'))
            {
                $query->where('governorate_id', $request->governorate_id);
            }
        })->get();
        
        return responseJson(1, 'success', $cities);

    }

    // send my Favourites
    public function postFavourites(Request $request)
    {
        $validatorData = validator()->make($request->all(),[

            'post_id' => 'required|exists:posts,id' 

        ]);

        if($validatorData->fails())
        {
            return responseJson(0, $validatorData->errors()->first(), $validatorData->errors());    
        }

        $toggle = $request->user()->posts()->toggle($request->post_id); //where('titile', 'like', 'dom')

        return responseJson(1, 'success', $toggle);

    }
    
    //Get Favourites 
    public function myFavourites(Request $request)
    {

        $favourites = $request->user()->posts()->latest()->paginate(10); 

        return responseJson(1, 'success', $favourites);

    }


    public function donationRequestCreate(Request $request)
    {
        $validatorData = validator()->make($request->all(),
        [
            'name'              => 'required',
            'age'               => 'required:digits',
            'bags'              => 'required:digits',
            'hospital_address'  => 'required',
            'phone'             => 'required',
            'details'           => 'required',
            'latitude'          => 'required', 
            'longitude'         => 'required',
            'blood_type_id'     => 'required|exists:blood_types,id',
            'city_id'           => 'required|exists:cities,id',


        ]);

        if($validatorData->fails())
        {
            return responseJson(0, $validatorData->errors()->first(), $validatorData->errors());    
        }

        // Create Donation Request
        $donationRequest = $request->user()->donationRequest()->create($request->all());

        //return responseJson(1, 'success',$donationRequest);    


        //find clients for donation request
        $clientsIds = $donationRequest->city->governorate->clients()
            ->whereHas('bloodTypes', function($q) use($request){
            $q->where('blood_types.id', $request->blood_type_id);

        })->pluck('clients.id')->toArray();

        //return responseJson(1, 'success',$clientsIds);

        if((count($clientsIds)))
        {
            //create a notifications on databases
            $notification = $donationRequest->notifications()->create([
                'title'           =>  'يوجد حالة تبرع قريبه منك ',
                'content'         =>  $donationRequest->blood_type_id . 'محتاج فصيلة دم ', 
            ]);

            //return responseJson(1, 'success',$notification);
            //dd($notification);

            $notification->clients()->attach($clientsIds);

            return responseJson(1, 'تم الاضافة بنجاح ', $notification);

            // // get tokens for FCM (push notification using Firebase cloud ) 
            // $tokens = Token::whereIn('client_id', $clientsIds)->where('token', '!=', null)->pluk('token')->toArray();
            // if(count($tokens))
            // {
            //     $title  = $notification->title;
            //     $body   = $notification->content; 
            //     $data   = [
            //         'donation_request_id'  => $donationRequest->id
            //     ];

            //     //$send = notifyByFirebase($title, $body, $tokens, $data);
            // }

        }
        //return responseJson(1, 'تم الاضافة بنجاح ', $send);
        
    }
    //get Donation Request
    public function donationRequest(Request $request)
    {
        $donationRequests = DonationRequest::all(); //all
        
        return responseJson(1, 'success', $donationRequests);
    }

}

