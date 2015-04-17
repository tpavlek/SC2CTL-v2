<?php

namespace Depotwarehouse\SC2CTL\Web\Handlers\Events;

use Depotwarehouse\SC2CTL\Web\Events\ShareRequestEvent;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class ShareRequestMailer implements ShouldBeQueued
{

    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(ShareRequestEvent $shareRequestEvent)
    {
        $shareRequest = $shareRequestEvent->getShareRequest();
        $this->mailer->send(
            'emails.meetup.new_share_request',
            [ 'shareRequest' => $shareRequest ],
            function(Message $message) use ($shareRequest) {
                $message->to($shareRequest->get_requestee->email, $shareRequest->username);
                $message->subject("New share request from: {$shareRequest->get_requester->username}");
            }
        );
    }

}
