<?php 
namespace Hoteru\Services\Utilities;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Request;
use Location;

class GeoIP extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'utlities.geoip';
    }

    public static function get($ip=null)
    {
        return Location::get($ip ?: Request::ip());
    }

    public static function countryByIp($ip=null)
    {
        return 'N/A';
        return self::get($ip)->countryName!='' ? self::get($ip)->countryName : 'N/A';
    }
}
