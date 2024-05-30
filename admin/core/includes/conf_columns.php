<?php
###default_dpt.php

$page_message      = '';
$page_message_type = 'success';
$department        = $Departments[$current_dpt_index];
$department_sub    = $department['sub_departments'][$current_sub_index];

$smarty->assign('page_message', $page_message);
$smarty->assign('page_message_type', $page_message_type);
$smarty->assign('php_department', $department);
$smarty->assign('php_sub', $department_sub);

##############
$allTablesNames = db_get_all_tables();

// $tableSelectedIndex = array_search('ant_rbcolumns', $allTablesNames); ### -- ВРЕМЕННОО

// $tableSelectedIndex = array_search('trade_companies', $allTablesNames); ### -- ВРЕМЕННОО
// $tableSelectedIndex = count($allTablesNames) - 7; ### -- ВРЕМЕННОО

$tableSelectedIndex = 0;
$tableSelectedIndex = $_GET['tableSelector'] ?? 0;

if ($tableSelectedIndex > count($allTablesNames))
{
    $tableSelectedIndex = 0;}

$smarty->assign('allTablesNames', $allTablesNames);

$smarty->assign('tableSelectedIndex', $tableSelectedIndex);

$table_name = $allTablesNames[$tableSelectedIndex];

$rbcolumnsDefault = [
    'table_name' => 'table_name',
    'data'       => 'column name',
    'db'         => 'DB column name',
    'dt'         => 'DataTables column name',
    'title'      => 'Заголовок',
    'visible'    => 'is visible',
    'searchable' => 'is searchable',
    'orderable'  => 'is orderable',
    'editable'   => 'is editable',
    'sort'       => 'sort order',
    'inputType'  => 'DB Type',
    'enable'     => 'Включить',
    'actions'    => 'Действия',
];

$columnsJsonFileName = PATH_CONFIGS . 'trade_companies' . '__columns.json';
$table_primaryKey    = 'companyID';

if (!is_null($table_name))
{
    $dbTableFields     = db_getColumnNames($table_name);
    $dbTableFieldNames = array_keys($dbTableFields);   // выводим в логг все названия полей
    $dbTableFieldTypes = array_values($dbTableFields); // выводим в логг все названия полей
    $smarty->assign('dbTableFields', $dbTableFields);
    $smarty->assign('dbTableFieldNames', $dbTableFieldNames);
    $smarty->assign('dbTableFieldTypes', $dbTableFieldTypes);

    $cortages = [];
    // dump($dbTableFields);
    $ii = 0;

    foreach ($dbTableFields as $name => $type)
    {
        $cortages["{$name}"]['index']     = $ii;
        $cortages["{$name}"]['name']      = $name;
        $cortages["{$name}"]['sqlType']   = $type;
        $cortages["{$name}"]['inputType'] = getInputTemplate(strtolower($type));
        $ii++;
    }

// cls();
    // jlog($cortages);

    $nn = 0;

    foreach ($cortages as $key => $value)
    {
        $data = [
            'table_name' => $table_name,
            'data'       => $value['name'],
            'db'         => $value['name'],
            'dt'         => $value['index'],
            'title'      => "$key in $table_name",
            'visible'    => 1,
            'searchable' => 1,
            'orderable'  => 0,
            'editable'   => 0,
            'sort'       => $nn * 100,
            'enable'     => true,
            'actions'    => null,
            'sql_type'   => $value['sqlType'],
            'input_type' => $value['inputType'],
        ];

        $where = [
            'table_name' => $table_name,
            'data'       => $value['name'],
        ];

        $r        = $db->table('ant_rbcolumns')->count('id', 'ccount')->where($where)->get();
        $doInsert = $r->ccount;

        if ((int)$doInsert == 0)
        {
            $r = $db->table('ant_rbcolumns')->insert($data);
        }
        else
        {
            $r = $db->table('ant_rbcolumns')->where($where)->update($data);
        }

        $nn++;

        // dump(array($db->queryCount(), $db->getQuery()));
    }

// dump(

//     array(

//         $doInsert,

//         $where,

//         $db->insertId(),

//         $db->queryCount(),

//         $db->getQuery()

//     )

// );

// dd($dbTableFields);

    if (!is_null($columnsJsonFileName))
    {
        if (file_exists($columnsJsonFileName))
        {
            $jsonColumns  = file_get_contents($columnsJsonFileName);
            $page_message = 'datatables columns loaded from: ' . $columnsJsonFileName . '';
        }
        else
        {
            // d('NO FILE');
            $dtColumnFieldNames = $dbTableFieldNames;

            $jsonColumns       = exportColumnsToJson($dtColumnFieldNames, $limit = 4);
            $isSaved           = file_put_contents($columnsJsonFileName, $jsonColumns);
            $page_message      = $columnsJsonFileName . ' Is saved size: ' . format_size((int)$isSaved);
            $page_message_type = 'warning';
        }

        $dtColumns = json_decode($jsonColumns, true);
//as array

        if (!is_null($table_primaryKey))
        {
            $dbTable    = $table_name;
            $primaryKey = $table_primaryKey;
            $OK         = 1;
        }
    }
}
