<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'v1' , 'namespace' => 'Api'],  function () {

    //AuthController
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('reset-password', 'AuthController@reset');
    Route::post('new-password', 'AuthController@password');
    Route::get('get-client', 'AuthController@getClient');


    //MainController
    Route::get('governorates', 'MainController@governorates'); 
    Route::get('cities', 'MainController@cities'); 
    Route::get('settings', 'MainController@settings');
    

    
    Route::group(['middleware' => 'auth:api'], function(){

        //Auth 
        Route::post('edit-profile', 'AuthController@editProfile');
        Route::post('register-token', 'AuthController@registerToken');
        Route::post('remove-token', 'AuthController@removeToken');

        //Main
        Route::get('posts', 'MainController@posts');
        Route::get('post/{id}', 'MainController@post');
        Route::post('contact', 'MainController@contact');
        Route::post('post-favourites', 'MainController@postFavourites');
        Route::get('my-favourites', 'MainController@myFavourites');
        Route::post('donation_request/create', 'MainController@donationRequestCreate');
        Route::get('donation_request', 'MainController@donationRequest');

    });
    

});


