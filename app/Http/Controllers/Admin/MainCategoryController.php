<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class MainCategoryController extends Controller
{
public function index(){
        $default_language=getDefLang();
//        return $default_language." IS Default Language";
        $maincats=MainCategory::
            where('translate_lang',$default_language)
            ->selection()->paginate(PAGINATION_COUNT);
        return view('admin.maincategories.index',compact(['maincats']));
    }

public  function  create(){
       return view('admin.maincategories.create');
    }

public  function  store(MainCategoryRequest  $request)
{

    try {

        $mainCats = collect($request->category);

        $filter = $mainCats->filter(function ($key, $value) {
            return $key['abbr'] == getDefLang();
        });

        $default_cat = array_values($filter->all())[0];
        $photoPath = '';
        if ($request->has('photo')) {
            $photoPath = uploadImage('maincategories', $request->photo);
        }

            DB::beginTransaction();

        $default_cat_id = MainCategory::insertGetId([
            "translate_lang" => $default_cat['abbr'],
            "translate_of" => 0,
            "name" => $default_cat['name'],
            "slug" => $default_cat['name'],
            "photo" => $photoPath,
        ]);


        $categories = $mainCats->filter(function ($key, $value) {
            return $key['abbr'] != getDefLang();
        });

        if (isset($categories) && $categories->count()) {
            $cats = [];
            foreach ($categories as $category) {
                $cats[] = [
                    "translate_lang" => $category['abbr'],
                    "translate_of" => $default_cat_id,
                    "name" => $category['name'],
                    "slug" => $category['name'],
                    "photo" => $photoPath,
                ];
            }
            MainCategory::insert($cats);

        }
        DB::commit();

        return redirect()->route('admin.maincategories')->with('message', 'تم اضافه القسم بنجاح');

    } catch (\Exception $ex) {
    DB::rollback();
        return redirect()->route('admin.maincategories')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');
    }

}

public  function  edit($mainCatID){
    try {
       $mainCategory=MainCategory::with('categories')->find($mainCatID);
        if(isset($mainCategory))
            return  view('admin.maincategories.edit',compact('mainCategory'));
//return  $categories;
        else

            return  redirect()->route('admin.maincategories')->with('error',"القسم غير موجود");
    }
    catch (\Exception $exception){

        return redirect()->route('admin.maincategories')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');
    }

}

public  function update(Request $request)
{
     try{
         $found=MainCategory::find($request->category_id);

        if($found)
        {
            $category=$request->category[0];
            $photoPath="";
            if ($request->hasFile('photo')) {



                  $photoPath = uploadImage('maincategories', $request->photo);
                  MainCategory::where('id',$found->id)->update([
                    'photo'=>$photoPath
                                    ]);


                  foreach (MainCategory::selection()->get() as $cat )
                  {
                      if($found->translate_of == $cat->id or  $cat->translate_of==$found->id )
                          $cat->update([
                              'photo'=>$photoPath
                          ]);

                  }


            }
//            else
//                $photoPath=$category->photo;

            MainCategory::where('id',$found->id)->update([
                "name"=>$category['name'],
//                "translate_lang"=>$category['translate_lang'],
                "active"=>$category['active'],
            ]);
            return  redirect()->route('admin.maincategories')->with('message',"تم تعديل القسم بنجاح ");
        }
        else

            return  redirect()->route('admin.maincategories')->with('error',"القسم غير موجود");

       }    catch (\Exception $exception){
//         return $exception;
         return redirect()->route('admin.maincategories')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');
    }

}

public function destroy($id){
    try {
        $category= MainCategory::find($id);
        if(is_null($category)) {
            return redirect()->back()->with('error', 'هذا القسم غير موجود او تم حذفه');
        }

         $vendors=$category->vendors;

        if(isset($vendors) && $vendors->count() > 0){
            return redirect()->back()->with('error', 'لا يمكن حذف هذا القسم لانه يحتوي علي متاجر');
        }
        else
            {
                $photo=  public_path($category->photo);
                unlink($photo);
                $category->delete();
                return redirect()->back()->with('message', ' تم حذف   القسم بنجاح');

            }

    }
    catch (\Exception $exception){
//        return $exception;
        return redirect()->route('admin.maincategories')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');

    }
}

public function activateOrDeactivate($id){
        try{
            $cat=MainCategory::find($id);
            if(!$cat)
                return  redirect()->route('admin.maincategories')->with('error',"القسم غير موجود");
            else{
                if($cat->active=='0')
                { $cat->update(['active'=>'1']);
                    return  redirect()->route('admin.maincategories')->with('message',"تم تفعيل القسم بنجاح ");
                }
                else { $cat->update(['active'=>'0']);
                    return  redirect()->route('admin.maincategories')->with('message',"تم الغاء تفعيل القسم بنجاح ");

                }


                }
        }
        catch (\Exception $ec){
            return redirect()->route('admin.maincategories')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');
        }

}

}


