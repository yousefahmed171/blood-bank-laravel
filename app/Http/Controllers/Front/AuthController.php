<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    //

    public function register()
    {
        $cities =  City::pluck('name', 'id');
        $governorates =  Governorate::pluck('name', 'id');
        $bloodtypes = BloodType::pluck('name', 'id');
        return view('front.auth.register', compact('governorates', 'bloodtypes','cities'));
    }

    public function login()
    {
        return view('front.auth.login');
    }


    public function doLogin(Request $request){

        $this->validate($request,[
            'phone'         => 'required',
            'password'      => 'required',
        ]);

        //$rememberme = request('rememberme') == 1 ? true: false;
        if(Auth::guard('client')->attempt(['phone'=>request('phone'), 'password'=>request('password')])) {
          return   redirect('/');
        } else {
            session()->flash('error', ('admin errors'));
            return redirect('user/login');
        }
    }

    public function doRegister(Request $request)
    {
        $this->validate($request,[
            'name'                  => 'required',
            'email'                 => 'required|unique:clients',
            'phone'                 => 'required|unique:clients',
            'password'              => 'required|confirmed',
            'brith_date'            => 'required',
            'last_donation_date'    => 'required',
            'city_id'               => 'required',
            'blood_type_id'         => 'required',
        ]); 

        //dd($request->all());
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);

        $client->save();

        // Add id
        $client->governorates()->attach($request->city_id);
        $client->bloodTypes()->attach($request->blood_type_id);

        return redirect('user/login');
    }

    public function logout(){
        auth()->guard('client')->logout();
        return redirect('user/login'); 
    }
}
