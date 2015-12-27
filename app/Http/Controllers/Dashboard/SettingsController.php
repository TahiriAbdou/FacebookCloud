<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hoteru\Core;

class SettingsController extends Controller
{
    protected $core;

    public function __construct(Core $core)
    {
        $this->core = $core;
    }

    public function getMaintenance()
    {
        $maintenance = $this->core->getMaintenanceBody();
        return view('dashboard.settings.maintenance', compact('maintenance'));
    }

    public function postMaintenance(Request $request)
    {
        $maintenance = $this->core->getMaintenanceBody();
        if ($request->get('on')) {
            $this->core->turnOnMaintenanceMode($request->get('body'));
            \Session::flash('info', 'Maintenance mode is enabled now');
        } else {
            $this->core->turnOffMaintenanceMode();
            \Session::flash('info', 'Maintenance mode is disabled now');
        }
        return view('dashboard.settings.maintenance', compact('maintenance'));
    }

    public function getIndex()
    {
        $settings = $this->core->settings();
        return view('dashboard.settings.index', compact('settings'));
    }

    public function postIndex(Request $request)
    {
        $this->core->saveSettings($request->all());
        $settings = $this->core->settings();
        \Session::flash('success', 'Settings saved !');
        return view('dashboard.settings.index', compact('settings'));
    }
}
