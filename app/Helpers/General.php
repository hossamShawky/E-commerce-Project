<?php

use Illuminate\Support\Facades\Config;

function getLanguages(){
    $languages=App\Models\Language::active()->get();
    return $languages;
}
function getDefLang()
{
    return Config::get('app.locale');
}
function switchLangs(){

    echo ("<br>Current Locale Lange :   ".Config::get('app.locale'));
     getDefLang()=='ar' ? app()->setLocale('en'):app()->setLocale('ar');
//
//
    echo ("<br>New Locale Lange  :    ".Config::get('app.locale'));

}

function uploadImage($folder,$image){
    $image->store('/',$folder);
    $filename=$image->hashName();
    $path='images/'.$folder.'/'.$filename;

    return $path;

}



