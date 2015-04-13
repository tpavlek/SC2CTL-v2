<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers;

use Depotwarehouse\SC2CTL\Web\Model\ContactRecord\ContactRecordRepository;
use Depotwarehouse\SC2CTL\Web\Model\User\UserRepository;
use Depotwarehouse\Toolbox\DataManagement\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\MessageBag;

class ContactRecordController extends Controller
{

    /**
     * @var ContactRecordRepository;
     */
    protected $contactRecordRepository;

    public function __construct(ContactRecordRepository $contactRecordRepository)
    {
        $this->contactRecordRepository = $contactRecordRepository;
    }

    public function update($user_id, Redirector $redirector, Request $input)
    {
        //TODO ensure that the user ID is the currently authenticated user.
        try {
            $this->contactRecordRepository->updateOrCreate($user_id, $input->all());

            return $redirector->route('user.edit', $user_id)->withErrors(
                new MessageBag([
                    'success' => "Updated your contact record!"
                ])
            );
        } catch (ValidationException $exception) {
            return $redirector->route('user.edit', $user_id)->withErrors($exception->get());
        }
    }

}
