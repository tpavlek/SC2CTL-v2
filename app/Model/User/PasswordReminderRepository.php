<?php

namespace Depotwarehouse\SC2CTL\Web\Model\User;

use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\PasswordReminder;
use Depotwarehouse\Toolbox\DataManagement\Repositories\ActiveRepositoryAbstract;
use Depotwarehouse\Toolbox\DataManagement\Validation\NullValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PasswordReminderRepository extends ActiveRepositoryAbstract
{

    public function __construct(PasswordReminder $model, NullValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    /**
     * Generates a unique token to send in an email.
     *
     * @return string
     */
    public function generateToken()
    {
        return uniqid("reminder_");
    }

    /**
     * Creates a new PasswordReminder in the database.
     *
     * @param array $attributes
     * @return PasswordReminder
     */
    public function create(array $attributes)
    {
        $attributes = array_merge($attributes, ['token' => $this->generateToken()]);
        return parent::create($attributes);
    }

    /**
     * Finds a password reminder by it's token.
     *
     * @param $token
     * @return PasswordReminder
     * @throws PasswordReminderExpiredException
     * @throws ModelNotFoundException
     */
    public function findByToken($token)
    {
        /** @var PasswordReminder $reminder */
        $reminder = $this->model->newQuery()->where('token', $token)->firstOrFail();
        if (!$reminder->isStillValid()) {
            throw new PasswordReminderExpiredException();
        }

        return $reminder;
    }

}
