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

    }

}
