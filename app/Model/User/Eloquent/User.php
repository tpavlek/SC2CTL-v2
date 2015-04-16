<?php

namespace Depotwarehouse\SC2CTL\Web\Model\User\Eloquent;

use Config;
use Depotwarehouse\SC2CTL\Web\Model\BaseModel;
use Depotwarehouse\SC2CTL\Web\Model\ContactRecord\ContactRecord;
use Depotwarehouse\SC2CTL\Web\Model\Meetup\Meetup;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel implements Authenticatable, CanResetPassword
{

    use \Illuminate\Auth\Authenticatable, SoftDeletes;

    protected $fillable = [ 'username', 'email', 'password' ];
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

    public function contact_record()
    {
        return $this->hasOne(ContactRecord::class, 'user_id', 'id');
    }

    public function contact_shares_requested()
    {
        return $this->belongsToMany(User::class, 'share_requests', 'requester', 'requestee')
            ->withTimestamps()
            ->withPivot([ 'id', 'meetup_id', 'share_data', 'accepted' ]);
    }

    public function contact_shares_received()
    {
        return $this->belongsToMany(User::class, 'share_requests', 'requestee', 'requester')
            ->withTimestamps()
            ->withPivot([ 'id', 'meetup_id', 'share_data', 'accepted' ]);
    }

    public function meetups()
    {
        return $this->belongsToMany(Meetup::class, 'meetup_attendees', 'user_id', 'meetup_id');
    }

    public function getAllAvailableContactFields()
    {
        return ContactRecord::allAvailableFields();
    }

    public function getAllContactFields()
    {
        $contact = $this->contact_record;

        if ($contact == null) { return []; }

        return $contact->allFields();
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
        return $this->getAttribute("email");
    }
}
