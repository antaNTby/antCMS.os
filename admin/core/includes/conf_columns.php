<?php
###default_dpt.php
use RedBeanPHP\R;
R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

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

$tableSelectedIndex = count($allTablesNames) - 1; ### -- ВРЕМЕННОО

$smarty->assign('allTablesNames', $allTablesNames);
$smarty->assign('tableSelectedIndex', $tableSelectedIndex);

$table_name = $allTablesNames[$tableSelectedIndex];

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
    'sort'       => 'sort order',
    'inputType'  => 'DB Type',
    'enable'     => 'Включить',
    'actions'    => 'Действия'
);

// $cd->tableName  = $table_name;
// $cd->data       = 'data';
// $cd->db         = 'db';
// $cd->dt         = 'dt';
// $cd->title      = 'title';
// $cd->visible    = 1;
// $cd->searchable = 1;
// $cd->orderable  = 1;
// $cd->editable   = 1;
// $cd->sort       = 0;
// $cd->enable     = true;
// $cd->actions    = 'actions';

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

    $cortages = array();
    dump($dbTableFields);
    $ii = 0;
    foreach ($dbTableFields as $name => $type)
    {
        $cortages["{$name}"]['index']     = $ii;
        $cortages["{$name}"]['name']      = $name;
        $cortages["{$name}"]['sqlType']      = $type;
        $cortages["{$name}"]['inputType'] = getInputTemplate(strtolower($type));
        $ii++;
    }

    cls();
    jlog($cortages);

    $nn = 0;
    foreach ($cortages as $key => $value)
    {
        // code...
        // dump("$key => $value");
        $cd = R::dispense('rbcolumns');

        $cd->tableName  = $table_name;
        $cd->data       = $key;
        $cd->db         = $key;
        $cd->dt         = $key;
        $cd->title      = "$key in $table_name";
        $cd->visible    = 1;
        $cd->searchable = 1;
        $cd->orderable  = 1;
        $cd->editable   = 1;
        $cd->sort       = $nn * 10;
        $cd->enable     = true;
        $cd->actions    = null;
        $cd->sqlType  = $value['sqlType'];
        $cd->inputType  = $value['inputType'];

        $nn++;
        $id = R::store($cd);
        jlog($id);
    }

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
            $page_message      = $columnsJsonFileName . ' Is saved size: ' . format_size((int) $isSaved);
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

/*
$attributes = array(
'a'  => 111,
'ab' => 222,
'ac' => 'dd'
);

$smarty->assign('attributes', $attributes);

$db_check_p = array(

'class_div'       => 'p-1 d-flex justify-content-center',
'id'              => 'is',
// 'class_add'       => 'h5',
'name'            => 'test0',
'value'           => 1,
'aria_label'      => 0,
'isDisabled'      => 0,
'isChecked'       => 1,
'isIndeterminate' => 0

);
$db_check_p2 = array(

'class_div'       => 'p-1 d-flex justify-content-center',
'id'              => 'ijjs',
// 'class_add'       => 'h4',
// 'class_add_label' => 'h4',
'name'            => 'test01',
'value'           => 0,
'aria_label'      => 0,
'isDisabled'      => 0,
'isChecked'       => 0,
'isIndeterminate' => 1

);
$smarty->assign('db_check_p', $db_check_p);
$smarty->assign('db_check_p2', $db_check_p2);

// create template object with its private variable scope
$tpl = $smarty->createTemplate('cs/single_inputtext.tpl');

$tpl->assign('label', "Бабель");
$tpl->assign('p',$db_check_p2);
$tpl->assign('dataset',$attributes);

// display the template
$tpl->display();
 */
// $myTestControlSnippet = $tpl->fetch('cs/single_inputtext.tpl.html');
// dump($myTestControlSnippet);
