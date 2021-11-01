<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function getCountries()
    {
        $countries = DB::table('division')->pluck("name","id");
        return view('dropdown',compact('countries'));
    }
}



