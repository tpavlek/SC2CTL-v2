<?php

namespace Depotwarehouse\SC2CTL\Web\Model\User;

use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\BattleNetUser;
use Depotwarehouse\Toolbox\DataManagement\Repositories\ActiveRepositoryAbstract;
use Depotwarehouse\Toolbox\DataManagement\Validation\NullValidator;

class BattleNetUserRepository extends ActiveRepositoryAbstract
{

    public function __construct(BattleNetUser $model, NullValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    /**
     * Checks if there exists a bnet_user using that particular, unique bnet_id.
     *
     * @param $bnet_id
     * @return bool
     */
    public function isAccountUsed($bnet_id)
    {
        return $this->model->where('bnet_id', $bnet_id)->count() > 0;
    }

}
