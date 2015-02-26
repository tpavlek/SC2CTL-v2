<?php

namespace Depotwarehouse\SC2CTL\Web\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof User || $parent instanceof Team || $table == "team_enrollments") {
            return new Enrollment($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }
}
