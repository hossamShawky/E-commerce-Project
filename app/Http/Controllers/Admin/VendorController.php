<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\MainCategory;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function index(){
        $vendors=Vendor::selection()->paginate(PAGINATION_COUNT);
        return view('admin.vendors.index',compact('vendors'));
    }
    public function create(){
        $categories=MainCategory:: where('translate_of',0)->active()->get();
        return view('admin.vendors.create',compact('categories'));
    }
    public function  store(VendorRequest $request){

        try {
            $logopath="";
           if($request->has('logo'))
             {
                 $logopath= uploadImage('vendors',$request->logo);
             }


           Vendor::create([
                "logo"=>$logopath,
                "name"=>$request->name,
                "mobile"=>$request->mobile,
                "address"=>$request->address,
                "email"=>$request->email,
                "category_id"=>$request->category_id,
                "active"=>$request->active,
                "password"=>$request->password,
            ]);
            return redirect()->route('admin.vendors')->with('message','تم اضافه المتجر بنجاح');

           }
        catch (\Exception $e){

            return redirect()->route('admin.vendors')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');
        }
    }
    public function edit($id){
        try {

            $vendor = Vendor::find($id);
            if(is_null($vendor)){
                return redirect()->route('admin.vendors')->with('error','هذا المتجر غير موجود او تم حذفه');}
                else{
                    $categories=MainCategory:: where('translate_of',0)->active()->get();
                    return  view('admin.vendors.edit',compact('vendor','categories'));
                }
        }
        catch (\Exception $ex){

            return redirect()->route('admin.vendors')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');

        }
    }
    public function update(VendorRequest $request){

        try {
            $vendor = Vendor::find($request->vendor_id);
            if(is_null($vendor)){
                return redirect()->route('admin.vendors')->with('error','هذا المتجر غير موجود او تم حذفه');
                    }
            else{

                DB::beginTransaction();

                if($request->hasFile('logo')) {

                     $logopath=uploadImage('vendors',$request->logo);
                      $vendor->update(['logo'=>$logopath]);
//                      return  $vendor;
                }

               $data=$request->except('_token','id','password','logo');
                if($request->has('password')) {
                    $data['password']=$request->password;
                }

                $vendor->update($data);

                DB::commit();
                return redirect()->route('admin.vendors')->with('message','تم تحديث المتجر بنجاح');

            }
        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.vendors')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');

        }
    }

    public function destroy($id){
        try {
            $vendor= Vendor::find($id);
            if(is_null($vendor)) {
                return redirect()->back()->with('error', 'هذا المتجر غير موجود او تم حذفه');
            }


//            if(isset($vendors) && $vendors->count() > 0){
//                return redirect()->back()->with('error', 'لا يمكن حذف هذا المتجر لانه يحتوي علي منتجات');
//            }
//            else
//            {
                $logo=  public_path($vendor->logo);
                unlink($logo);
                $vendor->delete();
                return redirect()->back()->with('message', ' تم حذف   المتجر بنجاح');

//            }

        }
        catch (\Exception $exception){
//        return $exception;
            return redirect()->route('admin.vendors')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');

        }
    }
    public function activateOrDeactivate($id){
        try{
            $vendor=Vendor::find($id);
//            return  var_dump($vendor->active);
            if(!$vendor)
                return  redirect()->route('admin.vendors')->with('error',"المتجر غير موجود");
            else{

if($vendor->mainCategory->active=="1")
{
    if($vendor->active=='0')
    { $vendor->update(['active'=>'1']);
        return  redirect()->route('admin.vendors')->with('message',"تم تفعيل المتجر بنجاح ");
    }
    else {

        $vendor->update(['active'=>'0']);
        return  redirect()->route('admin.vendors')->with('message',"تم الغاء تفعيل المتجر بنجاح ");

    }
}
else
{

    return redirect()->route('admin.vendors')->with('error','عفوا,لا يمكن تفعيل هذا المتجر لان القسم الاساسي له غير مفعل');
}


            }
        }
        catch (\Exception $ec){
            return redirect()->route('admin.vendors')->with('error','عفوا,لقد وقع خطأ قم بالمحاوله لاحقا');
        }

    }

}


