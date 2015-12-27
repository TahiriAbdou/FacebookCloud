<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hoteru\Repositories\FacebookRepository;

class FacebookController extends Controller
{

    protected $facebook;

    public function __construct(FacebookRepository $facebook)
    {
        $this->facebook = $facebook;
    }
    
    public function login()
    {
        return Socialite::driver('facebook')->scopes(['publish_pages','manage_pages'])->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->user();
        \Session::put('facebook.token',$user->token);
        return redirect('facebook/import');
    }

    public function import()
    {
        return $this->facebook->getPages();
    }
}
