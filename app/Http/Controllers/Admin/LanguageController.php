<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{

    public function index(){
//        orderby('name','asc')->
        $languages=Language::paginate(PAGINATION_COUNT);
//        $languages=Language::active()->orderby('created_at','asc')->paginate(PAGINATION_COUNT);
        return view('admin.languages.index',compact('languages'));
    }

    public  function  create(){
        return view("admin.languages.create");

    }

    public function store(LanguageRequest  $request)
    {

//      $request  $request->validate([
//            'name'=>'required|max:15|string',
//            'abbr'=>'required|max:3|string',
//            'direction'=>'required|in:rtl,ltr',
//            'active'=>'required|in:0,1',
//        ],[],[]);
      Language::create($request->except(['_token']));

       return redirect()->route('admin.languages')->with('message','تم اضافه اللغه بنجاح');

    }
    public function edit($id){
        $lang= Language::find($id);
        if(is_null($lang))
        {
            return redirect()->route('admin.languages')->with('error',"هذه اللغه غير موجوده");
        }
        else
        {
           return  view('admin.languages.edit',compact('lang'));
        }
    }

    public function update(LanguageRequest  $request){
        $lang=Language::find($request->lang_id);
        if(is_null($lang))
        {
            return redirect()->route('admin.languages')->with('error',"هذه اللغه غير موجوده");
        }
        else
        {
            $lang->update($request->except(['_token']));
            return   redirect()->route('admin.languages')->with('message','تم تعديل اللغه بنجاح');
        }

    }

    public function  destroy($id){
        Language::destroy($id);
        return   redirect()->route('admin.languages')->with('message','تم حذف اللغه بنجاح');
    }
}
