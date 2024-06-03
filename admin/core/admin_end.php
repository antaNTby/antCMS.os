<?php

if (isset($_SESSION['log']))
{
    $smarty->assign('adminlogname', $_SESSION['log']);
}

// dump($_GET);
// dump($_SESSION);

if (isset($_GET['db']))
{
    $url = 'adminer.php?username=' . DB_USER . '&db=' . DB_NAME; //adminer.php?username=nixby_dbadmin&db=db_antCMS&table=ant_customers
    Redirect($url);
}

$container_width = ADMIN_CONTAINER_WIDTH;
if (isset($_COOKIE['TEMPLATE_WIDTH']))
{
    $container_width = $_COOKIE['TEMPLATE_WIDTH'];
}

$allowedContainerWidths = ['container', 'container-sm', 'container-md', 'container-lg', 'container-xl', 'container-xxl', 'container-fluid'];
$smarty->assign('allowedContainerWidths', $allowedContainerWidths);
if (isset($_GET['change_template_width']))
{
    $new_template_width = $_GET['change_template_width'];

    $container_width = (in_array($new_template_width, $allowedContainerWidths))
    ? $new_template_width
    : ADMIN_CONTAINER_WIDTH;
    set_cookie('TEMPLATE_WIDTH', $container_width);

    Redirect(ADMIN_FILE);
}

if (!extension_loaded('gd'))
{
    $gd_ver = 0;
}
else
{
    $gd_ver = php_gd();
}
$rd = db_version();
$smarty->assign('mver', $rd);
$phpver = phpversion();
$smarty->assign('pver', $phpver);

//show Smarty output
try
{
    $smarty->assign('container_width', $container_width);
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
    // dump($smarty->getTemplateVars('flatDepartments'));
    dump($smarty->getTemplateVars());
    // $all_tpl_vars = $smarty->getTemplateVars();
    // smartylog($all_tpl_vars);
}
