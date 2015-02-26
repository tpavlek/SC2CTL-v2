<?php

namespace Depotwarehouse\SC2CTL\Web\Model\User;

use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\User;
use Depotwarehouse\Toolbox\DataManagement\Repositories\ActiveRepositoryAbstract;
use Depotwarehouse\Toolbox\DataManagement\Validation\ValidationException;
use Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository extends ActiveRepositoryAbstract
{

    public function __construct(User $model, UserValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    /**
     * Create a new user record (including hashing of the password).
     *
     * @param array $attributes
     * @return User
     * @throws ValidationException
     */
    public function create(array $attributes)
    {
        $this->validator->validate($attributes);

        $attributes['password'] = Hash::make($attributes['password']);

        $model = $this->model->create($attributes);

        return $model;
    }

    /**
     * @param mixed $id
     * @param array $attributes
     * @return int|void
     * @throws ValidationException
     */
    public function update($id, array $attributes = array()) {
        // Throws a ModelNotFoundException if the model does not exist
        $object = $this->find($id);

        // Throws a ValidationException if validation fails
        $this->validator->updateValidate($attributes, $id);

        $attributes['password'] = Hash::make($attributes['password']);

        $object->update($attributes);
    }

    /**
     * Finds a user by their Email address.
     *
     * @param $email
     * @throws ModelNotFoundException
     * @return User
     */
    public function findByEmail($email)
    {
        return $this->model->newQuery()->where('email', $email)->firstOrFail();
    }
}
