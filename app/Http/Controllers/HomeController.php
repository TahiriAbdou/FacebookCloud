<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function pages($slug){
    	return view("home/pages/$slug");;
    }
}
