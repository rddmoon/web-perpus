<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
      return view('auths.login');
    }
    public function postLogin(Request $request)
    {
      if(Auth::attempt($request->only('email','password')))
      {
        $data_role = auth()->user()->role;
        $myid = auth()->user()->id;
        if($data_role == 'member'){
          return redirect('/member-profile/'.$myid);
        }
        elseif($data_role == 'staff'){
          return redirect('/staff-profile/'.$myid);
        }
        else {
          {
            return redirect('/admin-profile/'.$myid);
          }
        }
      }
      return redirect('/login');
    }
    public function logout()
    {
      Auth::logout();
      return redirect('/login');
    }
    public function register()
    {
      return view('auths.register');
    }
}
