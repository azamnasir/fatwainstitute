<?php

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

    Route::get('/', function () {
        return view('auth/login');
    });

    Route::group(['namespace' =>'general' ], function () {
        Route::get('/privacy-policy', 'GeneralController@privacyPolicy');
        Route::get('/contact-us', 'GeneralController@contactUs');
        Route::get('/terms-and-services', 'GeneralController@termsServices');

    });

    Route::group(['namespace' =>'Auth' ], function () {

        Route::get('/login/{service}', 'LoginController@redirectToProvider');

    });

    Auth::routes();

    Route::group(['middleware' => 'auth'], function ()
    {
       Route::group(['prefix' => 'admin' , 'namespace' =>'admin' ], function ()
       {
           Route::get('/home', 'AdminController@index')->name('home');
       }) ;
    });

    Route::group(['middleware' => 'auth'], function ()
    {
        Route::group(['prefix' => 'mufti' , 'namespace' =>'mufti' ], function ()
        {
            Route::get('/home', 'MuftiController@index');
        }) ;
    });

    Route::group(['middleware' => 'auth'], function ()
    {
         Route::group(['prefix' => 'users' , 'namespace' =>'users' ], function ()
            {
                Route::get('/home', 'UsersController@index');
            }) ;
    });


//    Route::get('/home', 'HomeController@index')->name('home');
