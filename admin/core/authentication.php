<?php
# сбрасываем время сессии
session_cache_expire();

# стартуем сессию
define('SECURITY_EXPIRE', 60 * 60 * CONF_SECURITY_EXPIRE);
session_set_save_handler('sess_open', 'sess_close', 'sess_read', 'sess_write', 'sess_destroy', 'sess_gc');

# посылаем cookie сессии
if (isset($_COOKIE['PHPSESSID']))
{
    if (SECURITY_EXPIRE > 0)
    {
        set_cookie('PHPSESSID', $_COOKIE['PHPSESSID'], time() + SECURITY_EXPIRE);
    }
    else
    {
        set_cookie('PHPSESSID', $_COOKIE['PHPSESSID']);
    }
}
session_set_cookie_params(SECURITY_EXPIRE);
session_start();

if (isset($_GET['logout'])) //user logout
{
    unset($_SESSION['log']);
    unset($_SESSION['pass']);

    RedirectJavaScript(ADMIN_FILE . '?access_deny=' . SITE_URL);
}
elseif (isset($_POST['enter']) && !isset($_SESSION['log'])) //user login
{
    if (regAuthenticate($_POST['user_login'], $_POST['user_pw']))
    {
        if (!isset($_POST['order']))
        {
            if (in_array(100, $relaccess))
            {
                Redirect(ADMIN_FILE);
            }
            else
            {
                Redirect(ADMIN_FILE . '?user_details=yes');
            }
        }
    }
    else
    {
        $wrongLoginOrPw = 1;
    }
}

$relaccess = checklogin();

if ((!isset($_SESSION['log']) || !in_array(100, $relaccess)))
{
    if (isset($_POST['user_login']) && isset($_POST['user_pw']))
    {
        if (regAuthenticate($_POST['user_login'], $_POST['user_pw']))
        {
            Redirect(set_query('&__tt='));
        }
        exit(ERROR_FORBIDDEN);
    }
    exit(ERROR_FORBIDDEN);
}
