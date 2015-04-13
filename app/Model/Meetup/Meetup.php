<?php

namespace Depotwarehouse\SC2CTL\Web\Model\Meetup;

use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\User;
use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{

    protected $fillable = [ "name", "location", "date" ];

    public function getDates()
    {
        return [ 'created_at', 'updated_at', 'date' ];
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'meetup_attendees', 'meetup_id', 'user_id');
    }

    public function isAttending(User $user)
    {
        return $this->attendees->contains($user->id);
    }
}
