<?php

include_once 'core/const.php';    // управляющие и служебные константы
include_once 'core/orklang.php';  // строки текста
include_once 'core/settings.php'; // настройки
include_once 'core/functions.php';
include_once 'core/headers.php';
include_once 'core/tables.php';

#composer
require_once '../vendor/autoload.php';

// cd domains
// cd antCMS.os
// composer require twbs/bootstrap
// composer require smarty/smarty
// composer require twbs/bootstrap-icons
// composer require --dev symfony/var-dumper


# The VarDumper component provides mechanisms for extracting the state out of any PHP variables.
# Built on top, it provides a better dump() function that you can use instead of var_dump

# mysqli DataBase
require 'core/mysqli.php';

$sc_1 = gmts();
$sc_4 = 0;
$sc_8 = 0;
$gmc  = 1;

$IS_WINDOWS = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
define('PATH_DELIMITER', isWindows() ? ';' : ':');

# сбрасываем время сессии
session_cache_expire();

@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies', 1);
@ini_set('session.use_only_cookies', 1);
@ini_set('session.auto_start', 0);
@ini_set('magic_quotes_gpc', 0);
@ini_set('magic_quotes_runtime', 0);
@ini_set('register_globals', 0);
@ini_set('display_errors', 1);

error_reporting(1);
error_reporting(E_ALL & ~E_NOTICE);

$_POST   = stripslashes_deep($_POST);
$_GET    = stripslashes_deep($_GET);
$_COOKIE = stripslashes_deep($_COOKIE);

# подключамся к  БД
require 'core/classes/antDataBase.php';
$DB         = new antDataBase();
$linkMysqli = db_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or exit(ERROR_DB_INIT);
db_select_db($linkMysqli, DB_NAME) or exit(db_error());

if (isset($_GET['db']))
{
    $url = 'adminer.php?username=' . DB_USER . '&db=' . DB_NAME; //adminer.php?username=nixby_dbadmin&db=db_antCMS&table=ant_customers
    Redirect($url);
}

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

### //init Smarty 5.1
use Smarty\Smarty;
$smarty = new Smarty();
$smarty->setTemplateDir('../admin/tpl');              // здесь лежат шаблоны tpl.html
$smarty->setCompileDir('../admin/core/cache/php');    // здесь компилируюся *.php
$smarty->setConfigDir('../admin/tpl/smarty_config/'); // незнаю
$smarty->setCacheDir('../admin/core/cache/');
$smarty->compile_id    = 'ant';
$smarty->force_compile = ADMIN_SMARTY_FORCE_COMPILE;
// $smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
// $smarty->setCaching(Smarty::CACHING_LIFETIME_SAVED);
// $smarty->testInstall();
//define default smarty template
$smarty->assign('admin_main_content_template', 'default.tpl.html');



dump($_SESSION);

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

### define department and subdepartment
//define department and subdepartment
if (!isset($_GET['dpt']))
{
    $dpt = isset($_POST['dpt']) ? $_POST['dpt'] : '';
}
else
{
    $dpt = $_GET['dpt'];
}

if (!isset($_GET['sub']))
{
    if (isset($_POST['sub']))
    {
        $sub = $_POST['sub'];
    }
}
else
{
    $sub = $_GET['sub'];
}
$smarty->assign('current_dpt', $dpt);

if (isset($_GET['table']))
{
    $table_mode = 1;
    $subTables  = array();
    require 'core/classes/class.adminSSP.php';

    $PDO_connect = array(
        'user'           => DB_USER,
        'pass'           => DB_PASS,
        'db'             => DB_NAME,
        'host'           => DB_HOST,
        'charset'        => 'utf8mb3',
        'headersCharset' => 'utf8',
    );

    $smarty->assign('subTables', $subTables);
    $smarty->assign('table_mode', $table_mode);

}
else
{
    $table_mode = 0;
}

if (isset($_GET['edit_id']))
{
    $editID = (int)$_GET['edit_id'];
    if ($editID > 0)
    {
        $smarty->assign('editID', $editID);
        $smarty->assign('selectedID', $editID);
    }
}

$pathToIncludesDirectory = 'core/includes/';
include_once 'core/adminDepartmensDescription.php';
$Departments       = array();
$Departments       = ADMIN_DEPARTMENTS;
$admin_departments = array();

foreach ($Departments as $index => $admin_dpt)
{
    add_department($admin_dpt);
    //show department if it is being selected
    if ($dpt == $admin_dpt['id'])
    {
        // если в запросе нету sub то выбираем дефолтный , если и его нету то нулевой

        $sub = isset($sub) ? $sub : selectDefaultSub($admin_dpt['sub_departments']);

        $smarty->assign('current_sub', $sub);

        // есть ли php для выбранного суб?
        $phpFileName = $pathToIncludesDirectory . $admin_dpt['id'] . '_' . $sub . '.php';
        $tplFileName = $admin_dpt['id'] . '.tpl.html';
        if (file_exists($phpFileName))
        {
            //assign admin main department template
            if (file_exists('tpl/' . $tplFileName))
            {
                $smarty->assign('admin_main_content_template', $tplFileName);
            }
            else
            {
                $smarty->assign('admin_main_content_template', 'standartdpt.tpl.html');
            }
            //assign subdepts
            $smarty->assign('admin_sub_departments', $admin_dpt['sub_departments']);
            //include selected sub-department
            include $phpFileName;
        }
        else
        {
            //no sub department found
            $smarty->assign('admin_main_content_template', 'notfound.tpl.html');
        }
        $smarty->assign('current_dpt_name', $admin_dpt['name']);
    }
}

$antMenu = flatAdminDepartments($Departments);
$smarty->assign('antMenu', $antMenu);

if (isset($_SESSION['log']))
{
    $smarty->assign('admintempname', $_SESSION['log']);
}

//show Smarty output
try
{
    $smarty->display('admin.tpl.html');
}
catch (SmartyException $e)
{
    $smarty->assign('smarty_error', true);
    $smarty->assign('smarty_error_message', $e->getMessage());
}

if (ADMIN_SMARTY_LOG_VARS)
{
    $all_tpl_vars = $smarty->getTemplateVars();
    smartylog($all_tpl_vars);
}
