<?php

namespace Depotwarehouse\SC2CTL\Web\Model;

use Depotwarehouse\SC2CTL\Web\Model\Meetup\Meetup;
use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ShareRequest extends Pivot
{

    public function get_requester()
    {
        return $this->belongsTo(User::class, 'requester', 'id');
    }

    public function get_requestee()
    {
        return $this->belongsTo(User::class, 'requestee', 'id');
    }

    public function meetup()
    {
        return $this->belongsTo(Meetup::class, 'meetup_id', 'id');
    }

    /**
     * Get a key => value array of the name of each piece of shared data and its value.
     *
     * @return array
     */
    public function getShareData()
    {
        $fields = explode(",", $this->share_data);

        $data = [];
        $requester_contact = $this->get_requester->contact_record;

        if ($requester_contact == null) {
            return [];
        }

        foreach ($fields as $field) {
            $data[$field] = $requester_contact->{$field};
        }

        return $data;
    }

}
