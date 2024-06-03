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
        $timerSec=100
    )
    {

        $script = <<<text
<input id="toastTimer" name="toastTimer" type=hidden value={$timerSec}>

<script type='module'>

import * as bsToast from "../admin/apps/Toasts/appToasts.js";
const phpToast = bsToast.showToast('{$text}','{$type}');
document.getElementById('toast-container').innerHtml=phpToast;


 </script>
text;
        echo $script;
        RedirectMetaRefresh($urlToRedirect, $timer=$timerSec);
    }

}