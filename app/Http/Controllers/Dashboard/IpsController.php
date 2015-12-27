<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\BanIpRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hoteru\Repositories\IpRepository;

class IpsController extends Controller
{
	protected $ips;

	public function __construct(IpRepository $ips){
		$this->ips = $ips;
	}
    
    public function getIndex(){
        return view('dashboard.ips.index');
    }

    public function postIndex(BanIpRequest $request){
    	$this->ips->create($request->all());
        \Session::flash('info','This ip <b>'.$request->get('ip').'</b> is BANNED and Blacklisted !');
        return redirect('dashboard/ips');
    }

    public function getUnban($id){
        $this->ips->delete($id);
        \Session::flash('success','Unban succesful');
        return redirect('dashboard/ips');
    }

    public function datatable(){
    	return $this->ips->datatable();
    }
}
