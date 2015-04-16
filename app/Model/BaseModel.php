<?php

namespace Depotwarehouse\SC2CTL\Web\Model;

use Depotwarehouse\SC2CTL\Web\Model\Meetup\Meetup;
use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\User;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        /*if (($parent instanceof User || $parent instanceof Meetup) && $table == "meetup_attendees") {
            return new MeetupAttendance($parent, $attributes, $table, $exists);
        }*/

        if (($parent instanceof User || $parent instanceof Meetup) && $table == "share_requests") {
            return new ShareRequest($parent, $attributes, $table, $exists);
        }

        /*if (($parent instanceof User || $parent instanceof Team) && $table == "team_enrollments") {
            return new Enrollment($parent, $attributes, $table, $exists);
        }*/


        return parent::newPivot($parent, $attributes, $table, $exists);
    }
}
