<?php
# сбрасываем время сессии

include_once 'core/const.php';    // управляющие и служебные константы
include_once 'core/errors.php';   // обработка ошибок
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

// composer require datatables.net-bs5
// composer require datatables.net-buttons-bs5
// composer require datatables.net-datetime
// composer require datatables.net-fixedcolumns-bs5
// composer require datatables.net-fixedheader-bs5
// composer require datatables.net-keytable-bs5
// composer require datatables.net-responsive-bs5
// composer require datatables.net-rowgroup-bs5
// composer require datatables.net-rowreorder-bs5
// composer require datatables.net-scroller-bs5
// composer require datatables.net-searchbuilder-bs5
// composer require datatables.net-searchpanes-bs5
// composer require datatables.net-select-bs5
// composer require datatables.net-staterestore-bs5

// $ composer self-update
// Upgrading to version 2.7.6 (stable channel).

# The VarDumper component provides mechanisms for extracting the state out of any PHP variables.
# Built on top, it provides a better dump() function that you can use instead of var_dump

// npm
//  Открываем закладку Сервер
//  Затем Настройка использования переменной Path -> выбираем из этого списка Свой Path + userdata/config/path.txt + Win Path
// d:\OSPanel\userdata\config\path.txt  -- создать файл в опенсервер для подключения Npm
// C:\Program Files\nodejs\             -- прописать в него путь до nodejs

# mysqli DataBase
require 'core/mysqli.php';

$sc_1 = gmts();
$sc_4 = 0;
$sc_8 = 0;
$gmc  = 1;
session_cache_expire();

$IS_WINDOWS = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
define('PATH_DELIMITER', isWindows() ? ';' : ':');

$dird          = dirname($_SERVER['PHP_SELF']);
$sourcessrandd = array('//' => '/', '\\' => '/');
$dird          = strtr($dird, $sourcessrandd);
if ($dird != '/')
{
    $dirf = '/';
}
else
{
    $dirf = '';
}
$url = 'http://' . $_SERVER['HTTP_HOST'] . $dird . $dirf;
define('CONF_FULL_SHOP_URL', trim($url));

$PATH_JSON = PATH_JSON;

@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies', 1);
@ini_set('session.use_only_cookies', 1);
@ini_set('session.auto_start', 0);
@ini_set('magic_quotes_gpc', 0);
@ini_set('magic_quotes_runtime', 0);
@ini_set('register_globals', 0);
@ini_set('display_errors', 1);

error_reporting(1);
set_error_handler('errorHandler');
register_shutdown_function('shutdownHandler');

error_reporting(E_ALL & ~E_NOTICE);

$_POST   = stripslashes_deep($_POST);
$_GET    = stripslashes_deep($_GET);
$_COOKIE = stripslashes_deep($_COOKIE);

# подключамся к  БД
require 'core/classes/antDataBase.php';
$DB         = new antDataBase();
$linkMysqli = db_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or exit(ERROR_DB_INIT);
db_select_db($linkMysqli, DB_NAME) or exit(db_error());

require 'core/classes/class.adminSSP.php';
$pdo_connect = array(
    'user'           => DB_USER,
    'pass'           => DB_PASS,
    'db'             => DB_NAME,
    'host'           => DB_HOST,
    'charset'        => 'utf8mb3',
    'headersCharset' => 'utf8'
);

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

if (isset($sub))
{
    $needPHP = PATH_INCLUDES . $dpt . '_' . $sub . '.php';
    $needTPL = $dpt . '.tpl.html';
    $smarty->assign('needPHP', $needPHP);
    $smarty->assign('needTPL', $needTPL);
}

$table_mode = 1;

if (isset($_GET['edit_id']))
{
    $table_mode = 0;
}
else
{
    $table_mode = 1;
    $subTables  = array();
    $smarty->assign('subTables', $subTables);
}

$smarty->assign('table_mode', $table_mode);

