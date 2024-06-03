<?php

/**
 * Class Toasts for php Alerts
 */
class Toasts
{
    /**
     * @param $type
     * @param $text
     * @param $timeout
     * @param $layout
     */

    public static function run(
        $type,
        $text,
        $urlToRedirect,
        $timerSec=30
    )
    {

        $script = <<<js
<script type='module'>
import * as bsToast from "../admin/apps/Toasts/appToasts.js";
const phpToast = bsToast.showToast('{$text}','{$type}');
// document.getElementById('toast-container').innerHtml=phpToast;
 </script>
js;
        echo $script;
    }

}