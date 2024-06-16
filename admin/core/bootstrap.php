<?php
use Smarty\Smarty;
### стартовая загрузка инициализаци bootstrap.php
### стартовая загрузка инициализаци bootstrap.php
### стартовая загрузка инициализаци bootstrap.php
### стартовая загрузка инициализаци bootstrap.php

// cd domains
// cd antCMS.os
// composer require twbs/bootstrap
// composer require smarty/smarty
// composer require twbs/bootstrap-icons
// composer require gabordemooij/redbean


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
//
// composer require izniburak/pdox

// $ composer self-update
// Upgrading to version 2.7.6 (stable channel).
//
#composer

// Set the default timezone
// date_default_timezone_set('America/New_York');
date_default_timezone_set('Europe/Minsk');

// // Set the error reporting level
// error_reporting(E_ALL);

// Set the default character encoding
if (function_exists('mb_internal_encoding') === true)
{
    mb_internal_encoding('UTF-8');
}

// Set the default locale
if (function_exists('setlocale') === true)
{
    // setlocale(LC_ALL, 'en_US.UTF-8');
    setlocale(LC_ALL, 'ru_Belarus.UTF-8');
}

require_once 'core/connect.php'; // DB_CONST

// require_once 'core/errors.php';   // обработка ошибок  // будем use Tracy\Debugger;

require_once 'core/orklang.php';  // строки текста
require_once 'core/settings.php'; // настройки
require_once 'core/functions.php';
require_once 'core/headers.php';
require_once 'core/tables.php';

// какая-то херня для теста производительности  ДБ  // будем use Tracy\Debugger;
// $sc_1 = gmts();
// $sc_4 = 0;
// $sc_8 = 0;
// $gmc  = 1;

$_POST   = stripslashes_deep($_POST);
$_GET    = stripslashes_deep($_GET);
$_COOKIE = stripslashes_deep($_COOKIE);

# mysqli DataBase
require 'core/mysqli.php';

# подключамся к  БД
require 'core/classes/antDataBase.php';
$DB         = new antDataBase();
$linkMysqli = db_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or exit(ERROR_DB_INIT);
db_select_db($linkMysqli, DB_NAME) or exit(db_error());

require 'core/classes/class.adminSSP.php';
$pdo_connect = [
    'user'           => DB_USER,
    'pass'           => DB_PASS,
    'db'             => DB_NAME,
    'host'           => DB_HOST,
    'charset'        => 'utf8mb4',
    'headersCharset' => 'utf8',
];

// $config = [
//     'driver'    => 'mysql',
//     'host'      => 'localhost',
//     'database'  => 'test',
//     'username'  => 'root',
//     'password'  => '',
//     'charset'   => 'utf8',
//     'collation' => 'utf8_general_ci',
//     'prefix'    => ''
// ];
$config = [
    # Database Driver Type (optional)
     # default value: mysql
     # values: mysql, pgsql, sqlite, oracle
     'driver'    => 'mysql',

# Host name or IP Address (optional)
     # hostname:port (for Port Usage. Example: 127.0.0.1:1010)
     # default value: localhost
     'host'      => DB_HOST,

# IP Address for Database Host (optional)
     # default value: null
     'port'      => 3306,

# Database Name (required)
     'database'  => DB_NAME,

# Database User Name (required)
     'username'  => DB_USER,

# Database User Password (required)#
     'password'  => DB_PASS,

# Database Charset (optional)
     # default value: utf8
     // 'charset'   => 'utf8',
     'charset'   => 'utf8mb4',

# Database Charset Collation (optional)
     # default value: utf8_general_ci
     // 'collation' => 'utf8_general_ci',
     'collation' => 'utf8mb4_unicode_ci',

# Database Prefix (optional)
     # default value: null
     // 'prefix'    => DB_PRFX,
     'prefix'    => null,

# Cache Directory of the Sql Result (optional)
     # default value: __DIR__ . '/cache/'
     'cachedir'  => __DIR__ . '/cache/sql/',
    # default value: true
     'debug'     => true,
];

$db = new \Buki\Pdox($config);

require_once 'core/classes/class.Toasts.php'; //load php class

### //init Smarty 5.3
$smarty = new Smarty();
$smarty->setTemplateDir('../admin/tpl');              // здесь лежат шаблоны tpl.html
$smarty->setCompileDir('../admin/core/cache/php');    // здесь компилируюся *.php
$smarty->setConfigDir('../admin/tpl/smarty_config/'); // незнаю
$smarty->setCacheDir('../admin/core/cache/');
$smarty->compile_id    = 'ant';
$smarty->force_compile = ADMIN_SMARTY_FORCE_COMPILE;
// $smarty->setEscapeHtml(true); //Enable auto-escaping for HTML as follows:
$smarty->setEscapeHtml(false);


//define start smarty template
$smarty->assign('admin_main_content_template', 'start.tpl.html');
###
//Enable auto-escaping for HTML as follows:
// $smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
// $smarty->setCaching(Smarty::CACHING_LIFETIME_SAVED);
// $smarty->testInstall();
//
//
// dd($smarty);

// @ini_set('session.use_trans_sid', 0);
// @ini_set('session.use_cookies', 1);
// @ini_set('session.use_only_cookies', 1);
// @ini_set('session.auto_start', 0);
// @ini_set('magic_quotes_gpc', 0);
// @ini_set('magic_quotes_runtime', 0);
// @ini_set('register_globals', 0);

// будем use Tracy\Debugger;
// @ini_set('display_errors', 0);
// // вместо этого set_error_handler('errorHandler');
//                                // error_reporting(1);
//                                //
//                                //
// set_error_handler('errorHandler');
// register_shutdown_function('shutdownHandler');
// error_reporting(E_ALL & ~E_NOTICE);



