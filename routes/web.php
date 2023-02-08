<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
define('PAGINATION_COUNT',10);

 Auth::routes();
Route::get('/home', function (){
    return view('front.home');
})->name('home');
//Route::get('/home', function (){ return view('front.home');})->name('front.home');





//Route::get('/login', 'Admin\LoginController@loginForm')->name('admin.loginForm');


//################################Routes For Admin###########################################
Route::group(['namespace'=>'Admin','middleware'=>'guest:admin'],function (){

    Route::get('/login', 'AdminController@loginForm')->name('login');
    Route::post('/login', 'AdminController@loginData');


});


//    Start Logs
Route::group(['namespace'=>'Admin','middleware'=>"auth:admin"],function (){
    Route::get('/adminpage', function (){ return view('admin.dashboard');})->name('admin.dashboard');
    Route::get('/logout', 'AdminController@logout');

    //    End Logs

//  start Languages
    Route::group(['prefix'=>'languages'],function (){
Route::get('/alllanguages','LanguageController@index')->name('admin.languages');
Route::get('/createlanguage','LanguageController@create')->name('admin.languages.create');
Route::post('/storelanguage','LanguageController@store')->name('admin.languages.store');
Route::get('/editlanguage/{id}','LanguageController@edit')->name('admin.languages.edit');
Route::post('/updatelanguage','LanguageController@update')->name('admin.languages.update');
Route::get('/deletelanguage/{id}','LanguageController@destroy')->name('admin.languages.delete');

    });

//  End Languages



    //  start Main_Categories['prefix'=>'main_categories']
Route::group([],function (){
    Route::get('/allmaincategories','MainCategoryController@index')->name('admin.maincategories');
    Route::get('/createcategory','MainCategoryController@create')->name('admin.maincategories.create');
    Route::post('/storecategory','MainCategoryController@store')->name('admin.maincategories.store');
    Route::get('/editcategory/{id}','MainCategoryController@edit')->name('admin.maincategories.edit');
    Route::post('/updatecategory','MainCategoryController@update')->name('admin.maincategories.update');
    Route::get('/deletecategory/{id}','MainCategoryController@destroy')->name('admin.maincategories.delete');
    Route::get('/switchcategorystatus/{id}','MainCategoryController@activateOrDeactivate')
        ->name('admin.maincategories.switchcategorystatus');
});

//  End Main_Categories


    //  start Vendors'prefix'=>'vendors'
    Route::group([],function (){
    Route::get('/allvendors','VendorController@index')->name('admin.vendors');
    Route::get('/createvendor','VendorController@create')->name('admin.vendors.create');
    Route::post('/storvendor','VendorController@store')->name('admin.vendors.store');
    Route::get('/editvendor/{id}','VendorController@edit')->name('admin.vendors.edit');
    Route::post('/updatevendor','VendorController@update')->name('admin.vendors.update');
    Route::get('/deletevendor/{id}','VendorController@destroy')->name('admin.vendors.delete');
    Route::get('/switchstatus/{id}','VendorController@activateOrDeactivate')
        ->name('admin.vendors.switchvendorstatus');
});
//  End Vendors


    //  start Sub Categories 'prefix'=>'Sub Categories'
//    Route::group([],function (){
//        Route::get('/allsubcategories','SubCategoryController@index')->name('admin.subcategories');
//        Route::get('/createcategory','SubCategoryController@create')->name('admin.vendors.create');
//        Route::post('/storvendor','SubCategoryController@store')->name('admin.vendors.store');
//        Route::get('/editcategory/{id}','SubCategoryController@edit')->name('admin.vendors.edit');
//        Route::post('/updatecategory','SubCategoryController@update')->name('admin.vendors.update');
//        Route::get('/deletecategory/{id}','SubCategoryController@destroy')->name('admin.vendors.delete');
//        Route::get('/switchcategorystatus/{id}','SubCategoryController@activateOrDeactivate')
//            ->name('admin.vendors.switchcategorystatus');
//    });

     Route::get('/allsubcategories','SubCategoryController@index')->name('admin.subcategories');
//  End Sub Categories
Route::group([],function (){

  Route::get('/allsubcategories','SubCategoryController@index')->name('admin.subcategories');
   Route::get('/createsubcategory','SubCategoryController@create')->name('admin.subcategories.create');
   Route::post('/storesubcategory','SubCategoryController@store')->name('admin.subcategories.store');
   Route::get('/editsubcategory/{id}','SubCategoryController@edit')->name('admin.subcategories.edit');
   Route::post('/updatesubcategory','SubCategoryController@update')->name('admin.subcategories.update');
   Route::get('/deletesubcategory/{id}','SubCategoryController@destroy')->name('admin.subcategories.delete');
   Route::get('/switchstatus/{id}','SubCategoryController@activateOrDeactivate')
        ->name('admin.subcategories.switchsubcategorystatus');

    });

});




Route::get('/switchLangs',function (){

    switchLangs();

})->name('admin.languages.switch');

use App\Models\MainCategory;


Route::get('/test/{id}',function ($id){
    return MainCategory::findorfail($id)->getactive() ;
 
});
