<?php

namespace Depotwarehouse\SC2CTL\Web\Model\User;

use Depotwarehouse\Toolbox\DataManagement\Validation\ValidationException;
use Depotwarehouse\Toolbox\DataManagement\Validation\Validator;

class UserValidator implements Validator
{

    /**
     * Validates the input based on creating a new object
     * @param array $input Key-value array of keys and their inputs
     * @return void
     * @throws \Depotwarehouse\Toolbox\DataManagement\Validation\ValidationException
     */
    public static function validate(array $input)
    {
        $rules = [
            'username' => 'required|alpha_dash|between:3,80|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ];

        $v = \Validator::make($input, $rules);

        if ($v->fails()) {
            throw new ValidationException($v);
        }
    }

    /**
     * Validates the input based on updating an existing object
     * @param array $input Key-value array of keys and their inputs
     * @param mixed $current_id The ID of the current model being updated.
     * @throws \Depotwarehouse\Toolbox\DataManagement\Validation\ValidationException
     * @return void
     */
    public static function updateValidate(array $input, $current_id)
    {
        $rules = [
            'username' => "alpha_dash|between:3,80|unique:users,username,{$current_id}",
            'email' => "email|unique:users,email,{$current_id}",
            'password' => 'confirmed',
        ];

        $v = \Validator::make($input, $rules);

        if ($v->fails()) {
            throw new ValidationException($v);
        }
    }
}
