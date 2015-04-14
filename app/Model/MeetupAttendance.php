<?php

namespace Depotwarehouse\SC2CTL\Web\Model;

use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MeetupAttendance extends Pivot
{

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
