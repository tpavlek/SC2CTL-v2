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

    public function allFields()
    {
        $values = [];
        if ($this->email) {
            $values['email'] = $this->email;
        }

        if ($this->snapchat) {
            $values['snapchat'] = $this->snapchat;
        }

        if ($this->skype) {
            $values['skype'] = $this->skype;
        }

        if ($this->cell_phone) {
            $values['cell_phone'] = $this->cell_phone;
        }

        if ($this->twitter) {
            $values['twitter'] = $this->twitter;
        }

        if ($this->first_name) {
            $values['first_name'] = $this->first_name;
        }

        if ($this->last_name) {
            $values['last_name'] = $this->last_name;
        }

        return $values;
    }


}
