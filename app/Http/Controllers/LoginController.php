<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function getloginscreen(){
        return view('Admin.admin-login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('admin-panel'));
        } else {
            return redirect()->back()->with('error', 'Giriş Yapılamadı. Lütfen bilgilerinizi kontrol edin.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('admin-login')->with('success', 'Oturum başarıyla kapatıldı.');
    }
}
