<?php
###default_dpt.php
use RedBeanPHP\R;

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
                                                              // d('NO FILE');
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

################
    ################
    if ($_GET['operation'] === 'editCell')
    {
        global $pdo_connect;

        $DATA   = json_decode(file_get_contents('php://input'), true, JSON_BIGINT_AS_STRING | JSON_INVALID_UTF8_IGNORE);
        $result = false;

        $columnIndex = $DATA['columnIndex'];
        $newValue    = $DATA['newValue'];
        $editID      = $DATA['editID'];

        $Column = array(
            'index' => $dtColumns[$columnIndex]['index'],
            'data'  => $dtColumns[$columnIndex]['data'],
            'db'    => $dtColumns[$columnIndex]['db'],
            'dt'    => $dtColumns[$columnIndex]['dt']
        );

        if ($OK)
        {
            // $editedID=$_POST['updatedCell']['companyID'];
            $sql = "UPDATE `{$dbTable}` SET `{$Column['db']}` = :newValue WHERE `{$primaryKey}`= :editID;";

            R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            ##  расширение для таблиц с _ в имени
            R::ext('xdispense', function ($table_name)
            {
                return R::getRedBean()->dispense($table_name);});

            $rb    = R::xdispense($dbTable);
            $aRows = R::exec($sql, array(':newValue' => htmlspecialchars($newValue), ':editID' => ($editID)));
            // $aRows = R::exec($sql, array(':newValue' => trim($newValue), ':editID' => ($editID)));

            // d($aRows);

            $page_message = 'CELL HAS BEEN EDITED';
        }

        header('Content-Type: application/json; charset=utf-8');

        exit(json_encode(array(
            'page_message' => $page_message,
            'table_name'   => $dbTable,
            'primaryKey'   => $primaryKey,
            'columnIndex'  => $columnIndex,
            'Column'       => $Column,
            'sql'          => $sql,
                                     // "editedID"=> (int)$editedID,
            'phpDATA'      => $DATA //as array
        )));
    }

################
    ################
}

$smarty->assign('page_message', $page_message);
$smarty->assign('page_message_type', $page_message_type);

// d(array(
//     $admin_page,
//     $table_name,
//     $table_columns,
//     $table_primaryKey
// ));
