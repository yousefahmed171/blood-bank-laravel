<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Support\Facades\Auth;

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


        //$rememberme = request('rememberme') == 1 ? true: false;
        if(Auth::guard('client')->attempt(['phone'=>request('phone'), 'password'=>request('password')])) {
          return   redirect('/');
        } else {
            session()->flash('error', ('admin errors'));
            return redirect('user/login');
        }
  
        //$auth =  auth()->guard('client')->validate($request->all());
        //return responseJson(1, '', $auth);

        // $client = Client::where('phone', $request->phone)->first();
        
        // if($client)
        // {
        //     if(Hash::check($request->password, $client->password))
        //     {
        //         session()->flash('success', 'تم تسجيل الدخول بنجاح ');
        //         return redirect('/');
        //     }else 
        //     {
        //         session()->flash('error', 'لم يتم  تسجيل الدخول بنجاح');
        //         return redirect('user/login');
        //     }
        // }
        // else 
        // {
        //     session()->flash('error', 'لم يتم  تسجيل الدخول بنجاح');

        //     return redirect('user/login');
        // }
    }

    public function logout(){
        auth()->guard('client')->logout();
        return redirect('user/login'); 
    }
}
