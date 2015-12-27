<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use Hoteru\Repositories\ImagesRepository;

class ImagesController extends Controller
{
	protected $images;

	public function __construct(ImagesRepository $images){
		$this->images = $images;
	}
    
    public function index(){
    	return view('images.index');
    }

    public function create(){
    	return view('pixie.index');
    }

    public function saveAjax(Request $request)
    {
    	$filename = $request->get('name').'-'.uniqid(). '.'.$request->get('format');
    	$data = $request->get('data');
    	$data = file_get_contents($data);
    	file_put_contents(public_path().'/media/tmp/'.$filename,$data);
    	$image = new Image;
    	$image->name = $request->get('name');
    	$image->user_id = \Auth::user()->id;
    	$image->save();
    	$image->addMedia(public_path().'/media/tmp/'.$filename)->toMediaLibrary();
    }

    public function datatable(){
    	return $this->images->datatable();
    }

}
