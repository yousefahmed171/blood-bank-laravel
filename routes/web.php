<?php

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    if(Auth::check())
        return redirect('/home');
    else
        return view('auth/login');
});


Route::group(['middelware' => ['auth']], function(){
    
    //home
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('governorate', 'GovernorateController');
    Route::resource('post', 'PostController');
});

Auth::routes();

