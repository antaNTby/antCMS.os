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

// $allTablesNames = db_get_all_tables();
$allTablesNames = uiGetAllTables($db);


$configSelectedIndex = 0;
$configSelectedIndex = $_GET['configSelectedIndex'] ?? 0;

if ($configSelectedIndex > count($allTablesNames))
{
    $configSelectedIndex = 0;
}

$smarty->assign('allTablesNames', $allTablesNames);
$smarty->assign('configSelectedIndex', $configSelectedIndex);
$config_name = $allTablesNames[$configSelectedIndex];

$operation = $_GET['operation'] ?? 'loadDataTablesColumnDescriptions';

$rbcolumnsDefault = [
    'config_name' => 'config_name',
    'data'       => 'column name',
    'db'         => 'DB column name',
    'dt'         => 'DataTables column name',
    'title'      => 'Заголовок',
    'visible'    => 'is visible',
    'searchable' => 'is searchable',
    'orderable'  => 'is orderable',
    'editable'   => 'is editable',
    'sort_order' => 'sort order',
    'inputType'  => 'DB Type',
    'enable'     => 'Включить',
    'actions'    => 'Действия',
];

$columnsJsonFileName = PATH_CONFIGS . 'trade_companies' . '__columns.json';
$table_primaryKey    = 'companyID';

if (!is_null($config_name))
{
    $dbTableFields     = db_getColumnNames($config_name);
    $dbTableFieldNames = array_keys($dbTableFields);   // выводим в логг все названия полей
    $dbTableFieldTypes = array_values($dbTableFields); // выводим в логг все названия полей
    $smarty->assign('dbTableFields', $dbTableFields);
    $smarty->assign('dbTableFieldNames', $dbTableFieldNames);
    $smarty->assign('dbTableFieldTypes', $dbTableFieldTypes);

/*
##########################
##########################
INSERT|UPDATE
##########################
##########################
 */
    if (($operation == 'addNewConfig') || ($operation == 'updateConfig'))
    {
        // dump($dbTableFields);
        $cortages = [];
        $ii = 0;
        foreach ($dbTableFields as $name => $type)
        {
            $cortages["{$name}"]['ind']       = $ii;
            $cortages["{$name}"]['sqlType']   = $type;
            $cortages["{$name}"]['inputType'] = getInputTemplate(strtolower($type));
            $ii++;
        }

        $cc = 0;
        foreach ($cortages as $key => $value)
        {
            $data = [
                'config_name' => $config_name,
                'data'       => $key ,
                'ind'        => $cc,
                'db'         => $key ,
                'dt'         => $key,
                'title'      => "$key @ $config_name",
                'visible'    => 1,
                'searchable' => 1,
                'orderable'  => 1,
                'editable'   => 1,
                'sort_order' => $cc * 10,
                'enable'     => true,
                'actions'    => null,
                'sql_type'   => $value['sqlType'],
                'input_type' => $value['inputType'],
            ];

            $where = [
                'config_name' => $config_name,
                'data'       => $key ,
            ];

            $r        = $db->table(ANT_RBCOLUMNS)->count('id', 'ccount')->where($where)->get();
            $doInsert = $r->ccount;

            if ((int)$doInsert == 0)
            {
                $r = $db->table(ANT_RBCOLUMNS)->insert($data);
            }
            else
            {
                $r = $db->table(ANT_RBCOLUMNS)->where($where)->update($data);
            }
            $cc++;
            dump([$db->queryCount(), $db->getQuery()]);
        }
    }

    if (($operation == 'loadDataTablesColumnDescriptions') || ($operation == 'loadDataTablesColumnDescriptionsFromDB'))
    {
        $where = [
            'config_name' => $config_name,
        ];
        $dataFromRBC = $db->table(ANT_RBCOLUMNS)->where($where)->orderBy('sort_order')->getAll();

        // теперь нужно какждому полу дать controlSnippet
        $css   = [];
        $index = 0;
        foreach ($dataFromRBC as $keyRBC => $rowRBC)
        {
            $tableData = [];
            foreach ($rowRBC as $fieldName => $fieldData)
            {
                $tableData[$fieldName]                = $fieldData;
                $css[$keyRBC]['table_data']['ind']      = $index;
                $css[$keyRBC]['table_data'][$fieldName] = $rowRBC->$fieldName;
            }
            $index++;
        }
        $smarty->assign('iuConfigs', $css);
    }

/* 2 => {#32 ▼
+"id": "13"
+"config_name": "ant_categories"
+"data": "name"
+"db": "name"
+"dt": "1"
+"title": "name in ant_categories"
+"visible": "1"
+"searchable": "1"
+"orderable": "0"
+"editable": "0"
+"sort_order": "10"
+"enable": "1"
+"actions": null
+"sql_type": "varchar(255)"
+"input_type": "single_inputtext.tpl"
}*/

    // if (!is_null($columnsJsonFileName))
    // {
    //     if (file_exists($columnsJsonFileName))
    //     {
    //         $jsonColumns  = file_get_contents($columnsJsonFileName);
    //         $page_message = 'datatables columns loaded from: ' . $columnsJsonFileName . '';
    //     }
    //     else
    //     {
    //         // d('NO FILE');
    //         $dtColumnFieldNames = $dbTableFieldNames;

    //         $jsonColumns       = exportColumnsToJson($dtColumnFieldNames, $limit = 4);
    //         $isSaved           = file_put_contents($columnsJsonFileName, $jsonColumns);
    //         $page_message      = $columnsJsonFileName . ' Is saved size: ' . format_size((int)$isSaved);
    //         $page_message_type = 'warning';
    //     }

    //     $dtColumns = json_decode($jsonColumns, true);//as array

    //     if (!is_null($table_primaryKey))
    //     {
    //         $dbTable    = $config_name;
    //         $primaryKey = $table_primaryKey;
    //         $OK         = 1;
    //     }
    // }
}
