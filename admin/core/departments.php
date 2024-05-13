<?php
//departments.php
//

require PATH_DESCRIPTIONS . 'adminDepartmensDescription.php';

$ads        = UI_DEPARTMENTS;
$subsTables = UI_TABLES;

$Departments = [];
foreach ($ads as $key => $department)
{
    $Departments = sortByField($department, $Departments);
}

$Subs = pluck($Departments, 'sub_departments');

foreach ($Departments as $dpt_key => $dep)
{

    $dep_id          = $dep['id'];
    $sub_departments = $dep['sub_departments'];
    // d($sub_departments);

    foreach ($sub_departments as $key => $value)
    {
        $sub_id                = $value['id'];
        $sub_departments[$key] = $value;

        $value['DPT_SUB'] = $dep_id . '_' . $sub_id; //'trade_orders';

        $value['table_columns'] = PATH_CONFIGS . $dep_id . '_' . $sub_id . '__columns.json';
        $value['sub_processor']     = PATH_INCLUDES . $dep_id . '_' . $sub_id . '.php';
        $value['sub_template']      = PATH_TPL .'sub/'. $dep_id . '_' . $sub_id . '.tpl.html';
        $value['sub_href']          = ADMIN_FILE . "?dpt={$dep_id}&sub=" . $sub_id;

        if (array_key_exists($sub_id, $subsTables))
        {
            $value['table'] = $subsTables[$sub_id];
        }
        else
        {
            $value['table'] = null;
        }

        $sub_departments[$key] = $value;
    }

    $Departments[$dpt_key]['sub_departments'] = $sub_departments;
    $Departments[$dpt_key]['sub_count'] = count($dep['sub_departments']);

}


$Departments_count=count($Departments);
$Departments_type=gettype($Departments[0]["id"]);



$smarty->assign('Departments', $Departments);
$smarty->assign('Departments_count', $Departments_count);
// $smarty->assign('Departments_type', $Departments_type);


