<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index ()
    {
        return view('auth.login');
    }

    public function auth(Request $request){
        $credentials = $request->only('username', 'password');
  
        if(Auth::attempt($credentials)){
          return redirect()->intended('/dashboard');
        }
  
        return redirect()->back();
      }
}
