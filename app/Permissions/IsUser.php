<?php

namespace Depotwarehouse\SC2CTL\Web\Permissions;

use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\User;
use Illuminate\Contracts\Auth\Guard;

trait IsUser
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Looks at the current authentication session, and returns if the current user matches the passed in User.
     *
     * @param User|int $user
     * @return bool
     */
    public function isUser($user)
    {
        $user_id = null;

        if (is_numeric($user)) {
            $user_id = $user;
        } else {
            $user_id = $user->id;
        }

        return ($this->auth->check() && $this->auth->user()->id == $user_id);
    }


}
