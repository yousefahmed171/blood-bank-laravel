<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Governorate;

class AuthController extends Controller
{
    //

    public function register()
    {
        $governorates =  Governorate::pluck('name', 'id');
        $bloodtypes = BloodType::pluck('name', 'id');
        return view('front.auth.register', compact('governorates', 'bloodtypes'));
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
  
        //$auth =  auth()->guard('client')->validate($request->all());
        //return responseJson(1, '', $auth);

        $client = Client::where('phone', $request->phone)->first();
        
        if($client)
        {
            if(Hash::check($request->password, $client->password))
            {
                session()->flash('success', 'تم تسجيل الدخول بنجاح ');
                return redirect('/');
            }else 
            {
                session()->flash('error', 'لم يتم  تسجيل الدخول بنجاح');
                return redirect('log');
            }
        }
        else 
        {
            session()->flash('error', 'لم يتم  تسجيل الدخول بنجاح');

            return redirect('logn');
        }
    }

    public function logout(){
        auth()->guard('client')->logout();
        return redirect('/'); 
    }
}
