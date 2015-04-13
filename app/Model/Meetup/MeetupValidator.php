<?php

namespace Depotwarehouse\SC2CTL\Web\Model\Meetup;

use Depotwarehouse\Toolbox\DataManagement\Validation\Validator;

class MeetupValidator implements Validator
{


    /**
     * Validates the input based on creating a new object
     * @param array $input Key-value array of keys and their inputs
     * @return void
     * @throws \Depotwarehouse\Toolbox\DataManagement\Validation\ValidationException
     */
    public static function validate(array $input)
    {
        // TODO: Implement validate() method.
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
        // TODO: Implement updateValidate() method.
    }
}
