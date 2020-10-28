<?php

namespace App\Http\Controllers\Api;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\Token;

class AuthController extends Controller
{

    
    public function getClient()
    {
        $getClients =  Client::all();
        return responseJson(1, 'success', $getClients);

    }


    public function register(Request $request)
    {
        //return $request->all();
        $validatorData  = validator()->make($request->all(),
        [
            'name'                  => 'required',
            'email'                 => 'required|unique:clients',
            'phone'                 => 'required|unique:clients',
            'password'              => 'required|confirmed',
            'brith_date'            => 'required',
            'last_donation_date'    => 'required',
            'city_id'               => 'required',
            'blood_type_id'         => 'required',

        ]);
        if($validatorData->fails())
        {
            return responseJson(0, $validatorData->errors()->first(), $validatorData->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);

        $client->save();

        // Add id
        $client->governorates()->attach($request->city_id);
        $client->bloodTypes()->attach($request->blood_type_id);

        
        

        return responseJson(1, 'success', [
            'api_token' => $client->api_token,
            'Client'    => $client
        ]);
       
    }


    public function login(Request $request)
    {
        $validatorData  = validator()->make($request->all(),
        [
            'phone'         => 'required',
            'password'      => 'required',
        ]);
        
        if($validatorData->fails())
        {
            return responseJson(0, 'Error In Validated Data',$validatorData->errors()->first, $validatorData->errors());
        } 


        //$auth =  auth()->guard('api')->validate($request->all());
        //return responseJson(1, '', $auth);

        $client = Client::where('phone', $request->phone)->first();
        
        if($client)
        {
            if(Hash::check($request->password, $client->password))
            {
                return responseJson(1, 'تم تسجيل الدخول ', [
                    'Api Token' => $client->api_token,
                    'Client'    => $client
                ]);
            }else 
            {
                return responseJson(0, 'بيانات الدخول غير صحيحة '); 
            }
        }
        else 
        {
            return responseJson(0, 'بيانات الدخول غير صحيحة '); 
        }
    

    }

    //Reset Password
    public function reset(Request $request)
    {
        $validatorData  = validator()->make($request->all(),
        [
            'phone'         => 'required'
        ]);
        
        if($validatorData->fails())
        {
            return responseJson(0, 'Error In Validated Data',$validatorData->errors()->first(), $validatorData->errors());
        } 


        $user = Client::where('phone', $request->phone)->first();
        
        if($user)
        {
            $code = rand(1111,9999);
            $update = $user->update(['pin_code' => $code]);

            if($update)
            {
                //send SMS

                //Send Email 

                Mail::to($user->email)
                    ->bcc("yousefahmed171@gmail.com")
                    ->send(new ResetPassword($user));

                return responseJson(1, 'رقم الهاتف صحيح  ', 
                [
                    'user' => $user , 
                    'update'=> $update, 
                    'code' => $code,
                    'email' => $user->email,
                ]);

            }else 
            {
                return responseJson(0, 'بيانات الهاتف غير صحيحة '); 
            }
        }
        else 
        {
            return responseJson(0, 'بيانات الهاتف غير صحيحة '); 
        }
    }

    //New Password
    public function password(Request $request)
    {

        $validatorData  = validator()->make($request->all(),
        [
            'pin_code'         => 'required',
            'phone'            => 'required',
            'password'         => 'required|confirmed',
            
        ]);

        if($validatorData->fails())
        {
            return responseJson(0, 'Error In Validated Data',$validatorData->errors()->first(), $validatorData->errors());
        } 

        $user = Client::where('pin_code', $request->pin_code)
                            ->where('pin_code', '!=',0)
                            ->where('phone', $request->phone)->first();

        if($user)
        {
            $user->password = bcrypt($request->password);

            $user->pin_code = null;

            if($user->save())
            {
                return responseJson(1, 'تم تغير كلمة المرور بنجاح  '); 
            }else {
                return responseJson(0, 'حدث خطأ , حاول مره آخرى  '); 
            }
        }else {
            return responseJson(00, 'هذه الكود غير صالح   '); 

        }


    }


    public function editProfile(Request $request)
    {
        $validatorData = validator()->make($request->all(),[

            'password'      => 'confirmed',
            'email'         => Rule::unique('clients')->ignore($request->user()->id),
            'phone'         => Rule::unique('clients')->ignore($request->user()->id),

        ]);

        if($validatorData->fails())
        {
        return responseJson(0, $validatorData->errors()->first(), $validatorData->errors());
        }

        $loginUser = $request->user();

        $request->merge([]);

        $loginUser->update($request->all());

        if($request->has('password'))
        {
            $loginUser->password = bcrypt($request->password);
        }

        $loginUser->save();


        if($request->has('city_id'))
        {
            $loginUser->governorates()->sync($request->city_id);
        }

        if($request->has('blood_type_id'))
        {
            $loginUser->bloodTypes()->sync($request->blood_type_id);
        }


        $data = [
            'user' => $request->user()->fresh()
        ];

        return responseJson(1,'تم تحديث البيانات بنجاح ',$data);

    }


    public function registerToken(Request $request)
    {
        $validatorData = validator()->make($request->all(),[

            'token'         => 'required',
            'type'          => 'required|in:android,ios'

        ]);

        if($validatorData->fails())
        {
        return responseJson(0, $validatorData->errors()->first(), $validatorData->errors());
        }

        Token::where('token', $request->token)->delete();
        $request->user()->tokens()->create($request->all());

        return responseJson(1,'تم التسجيل بنجاح ');

    }

    public function removeToken(Request $request)
    {
        $validatorData = validator()->make($request->all(),[

            'token'         => 'required'
        ]);

        if($validatorData->fails())
        {
        return responseJson(0, $validatorData->errors()->first(), $validatorData->errors());
        }

        Token::where('token', $request->token)->delete();

        return responseJson(1,'تم الحذف بنجاح ');
    }


}
