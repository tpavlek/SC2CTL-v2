<?php

namespace Depotwarehouse\SC2CTL\Web\Model\ContactRecord;

use Depotwarehouse\Toolbox\DataManagement\Repositories\ActiveRepositoryAbstract;

class ContactRecordRepository extends ActiveRepositoryAbstract
{

    public function __construct(ContactRecord $model, ContactRecordValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    public function updateOrCreate($user_id, array $attributes)
    {
        $attributes['user_id'] = $user_id;
        /** @var \Illuminate\Database\Eloquent\Collection $exists */
        $exists = $this->model->where('user_id', $user_id)->get();

        if ($exists->count() > 0) {
            $contact_record = $exists->first();
            return $this->update($contact_record->id, $attributes);
        }

        return $this->create($attributes);
    }

}
