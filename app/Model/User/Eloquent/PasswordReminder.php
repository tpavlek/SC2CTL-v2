<?php

namespace Depotwarehouse\SC2CTL\Web\Model\User\Eloquent;

use Carbon\Carbon;
use Depotwarehouse\SC2CTL\Web\Model\BaseModel;

class PasswordReminder extends BaseModel
{
    const SECONDS_TO_EXPIRE = 600;

    public $table = "password_reminders";

    public function setUpdatedAtAttribute($value)
    {
        // We do nothing, we don't want updated at timestamps.
    }

    public function isStillValid()
    {
        /** @var Carbon $created_at */
        $created_at = $this->created_at;
        if (Carbon::now()->diffInSeconds($created_at) > self::SECONDS_TO_EXPIRE) {
            return false;
        }
        return true;
    }

}
