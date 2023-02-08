<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function  index(){
$subcategories=SubCategory::
                where('translate_lang',getDefLang())->selection()->paginate(PAGINATION_COUNT);

return view('admin.subcategories.index',compact('subcategories'));

    }


    public  function  create(){
        echo "create";
    }

    public  function  store(){
        echo "store";
    }

    public  function  edit(){
        echo "edit";
    }

    public  function  update(){
        echo "update";
    }

    public  function  destroy($id){
        return SubCategory::find($id);
    }

public  function activateOrDeactivate($id){
        echo "Switch Status";
}
}
