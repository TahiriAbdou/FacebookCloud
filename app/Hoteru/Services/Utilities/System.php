<?php 
namespace Hoteru\Services\Utilities;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Request;
use Cache;

class System extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'utlities.system';
    }

    public static function freeDiskSpace()
    {
        if (!Cache::has('freeDiskSpace')) {
            Cache::put('freeDiskSpace', self::sizeCalculator(disk_free_space("/")), 120);
        }
        return Cache::get('freeDiskSpace');
    }

    public static function usedDiskSpaceByScript()
    {
        if (!Cache::has('usedDiskSpaceByScript')) {
            $bytestotal = 0;
            $path = realpath(base_path());
            if ($path!==false) {
                foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS)) as $object) {
                    $bytestotal += $object->getSize();
                }
            }

            Cache::put('usedDiskSpaceByScript', self::sizeCalculator($bytestotal), 180);
        }
        return Cache::get('usedDiskSpaceByScript');
    }

    public static function memoryUse()
    {
        if (!Cache::has('memoryUse')) {
            Cache::put('memoryUse', self::sizeCalculator(memory_get_usage(true)), 5);
        }
        return Cache::get('memoryUse');
    }

    public static function currentCpuLoad()
    {
        return (sys_getloadavg()[2] * 100) . '%';
    }

    public static function phpVersion()
    {
    	$v = phpversion();
    	$v = explode('-',$v);
        return current($v);
    }

    public static function mysqlVersion()
    {
        if (!Cache::has('MysqlVersion')) {
            $output = shell_exec('mysql -V');
            preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
            Cache::put('MysqlVersion', current($version), 5);
        }
        return Cache::get('MysqlVersion');
    }

    public static function serverIp()
    {
        return Request::server('SERVER_ADDR');
    }

    public static function sizeCalculator($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }
        return $bytes;
    }
}
