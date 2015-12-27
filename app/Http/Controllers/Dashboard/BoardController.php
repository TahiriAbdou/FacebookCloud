<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hoteru\Repositories\UserRepository;

class BoardController extends Controller
{
	protected $users;

	public function __construct(UserRepository $users){

		$this->users = $users;
	}

    public function index(){

    	return view('dashboard.board.index');
    }
}
