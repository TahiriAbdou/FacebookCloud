<?php

namespace App\Handlers\Events;

use App\Events;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Hoteru\Repositories\UserRepository;

class AuthLoginEventHandler
{
    protected $users;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the event.
     *
     * @param  Events  $event
     * @return void
     */
    public function handle(User $user, $remember)
    {
        if ($user->isAdmin()) {
            $this->users->saveLog($user);
        }

        $this->users->updateLog($user);
    }
}
