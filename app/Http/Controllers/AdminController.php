<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['signin','signin_post']);
    }
    public function signin()
        {
            if( Session::has('admin_email')){
                return redirect('/admin'); 
            }else{
                return view('admin.signin') ;
            }
        }

        function signin_post(Request $request){
           $admin=Admin::where('email','=',$request->email)->first();
           if($admin){
               if($admin->password==$request->password){
                   Session::put('admin_name',$admin->name);
                   Session::put('admin_email',$admin->email);
                   Session::put('admin_password',$admin->password);
                   Session::put('admin_image',$admin->image);
                return redirect('/admin')->with('status', 'Login successfully'); 
               }else{
                return redirect()->back()->with('status', 'Wrong password'); 
               }
           }else{
            return redirect()->back()->with('status', 'Wrong email address'); 
           }
        }
        function signout(){
            Session::put('admin_email',null);
           return  redirect('/')->with('status', 'Admin Sign out successfully'); 
        }
        
        function dashboard()
        {
            return view('admin.dashboard');
            
        }
        function edit()
        {
            return view('admin.edit');
            
        }
        

}
