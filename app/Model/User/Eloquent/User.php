<?php

namespace Depotwarehouse\SC2CTL\Web\Model\User\Eloquent;

use Config;
use Depotwarehouse\SC2CTL\Web\Model\BaseModel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel implements Authenticatable, CanResetPassword
{

    use \Illuminate\Auth\Authenticatable, SoftDeletes;

    protected $hidden = [ 'password' ];

    public function getProfileImgAttribute()
    {
        $img_path = Config::get('storage.user_profile_img_path');

        if (file_exists(public_path() . $img_path . "uid_{$this->id}.jpg")) {
            return $img_path . "uid_{$this->id}.jpg";
        }
        return $img_path . "uid_0.jpg";
    }

    public function hasActiveNotifications()
    {
        // TODO must implement this.
        return false;
    }

    public function bnet()
    {
        return $this->hasOne(BattleNetUser::class, 'user_id', 'id');
    }

    public function team()
    {
        return $this->belongsToMany(Team::class, 'team_enrollments', 'team_id', 'id');
    }

    public function hasTeam()
    {
        return $this->team()->count() > 0;
    }

    /**
     * Get the team the user is enrolled on.
     *
     * @return Team
     */
    public function getTeam()
    {
        return $this->team()->first();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles', 'role_id', 'id');
    }

    /**
     * Is the user on a team right now?
     *
     * @return bool
     */
    public function currentlyOnATeam()
    {
        return $this->team()->count() > 0;
    }

    public function hasConnectedBattleNet()
    {
        return $this->bnet()->count() > 0;
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }
}
