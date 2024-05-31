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

$tableSelectedIndex = 0;
$tableSelectedIndex = $_GET['tableSelectedIndex'] ?? 0;

if ($tableSelectedIndex > count($allTablesNames))
{
    $tableSelectedIndex = 0;
}

$smarty->assign('allTablesNames', $allTablesNames);
$smarty->assign('tableSelectedIndex', $tableSelectedIndex);
$table_name = $allTablesNames[$tableSelectedIndex];

$operation = $_GET['operation'] ?? 'loadDataTablesColumnDescriptions';

$rbcolumnsDefault = array(
    'table_name' => 'table_name',
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
    'actions'    => 'Действия'
);

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

/*
##########################
##########################
INSERT|UPDATE
##########################
##########################
 */
    if (($operation == 'addNewDataTable') || ($operation == 'updateDataTable'))
    {
        $cortages = array();
        // dump($dbTableFields);
        $ii = 0;
        foreach ($dbTableFields as $name => $type)
        {
            $cortages["{$name}"]['ind']     = $ii;
            $cortages["{$name}"]['name']      = $name;
            $cortages["{$name}"]['db']        = $name;
            $cortages["{$name}"]['dt']        = $name;
            $cortages["{$name}"]['sqlType']   = $type;
            $cortages["{$name}"]['inputType'] = getInputTemplate(strtolower($type));
            $ii++;
        }

        $cc = 0;
        foreach ($cortages as $key => $value)
        {
            $data = array(
                'table_name' => $table_name,
                'ind'      => $value['ind'],
                'data'       => $value['name'],
                'db'         => $value['name'],
                'dt'         => $value['dt'],
                'title'      => "$key @ $table_name",
                'visible'    => 1,
                'searchable' => 1,
                'orderable'  => 0,
                'editable'   => 0,
                'sort_order' => $cc * 10,
                'enable'     => true,
                'actions'    => null,
                'sql_type'   => $value['sqlType'],
                'input_type' => $value['inputType']
            );

            $where = array(
                'table_name' => $table_name,
                'data'       => $value['name']
            );

            $r        = $db->table(ANT_RBCOLUMNS)->count('id', 'ccount')->where($where)->get();
            $doInsert = $r->ccount;

            if ((int) $doInsert == 0)
            {
                $r = $db->table(ANT_RBCOLUMNS)->insert($data);
            }
            else
            {
                $r = $db->table(ANT_RBCOLUMNS)->where($where)->update($data);
            }
            $cc++;
            dump(array($db->queryCount(), $db->getQuery()));
        }
    }

    if (($operation == 'loadDataTablesColumnDescriptions') || ($operation == 'loadDataTablesColumnDescriptionsFromDB'))
    {
        $where = array(
            'table_name' => $table_name
        );
        $dataFromRBC = $db->table('ANT_RBCOLUMNS')->where($where)->orderBy('sort_order')->getAll();
        // dump([$db->queryCount(), $db->getQuery()]);
        // dump(["dataFromRBC"=>$dataFromRBC]);
        // теперь нужно какждому полу дать controlSnippet
        $css   = array();
        $index = 0;
        foreach ($dataFromRBC as $keyRBC => $rowRBC)
        {
            // $obj=
            $css[$keyRBC]['title'] = $rowRBC->title;
            $css[$keyRBC]['tpl']   = $rowRBC->input_type;

            // dump($rowRBC);
            $tableData = array();
            foreach ($rowRBC as $fieldName => $fieldData)
            {
                $tableData[][$fieldName]                = $fieldData;
                $css[$keyRBC]['table_data']['ind']    = $index;
                $css[$keyRBC]['table_data'][$fieldName] = $rowRBC->$fieldName;
            }
            $index++;
        }
        $smarty->assign('staticTable', $css);
        dump($css);
    }

/* 2 => {#32 ▼
+"id": "13"
+"table_name": "ant_categories"
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
    //         $dbTable    = $table_name;
    //         $primaryKey = $table_primaryKey;
    //         $OK         = 1;
    //     }
    // }
}
