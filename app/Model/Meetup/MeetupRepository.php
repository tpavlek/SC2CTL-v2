<?php

namespace Depotwarehouse\SC2CTL\Web\Model\Meetup;

use Depotwarehouse\Toolbox\DataManagement\Repositories\ActiveRepositoryAbstract;

class MeetupRepository extends ActiveRepositoryAbstract
{

    public function __construct(Meetup $model, MeetupValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    /**
     * @param $name
     * @return Meetup
     */
    public function findByName($name)
    {
        return $this->model->where('name', $name)->firstOrFail();
    }

}
