<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function  loginForm(){
        return view('admin.login');
    }

    public function  loginData(Request  $request)

    {

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
        ],[],[
//            'email'=>"Email Is Required",
//            'password'=>"Password Is InCorrect",
        ]);

 if(Auth::guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')] ))
 {
    return  redirect()->route('admin.dashboard');
 }
 else
 {
//dd($request->password);
     return redirect()->back()->with('message','Error Email Or Password');
 }

    }



    public  function logout(){
        auth()->logout();  return redirect()->route('login');
    }


}
