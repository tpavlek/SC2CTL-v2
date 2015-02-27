<?php

namespace Depotwarehouse\SC2CTL\Web\Services\Mailers;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Log;
use URL;

/**
 * Class PasswordReminder
 * This class handles sending of emails whenever a user requests a password reset.
 * It should be registered as a model observer for the PasswordReminder model, which will in turn call the created method
 * once it has been serialized properly to the database.
 *
 * @package Depotwarehouse\SC2CTL\Web\Services\Mailers
 */
class PasswordReminder
{
    const EMAIL_VIEW = "emails.reminder";

    protected $mailer;

    public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function created(\Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\PasswordReminder $model)
    {
        Log::info("Mailing password reset to {$model->email}");

        $email = $model->email;

        $this->mailer->send(
            self::EMAIL_VIEW,
            [ 'reset_link' => URL::route('reminder.finalize_password', $model->token) ],
            function (Message $message) use ($email) {
                $message->to($email)->subject("SC2CTL Password Reset");
            }
        );
    }
}
