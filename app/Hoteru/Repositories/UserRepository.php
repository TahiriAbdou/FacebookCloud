<?php
namespace Hoteru\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\User;
use App\UserLog;
use Illuminate\Support\Facades\Request;
use Hoteru\Services\Utilities\GeoIP;
use Hoteru\Services\Utilities\UserAgent;
use Carbon\Carbon;

class UserRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return \App\User::class;
    }

    public function saveLog(User $user)
    {
        $user->logs()->save(new UserLog([
            'ip'            => Request::ip(),
            'country'       => GeoIP::countryByIp(),
            'browser'       => UserAgent::getBrowserName(),
            'user_agent'    => UserAgent::get()
        ]));
    }

    public function updateLog(User $user)
    {
        $user->last_login = Carbon::now();
        $user->last_ip = Request::ip();
        $user->save();
    }

    public function historyLog($limit=10){
        return $this->model->latest()->take($limit)->get();
    }
}
