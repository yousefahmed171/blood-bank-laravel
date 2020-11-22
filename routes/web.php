<?php

use App\Models\Role;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('front.home');
    });

    Auth::routes();

    // Front
    Route::group([ 'namespace' => 'Front'], function(){ 
        // MainController
        Route::any('/', 'MainController@home');
        Route::any('donation-requests', 'MainController@donationRequests');
        Route::get('donation-request/{id}', 'MainController@donationRequest');
        Route::get('post/{id}', 'MainController@post');
        Route::get('contact', 'MainController@contact');
        Route::get('about', 'MainController@about');
        Route::post('search','MainController@search');
        // AuthController
        Route::get('user/register', 'AuthController@register');
        Route::post('user/register', 'AuthController@doRegister');
        Route::get('user/login', 'AuthController@login');
        Route::post('user/login', 'AuthController@doLogin');
        Route::any('user/logout', 'AuthController@logout');
        // Middleware Auth
        Route::group(['middleware' => 'front:client'], function(){ 
            Route::any('toggle-favourite', 'MainController@toggleFavourite')->name('toggle-favourite');
            Route::post('donation-request-store', 'MainController@donationRequestStore');
            Route::post('contact-send', 'MainController@contactSend');
            Route::get('donation-request-create', 'MainController@donationRequestCreate');
        });
    });



 

    // Admin
    Route::get('admin/login', function () {
        return view('admin.auth/login');
    });

    Route::get('admin/register', function () {
        return view('admin.auth/register');
    });

    // Admin Group
    Route::group(['middleware' => ['auth', 'auto-check-permission'], 'prefix'=>'admin'], function(){
        
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