<?php
###default_dpt.php

$page_message      = '';
$page_message_type = 'success';
$department        = $Departments[$current_dpt_index];
$department_sub    = $department['sub_departments'][$current_sub_index];

// dump($department_sub["name"]);
//
//

$smarty->assign('page_message', $page_message);
$smarty->assign('page_message_type', $page_message_type);

$smarty->assign('php_department', $department);

$smarty->assign('php_sub', $department_sub);

$db_check_p = array(

    'class_div'     => 'p-1 d-flex justify-content-center',
    'id'            => 'is',
    'class_add'     => 'text=bg-danger',
    'name'          => 'test0',
    'value'         => 0,
    'aria_label' => 0,
    'disabled'      => 0,
    'checked'       => 0,
    'datasetA'      => 0,
    'datasetB'      => 10,
    'datasetC'      => 1000,
    'indeterminate' => 1

);
$db_check_p2 = array(

    'class_div'     => 'p-1 d-flex justify-content-center',
    'id'            => 'ijjs',
    'class_add'     => 'text=bg-danger',
    'name'          => 'test0',
    'value'         => 0,
    'aria_label' => 0,
    'disabled'      => 0,
    'checked'       => 0,
    'datasetA'      => 0,
    'datasetB'      => 10,
    'datasetC'      => 1000,
    'indeterminate' => 1

);
$smarty->assign('db_check_p', $db_check_p);
$smarty->assign('db_check_p2', $db_check_p2);
