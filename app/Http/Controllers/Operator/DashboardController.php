<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('operator.dashboard'); 
    }
    
        // Use ANY ONE ===> the above code OR below code
  
    //Second method to Redirect with Message ("STATUS") eg: welcome to dashboard
    protected function authenticated()
    {
        if(Auth::user()->role_id == '2') //1 = Admin Login
        {
            return redirect('dashboard')->with('status','Welcome to your dashboard');
        }
        elseif(Auth::user()->role_id == '0') // Normal or Default User Login
        {
            return redirect('/')->with('status','Logged in successfully');
        }
    }
}
