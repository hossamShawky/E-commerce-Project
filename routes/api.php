<?php

use   App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('testApi',function (){

return MainCategory::where('translate_of',0)->count();

});



Route::get('/maincategories', function(){
    return MainCategory::where('translate_of',0)->get();
 });
