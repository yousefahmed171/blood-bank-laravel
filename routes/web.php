<?php

use App\Models\Role;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    // if(auth()->guard('admin')->check())
    // {
    //     return view('admin.auth/login');
    // }
       
    // else
    //     return view('admin.auth/login');

    Route::get('admin/login', function () {
        return view('admin.auth/login');
    });

  

    Route::get('/', function () {
        return view('front.home');
    });
    
    //front
    Route::group([ 'namespace' => 'Front'], function(){ //'middleware' => 'auth:client',

        Route::get('/', 'MainController@home');

        Route::get('donation-requests', 'MainController@donationRequests');
        Route::get('donation-request/{id}', 'MainController@donationRequest');
        Route::get('donation-request-create', 'MainController@donationRequestCreate');
        Route::post('donation-request-store', 'MainController@donationRequestStore');
        Route::get('post/{id}', 'MainController@post');
        Route::get('contact', 'MainController@contact');
        Route::post('contact-send', 'MainController@contactSend');
        Route::get('about', 'MainController@about');

        Route::get('reg', 'AuthController@register');
        Route::get('log', 'AuthController@login');

        Route::post('log', 'AuthController@doLogin');
        Route::post('reg', 'AuthController@doRegister');

        Route::any('logout', 'AuthController@logout');

        


        

        Route::group(['middleware' => 'auth:client'], function(){ 

            Route::post('toggle-favourite', 'MainController@toggleFavourite');

            

        });
            
    });



    Auth::routes();


    Route::group(['middleware' => ['auth', 'auto-check-permission'], 'prefix'=>'admin'], function(){


        //home
        Route::get('home', 'HomeController@index')->name('home');

        Route::resource('governorate', 'GovernorateController'); 
        Route::resource('post', 'PostController');
        Route::resource('category', 'CategoryController');
        Route::resource('donation-request', 'DonationRequestController');
        Route::resource('client', 'ClientController');
        Route::resource('city', 'CityController');
        Route::resource('contact', 'ContactController');
        Route::resource('setting', 'SettingController');
        Route::resource('reset-password', 'ResetPaswwordController');
        Route::resource('user', 'UserController');
        Route::resource('role', 'RoleController');

        Route::put('de_active/{id}', 'ClientController@deActive');
        Route::put('active/{id}', 'ClientController@active');


    });