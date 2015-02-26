<?php

namespace Depotwarehouse\SC2CTL\Web\Model\User;

use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\User;
use Depotwarehouse\Toolbox\DataManagement\Repositories\ActiveRepositoryAbstract;

class UserRepository extends ActiveRepositoryAbstract
{

    public function __construct(User $model, UserValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }
}
