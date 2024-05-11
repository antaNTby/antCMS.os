<?php

if (isset($_SESSION['log']))
{
    $smarty->assign('admintempname', $_SESSION['log']);
}

// dump($_GET);
// dump($_SESSION);

if (!extension_loaded('gd'))
{
    $gd_ver = 0;
}
else
{
    $gd_ver = php_gd();
}
$rd = db_version();
$smarty->assign("mver", $rd);
$phpver = phpversion();
$smarty->assign("pver", $phpver);

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
    // dump($smarty->getTemplateVars('flatDepartments'));
    dump($smarty->getTemplateVars());
    // $all_tpl_vars = $smarty->getTemplateVars();
    // smartylog($all_tpl_vars);
}
