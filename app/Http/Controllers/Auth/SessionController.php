<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function index(){
        return view("auth/login");
    }
public function authenticate(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->intended('/articles');
    }else{
        return redirect()->intended('/login');

    }
}

public function logout()
{
    Auth::logout();

    return redirect('/');
}
}
