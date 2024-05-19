<?php
###default_dpt.php

$page_message      = '';
$page_message_type = 'success';
$department        = $Departments[$current_dpt_index];
$department_sub    = $department['sub_departments'][$current_sub_index];

$admin_page       = $department_sub['admin_page'];
$table_name       = $department_sub['table_name'];
$table_columns    = $department_sub['table_columns'];
$table_primaryKey = $department_sub['table_primaryKey'];

$OK                 = 0;
$saveNewJsonColumns = false;
$dtColumns          = array();

if (!is_null($table_name))
{
    $dbTableFields = db_getColumnNames($table_name);

    if (!is_null($table_columns))
    {
        if (file_exists($table_columns))
        {
            $jsonColumns  = file_get_contents($table_columns);
            $page_message = 'datatables columns <strong>loaded from: ' . $table_columns . '</strong>';
        }
        else
        {
            d('NO FILE');
            $dbTableFieldNames  = array_keys($dbTableFields); // выводим в логг все названия полей
            $dtColumnFieldNames = $dbTableFieldNames;

            $jsonColumns       = exportColumnsToJson($dtColumnFieldNames, $limit = 7);
            $isSaved           = file_put_contents($table_columns, $jsonColumns);
            $page_message      = $table_columns . ' Is saved size: ' . format_size((int) $isSaved);
            $page_message_type = 'warning';
        }

        $dtColumns = json_decode($jsonColumns, true); //as array

        if (!is_null($table_primaryKey))
        {
            $dbTable    = $table_name;
            $primaryKey = $table_primaryKey;
            $OK         = 1;
        }
    }
}

if ($OK && isset($_GET['operation']))
{
    if ($_GET['operation'] === 'initDefaultDataTable')
    {
        global $pdo_connect;

        if ($OK)
        {
            // dump([$_POST, $dbTable, $primaryKey, $dtColumns]);

            $ssp_result = adminSSP::simple($_POST, $pdo_connect, $dbTable, $primaryKey, $dtColumns);
        }
        else
        {
            $ssp_result = array();
        }

        header('Content-Type: application/json; charset=utf-8');
        exit(json_encode($ssp_result));
    }
}

$smarty->assign('page_message', $page_message);
$smarty->assign('page_message_type', $page_message_type);

// d(array(
//     $admin_page,
//     $table_name,
//     $table_columns,
//     $table_primaryKey
// ));
