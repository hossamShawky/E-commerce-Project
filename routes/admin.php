<?php

use Illuminate\Support\Facades\Route;



//################################Routes For Admin###########################################
Route::group(['namespace'=>'Admin','middleware'=>'guest:admin'],function (){

    Route::get('/login', 'LoginController@loginForm')->name('login');
    Route::post('/login', 'LoginController@loginData');


});

Route::group(['namespace'=>'Admin','middleware'=>"auth:admin",],function (){

    Route::get('/adminpage', function (){ return view('admin.dashboard');})->name('admin.dashboard');
    Route::get('/logout', function (){
        auth()->logout();
//      return "You Logged Out";
        return redirect()->route('login');
    });




});


