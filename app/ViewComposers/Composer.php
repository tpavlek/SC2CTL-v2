<?php

namespace Depotwarehouse\SC2CTL\Web\ViewComposers;

use Illuminate\View\View;

abstract class Composer
{

    /**
     * Handles the content of the view and composes any required data.
     *
     * @param View $view
     * @return mixed
     */
    abstract function compose(View $view);

} 
