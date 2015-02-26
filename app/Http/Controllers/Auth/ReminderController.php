<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers\Auth;

use Depotwarehouse\SC2CTL\Web\Http\Controllers\Controller;
use Depotwarehouse\SC2CTL\Web\Model\User\PasswordReminderExpiredException;
use Depotwarehouse\SC2CTL\Web\Model\User\PasswordReminderRepository;
use Depotwarehouse\SC2CTL\Web\Model\User\UserRepository;
use Depotwarehouse\Toolbox\DataManagement\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\MessageBag;
use Input;
use Redirect;
use View;

class ReminderController extends Controller
{

    protected $reminderRepository;
    protected $userRepository;

    public function __construct(UserRepository $repository, PasswordReminderRepository $reminderRepository)
    {
        $this->userRepository = $repository;
        $this->reminderRepository = $reminderRepository;
    }

    /**
     * Show the form to allow user to request a password reset.
     *
     * @return \Illuminate\View\View
     */
    public function start_reset()
    {
        return View::make('reminder.start_reset');
    }

    /**
     * [POST] The postback received after the user requests a reset. This will send the email, or return an error.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send_token()
    {
        $email = Input::get('email');
        try {
            $user = $this->userRepository->findByEmail($email);

            // The mailer is watching for events on our PasswordReminder model. It should handle sending of the email.
            $this->reminderRepository->create([ 'email' => $email ]);

            return Redirect::route('home.index')->withErrors(new MessageBag([
                'success' => "Password reminder email has been sent!"
            ]));
        } catch (ModelNotFoundException $exception) {
            return Redirect::route('reminder.start_reset')
                ->withErrors(new MessageBag([
                    'errors' => "Could not find any account with that email address"
                ]));
        } catch (ValidationException $exception) {
            return Redirect::route('reminder.start_reset')
                ->withErrors($exception->get());
        }
    }

    /**
     * Displays the form for the user to enter their new password. Will redirect to the beginning with errors if
     * there was a problem with the token.
     *
     * @param $token
     * @return View|Redirect
     */
    public function finalize_password($token)
    {
        try {
            $reminder = $this->reminderRepository->findByToken($token);
            return View::make('reminder.finalize_password')
                ->with('token', $token);
        } catch (ModelNotFoundException $exception) {
            return Redirect::route('reminder.start_reset')->withErrors(new MessageBag([
                'errors' => "We could not find a reset session that matches that token."
            ]));
        } catch (PasswordReminderExpiredException $exception) {
            return Redirect::route('reminder.start_reset')->withErrors(new MessageBag([
                'errors' => "That password reset token has expired. Please restart the process."
            ]));
        }
    }

    /**
     * [POST] Finalizes the password reset process by actually updating the user record with the new password.
     *
     * We will update the user record with a new password, delete the password reset token so that it can't be reused,
     * and then log in the newly passworded user.
     *
     * @return Redirect
     */
    public function complete_reset()
    {
        $token = Input::get('token');
        $password = Input::get('password');
        $password_confirmation = Input::get('password');
        try {
            $reminder = $this->reminderRepository->findByToken($token);

            try {
                $user = $this->userRepository->findByEmail($reminder->email);
                $this->userRepository->update(
                    $user->id,
                    [ 'password' => $password, 'password_confirmation' => $password_confirmation ]
                );
                $reminder->delete();

                Auth::login($user);
                return Redirect::route('user.show', $user->id);

            } catch (ModelNotFoundException $exception) {
                return Redirect::route('reminder.start_reset')->withErrors(new MessageBag([
                    'errors' => "There doesn't seem to be a user account associated with that email address"
                ]));
            } catch (ValidationException $exception) {
                return Redirect::route('reminder.start_reset')->withErrors($exception->get());
            }

        } catch (ModelNotFoundException $exception) {
            return Redirect::route('reminder.start_reset')->withErrors(new MessageBag([
                'errors' => "We could not find a reset session that matches that token."
            ]));
        } catch (PasswordReminderExpiredException $exception) {
            return Redirect::route('reminder.start_reset')->withErrors(new MessageBag([
                'errors' => "That password reset token has expired. Please restart the process."
            ]));
        }
    }

}
