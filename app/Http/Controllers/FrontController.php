<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hoteru\Page;
class FrontController extends Controller
{
    public function page($slug){
    	
    	return Page::where('slug',$slug)->firstOrFail();

    	return $slug;
    }

    public function city($slug){
    	return $slug;
    }
}
