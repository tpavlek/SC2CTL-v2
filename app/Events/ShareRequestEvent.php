<?php

namespace Depotwarehouse\SC2CTL\Web\Events;

use Depotwarehouse\SC2CTL\Web\Model\ShareRequest;

class ShareRequestEvent
{

    protected $shareRequest;

    public function __construct(ShareRequest $shareRequest)
    {
        $this->shareRequest = $shareRequest;
    }

    public function getShareRequest()
    {
        return $this->shareRequest;
    }

}
