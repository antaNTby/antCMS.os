<?php
###default_dpt.php
use RedBeanPHP\R;


$page_message      = '';
$page_message_type = 'success';
$department        = $Departments[$current_dpt_index];
$department_sub    = $department['sub_departments'][$current_sub_index];

dump($department_sub["name"]);

$smarty->assign('page_message', $page_message);
$smarty->assign('page_message_type', $page_message_type);

$smarty->assign('php_department', $department);
$smarty->assign('php_sub', $department_sub);

    dump($smarty->getTemplateVars());
