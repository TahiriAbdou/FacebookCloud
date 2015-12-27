<?php 
namespace Hoteru;

class Core
{
    public function getLocales()
    {
        return \Hoteru\Language::activeLanguages()->where('locale', '<>', \App::getLocale())->lists('locale');
    }

    public function getAllLocales()
    {
        return \Hoteru\Language::activeLanguages()->lists('locale');
    }

    public function isIpBlacklisted($ip)
    {
        return \Hoteru\Ip::where('ip', $ip)->exists();
    }

    public function allowedForMaintenance()
    {
        return ! in_array(\Request::ip(), config('core.allowed_ips'));
    }

    public function checkMaintenance()
    {
        return
            \Cache::get('maintenance.on') &&
            \App::isDownForMaintenance() &&
            self::allowedForMaintenance();
    }

    public function getMaintenanceBody()
    {
        return \Cache::get('maintenance.body');
    }

    public function turnOnMaintenanceMode($body)
    {
        \Hoteru\Maintenance::create(compact('body'));
        \Cache::forever('maintenance', [
            'on'    => true,
            'body'  => $body
        ]);
        return \Artisan::call('down');
    }

    public function turnOffMaintenanceMode()
    {
        \Cache::forever('maintenance.on', false);
        return \Artisan::call('up');
    }

    public function settings($key=false)
    {
        if (!$key) {
            return \Cache::get('settings');
        }
        return \Cache::get('settings.'.$key);
    }

    public function saveSettings(array $attributes){
        $attributes = array_except($attributes,['_token']);
        return \Cache::forever('settings',$attributes);
    }
}
