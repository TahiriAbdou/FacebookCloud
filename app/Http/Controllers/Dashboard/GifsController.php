<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GifsController extends Controller
{
    public function index(){
    	return view('gifs.index');
    }

    public function datatable(){
    	return [];
    }
}
