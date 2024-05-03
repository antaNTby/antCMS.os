<?php
### ФУНКЦИИ
include_once 'core/functions/crypto_functions.php';
include_once 'core/functions/registration_functions.php';
include_once 'core/functions/session_functions.php';
include_once 'core/functions/debug_functions.php';
include_once 'core/functions/admin_functions.php';

function get_microtime()
{
    $t         = explode(' ', microtime());
    $timestamp = date('Y-m-d H:i:s', $t[1]) . substr((string) $t[0], 1, 4);
    return $timestamp;
}

function gmts()
{
    list($usec, $sec) = explode(' ', microtime(true));
    return $usec + $sec;
}

function key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
    {
        return 0;
    }
    elseif ($key1 > $key2)
    {
        return 1;
    }
    else
    {
        return -1;
    }
}

