<?php
### стартовая загрузка инициализаци bootstrap.php
### стартовая загрузка инициализаци bootstrap.php
### стартовая загрузка инициализаци bootstrap.php
### стартовая загрузка инициализаци bootstrap.php

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
//
#composer
require_once '../vendor/autoload.php';

include_once 'core/const.php';    // управляющие и служебные константы
include_once 'core/connect.php';    // DB_CONST
include_once 'core/errors.php';   // обработка ошибок
include_once 'core/orklang.php';  // строки текста
include_once 'core/settings.php'; // настройки
include_once 'core/functions.php';
include_once 'core/headers.php';
include_once 'core/tables.php';


# mysqli DataBase
require 'core/mysqli.php';

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
    'headersCharset' => 'utf8',
);

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

$IS_WINDOWS = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
define('PATH_DELIMITER', isWindows() ? ';' : ':');

$dird          = dirname($_SERVER['PHP_SELF']); // "/admin"
// $sourcessrandd = array('//' => '/', '\\' => '/');
$dird          = strtr($dird, ['//' => '/', '\\' => '/']);
if ($dird != '/')
{
    $dirf = '/';
}
else
{
    $dirf = '';
}
$url = 'http://' . $_SERVER['HTTP_HOST'] . $dird . $dirf;
define('CONF_FULL_SHOP_URL', trim($url)); // "http://antcms.os/admin/"

@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies', 1);
@ini_set('session.use_only_cookies', 1);
@ini_set('session.auto_start', 0);
@ini_set('magic_quotes_gpc', 0);
@ini_set('magic_quotes_runtime', 0);
@ini_set('register_globals', 0);
@ini_set('display_errors', 1);

// error_reporting(1);
set_error_handler('errorHandler');
register_shutdown_function('shutdownHandler');
error_reporting(E_ALL & ~E_NOTICE);