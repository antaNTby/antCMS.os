<?php

/**
 * https://ned.im/noty/#/
 * https://github.com/needim/noty
 * https://daneden.github.io/animate.css/
 * A Dependency-free notification library
 * Class Noty
 */
class Noty
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
        $timeout,
        $layout
    )
    {
        echo '
    <script  type="module">
    import * as bsToast from "../admin/apps/Toasts/appToasts.js";
bsToast.showToast("'.$text.'","'.$type.'");
    </script>';
    }

}