<?php

namespace Ricubai\PHPControllers;

class BaseController
{
    public static function display($tpl, $vars = []): void
    {
        extract($vars, EXTR_SKIP);
        require $tpl;
    }
}