if (isset($_GET['edit_id']))
{
    $editID = (int) $_GET['edit_id'];
    if ($editID > 0)
    {
        $smarty->assign('editID', $editID);
        $smarty->assign('selectedID', $editID);
    }
}

include_once 'core/adminDepartmensDescription.php';
$Departments       = array();
$Departments       = ADMIN_DEPARTMENTS;
$admin_departments = array(); // сортированы по "sort_order"

foreach ($Departments as $index => $department)
{
    add_department($department);

    //show department if it is being selected
    if ($dpt == $department['id'])
    {
        // если в запросе нету sub то выбираем дефолтный , если и его нету то нулевой

        $sub = isset($sub) ? $sub : selectDefaultSub($department['sub_departments']);

        $smarty->assign('current_sub', $sub);

        $plucked_sub_names = pluck($department['sub_departments'], 'name');
        $plucked_sub_ids   = pluck($department['sub_departments'], 'id');
        $current_sub_index = array_search($sub, $plucked_sub_ids);
        $current_sub_id    = ($plucked_sub_ids[$current_sub_index]);
        $current_sub_name  = ($plucked_sub_names[$current_sub_index]);

        // dump($plucked_sub_names);
        // dump($plucked_sub_ids);
        // dump($sub);
        // dump($current_sub_index);
        // dump($current_sub_name);

        $smarty->assign('plucked_sub_names', $plucked_sub_names);
        $smarty->assign('plucked_sub_ids', $plucked_sub_ids);
        $smarty->assign('current_sub_index', $current_sub_index);
        $smarty->assign('current_sub_id', $current_sub_id);
        $smarty->assign('current_sub_name', $current_sub_name);

        $DPT_SUB             = $department['id'] . '_' . $current_sub_id; //'trade_orders';
        $jsonColumnsFileName = PATH_JSON . $DPT_SUB . '__columns.json';
        $smarty->assign('current_DPT_SUB', $DPT_SUB);
        if (file_exists($jsonColumnsFileName))
        {
            $smarty->assign('current_jsonColumnsFileName', $jsonColumnsFileName);
        }

        // есть ли php для выбранного суб?
        $phpFileName = PATH_INCLUDES . $department['id'] . '_' . $sub . '.php';
        $tplFileName = $department['id'] . '.tpl.html';

        if (file_exists($phpFileName))
        {
            //assign admin main department template
            if (file_exists(PATH_TPL . $tplFileName))
            {
                $smarty->assign('admin_main_content_template', $tplFileName);
            }
            else
            {
                $smarty->assign('admin_main_content_template', 'standartdpt.tpl.html');
            }
            //assign subdepts
            $smarty->assign('admin_sub_departments', $department['sub_departments']);
            //include selected sub-department
            include $phpFileName;
        }
        else
        {
            //no sub department found
            $smarty->assign('admin_main_content_template', 'notfound.tpl.html');
        }
        $smarty->assign('current_dpt_name', $department['name']);
    }
}

$flatDepartments = flatAdminDepartments($admin_departments);
$smarty->assign('flatDepartments', $flatDepartments);

if (isset($_SESSION['log']))
{
    $smarty->assign('admintempname', $_SESSION['log']);
}

// dump($_GET);
// dump($_SESSION);

//show Smarty output
try
{
    $smarty->display('admin.tpl.html');
}
catch (SmartyException $e)
{
    $smarty->assign('smarty_error', true);
    $smarty->assign('smarty_error_message', $e->getMessage());
    dump($smarty->getTemplateVars());
}

if (1 or ADMIN_SMARTY_LOG_VARS)
{
    // dump($flatDepartments);
    dump($smarty->getTemplateVars('current_jsonColumnsFileName'));
    dump($smarty->getTemplateVars());
    // $all_tpl_vars = $smarty->getTemplateVars();
    // smartylog($all_tpl_vars);
}
