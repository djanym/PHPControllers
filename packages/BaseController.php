<?php

namespace Ricubai\PHPControllers;

use eftec\bladeone\BladeOne;
use Exception;
use Ricubai\PHPHelpers\BladeExt;
use Ricubai\PHPHelpers\TemplateHelper;

class BaseController
{
    /**
     * @param string $tpl View name. For index.blade.php you should use $tpl = 'index'. Referrer to blade templating syntax.
     * @param array $vars
     * @throws Exception
     */
    public static function display($tpl, $vars = [], $return = false)
    {
        $views = TPLPATH;
        $cache = TPLPATH . '/cache';
        $blade = new BladeExt($views, $cache, BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
        $blade->pipeEnable = true;
        if (defined('SITE_URL')) {
            $blade->setBaseUrl(SITE_URL);
        }
//        $blade->setIsCompiled(false);
        if ($return) {
            return $blade->run($tpl, $vars);
        } else {
            echo $blade->run($tpl, $vars);
        }
    }

    public static function display403()
    {
        header(get_status_header_message(403), true, 403);
        self::display('page-403');
    }

    public static function display404()
    {
        header(get_status_header_message(404), true, 404);
        self::display('page-404');
    }
}
