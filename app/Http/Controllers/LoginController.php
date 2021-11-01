<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __construct()
    {
        if(Auth::check() && Auth::user()->role_id == 1){
            $this->redirectTo = route('admin.dashboard');
        } elseif(Auth::check() && Auth::user()->role_id == 2){
            $this->redirectTo = route('operator.dashboard');
        }
       
        $this->middleware('guest')->except('logout');
    }
}
