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
    'data'        => 'column name',
    'db'          => 'DB column name',
    'dt'          => 'DataTables column name',
    'title'       => 'Заголовок',
    'visible'     => 'is visible',
    'searchable'  => 'is searchable',
    'orderable'   => 'is orderable',
    'editable'    => 'is editable',
    'sort_order'  => 'sort order',
    'inputType'   => 'DB Type',
    'enable'      => 'Включить',
    'actions'     => 'Действия'
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
        $ii       = 0;
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
                'data'        => $key,
                'ind'         => $cc,
                'db'          => $key,
                'dt'          => $key,
                'title'       => "$key @ $config_name",
                'visible'     => 1,
                'searchable'  => 1,
                'orderable'   => 1,
                'editable'    => 1,
                'sort_order'  => $cc * 10,
                'enable'      => true,
                'actions'     => null,
                'sql_type'    => $value['sqlType'],
                'input_type'  => $value['inputType']
            ];

            $where = [
                'config_name' => $config_name,
                'data'        => $key
            ];

            $r        = $db->table(ANT_RBCOLUMNS)->count('id', 'ccount')->where($where)->get();
            $doInsert = $r->ccount;

            if ((int) $doInsert == 0)
            {
                $r       = $db->table(ANT_RBCOLUMNS)->insert($data);
                $message = 'Новая конфигурация создана';
            }
            else
            {
                $r       = $db->table(ANT_RBCOLUMNS)->where($where)->update($data);
                $message = 'Новая конфигурация обновлена';
            }
            $cc++;
            // dump([$db->queryCount(), $db->getQuery()]);
        }

        $timerSec = 1; // задержка для обработки страницы
        $smarty->assign('timerSec', $timerSec);
        header('Content-Type: text/html; charset=utf8');
        $phpToast      = new Toasts();
        $urlToRedirect = ADMIN_FILE . '?dpt=conf&sub=columns&configSelectedIndex=' . $configSelectedIndex;
        $phpToast::run('success', $message, $urlToRedirect, $timerSec);
        RedirectMetaRefresh($urlToRedirect, $timerSec);
    }

    if (($operation == 'loadDataTablesColumnDescriptions') || ($operation == 'loadDataTablesColumnDescriptionsFromDB'))
    {
        $where = [
            'config_name' => $config_name
        ];
        $dataFromRBC = $db->table(ANT_RBCOLUMNS)->where($where)->orderBy('sort_order')->getAll();

        // теперь нужно какждому полу дать controlSnippet
        $iuConfigs = [];
        $index     = 0;
        foreach ($dataFromRBC as $keyRBC => $rowRBC)
        {
            $colInd = 0;
            foreach ($rowRBC as $fieldName => $fieldData)
            {
                $iuConfigs[$keyRBC]['table_data']['ind']      = $index;
                $iuConfigs[$keyRBC]['table_data'][$fieldName] = $rowRBC->$fieldName;

                $data_set = [
                    'field-name' => $fieldName,
                    'row'        => $index,
                    'col'        => $colInd,
                    'type'       => 'control-snippet'
                ];

                // dump($data_set);
                $iuConfigs[$keyRBC]['dataset'][$fieldName] = $data_set;
                // dump($iuConfigs[$keyRBC]);

                $p = [

                    // "class_div"=>AAA,
                    'id'        => "{$fieldName}_{$index}",
                    'class_add' => 'text-danger',
                    'name'      => $fieldName,
                    'value'     => $rowRBC->$fieldName
                    // "aria_label" => "AAA",
                    // "isDisabled"=>AAA,
                    // "isChecked"=>AAA,
                    // "isIndeterminate"=>AAA,
                ];

                ## ставим checked для чекбоксов с value="1"
                $p['isChecked'] = ($p['value'] == 1) ? 1 : 0;
                ## если поле отключено , дизаблим инпуты и красим их в мутный цвет
                if ($rowRBC->enable != 1)
                {
                    $p['class_add']  = 'opacity-50';
                    $p['isDisabled'] = 1;
                    $p['isReadonly'] = 1;
                }
                ## отменяем предыдущее действи для самого столбца enable и id
                if ($fieldName === 'enable')
                {
                    $p['class_add']  = 'text-dark';
                    $p['isDisabled'] = 0;
                    $p['isReadonly'] = 0;
                }
                if ($fieldName === 'id')
                {
                    $p['class_add']  = 'text-bg-dark';
                    $p['isDisabled'] = 0;
                    $p['isReadonly'] = 0;
                }
                ## data и ind только для чтения
                if ($fieldName === 'data' || $fieldName === 'ind')
                {
                    $p['class_add']  = 'text-primary';
                    $p['isDisabled'] = 0;
                    $p['isReadonly'] = 1;
                }

                $iuConfigs[$keyRBC]['p'][$fieldName] = $p;

                ## написать функцию возвращающую список полей для db и для dt в виде массива
                if ($fieldName === 'db' || $fieldName === 'dt')
                {
                    $fieldArr                                   = db_getColumnNames($config_name);
                    $iuConfigs[$keyRBC]['datalist'][$fieldName] = array_keys($fieldArr);
                }

                $colInd++;
            }
            $index++;
        }
        $smarty->assign('iuConfigs', $iuConfigs);
    }

    // dump($iuConfigs["0"]);

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
