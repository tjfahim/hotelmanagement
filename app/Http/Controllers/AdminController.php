<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Cookie;
use Illuminate\Support\Facades\Cookie as FacadesCookie;

class AdminController extends Controller
{
    //login
    function login(){
        return view('login');
    }
    //check login
    function check_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])
            ->count();
            if($admin>0){
                $adminData=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])
                 ->get();
            session(['adminData'=>$adminData]);
            if($request->has('rememberme')){
                Cookie::queue('adminuser',$request->username,1440);
                Cookie::queue('adminpwd',$request->password,1440);
            }

            return redirect('admin');
            }else{
                return redirect('admin/login')->with('msg','Invalid Username/Password');
            }


    }
     //logout
     function lgout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
