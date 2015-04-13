<?php

namespace Depotwarehouse\SC2CTL\Web\Model\ContactRecord;

use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\User;
use Illuminate\Database\Eloquent\Model;

class ContactRecord extends Model
{

    public $table = "contact_records";

    public $fillable = [ "email", "snapchat", "skype", "cell_phone", "twitter", "first_name", "last_name", "user_id" ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
