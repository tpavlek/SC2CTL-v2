<?php

namespace Depotwarehouse\SC2CTL\Web\Model;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;

class ShareRequestObserver
{

    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function created(ShareRequest $model)
    {
        $this->mailer->send(
            'emails.meetup.new_share_request',
            [ 'share_request' => $model ],
            function(Message $message) use ($model) {
                $message->to($model->get_requestee->email, $model->username);
                $message->subject("New share request from: {$model->get_requester->username}");
            }
        );
    }

}
