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
        $urlToRedirect
    )
    {

        $script = <<<text
<script  type='module'>
import * as bsToast from "../admin/apps/Toasts/appToasts.js";
bsToast.showToast('{$text}','{$type}');
 </script>
text;
        echo $script;
        echo '<meta http-equiv="refresh" content="2;URL=' . $urlToRedirect . '">';
    }

}