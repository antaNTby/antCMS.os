<?php

// https://profitweb.net/resources/phpmyadmin-dlja-open-server-panel-6-0-0-nastrojki-menju.9/

# The VarDumper component provides mechanisms for extracting the state out of any PHP variables.
# Built on top, it provides a better dump() function that you can use instead of var_dump

// npm
//  Открываем закладку Сервер
//  Затем Настройка использования переменной Path -> выбираем из этого списка Свой Path + userdata/config/path.txt + Win Path
// d:\OSPanel\userdata\config\path.txt  -- создать файл в опенсервер для подключения Npm
// C:\Program Files\nodejs\             -- прописать в него путь до nodejs

require 'bootstrap.php';

$sc_1 = gmts();
$sc_4 = 0;
$sc_8 = 0;
$gmc  = 1;

require 'authentication.php';

### define department and subdepartment
//define department and subdepartment
if (!isset($_GET['dpt']))
{
    $dpt = isset($_POST['dpt']) ? $_POST['dpt'] : '';
}
else
{
    $dpt = $_GET['dpt'];
}

if (!isset($_GET['sub']))
{
    if (isset($_POST['sub']))
    {
        $sub = $_POST['sub'];
    }
}
else
{
    $sub = $_GET['sub'];
}
$smarty->assign('current_dpt', $dpt);

if (isset($sub))
{
    $needPHP = PATH_INCLUDES . $dpt . '_' . $sub . '.php';
    $needTPL = $dpt . '.tpl.html';
    $smarty->assign('needPHP', $needPHP);
    $smarty->assign('needTPL', $needTPL);
}

$table_mode = 1;

if (isset($_GET['edit_id']))
{
    $table_mode = 0;
}
elseif (isset($_GET['dpt']) && isset($_GET['sub']))
{
    $table_mode = 1;
    $subTables  = array();
    $smarty->assign('subTables', $subTables);
}

$smarty->assign('table_mode', $table_mode);

if (isset($_GET['edit_id']))
{
    $editID = (int)$_GET['edit_id'];
    if ($editID > 0)
    {
        $smarty->assign('editID', $editID);
        $smarty->assign('selectedID', $editID);
    }
}

include_once 'core/adminDepartmensDescription.php';
$Departments       = array();
$Departments       = ADMIN_DEPARTMENTS;
$admin_departments = array(); // сортированы по "sort_order"
$subsTables        = SUB_DB_TABLES;

foreach ($Departments as $index => $department)
{
    add_department($department);

    //show department if it is being selected
    if ($dpt === $department['id'])
    {
        // если в запросе нету sub то выбираем дефолтный , если и его нету то нулевой
        $sub = isset($sub) ? $sub : selectDefaultSub($department['sub_departments']);
        $smarty->assign('current_sub', $sub);

        $plucked_sub_names = pluck($department['sub_departments'], 'name');
        $plucked_sub_ids   = pluck($department['sub_departments'], 'id');
        $current_sub_index = array_search($sub, $plucked_sub_ids);
        $current_sub_id    = ($plucked_sub_ids[$current_sub_index]);
        $current_sub_name  = ($plucked_sub_names[$current_sub_index]);
        $smarty->assign('plucked_sub_names', $plucked_sub_names);
        $smarty->assign('plucked_sub_ids', $plucked_sub_ids);
        $smarty->assign('current_sub_index', $current_sub_index);
        $smarty->assign('current_sub_id', $current_sub_id);
        $smarty->assign('current_sub_name', $current_sub_name);

        $DPT_SUB             = $department['id'] . '_' . $current_sub_id; //'trade_orders';
        $jsonColumnsFileName = PATH_JSON . $DPT_SUB . '__columns.json';
        $smarty->assign('current_DPT_SUB', $DPT_SUB);
        $smarty->assign('current_jsonColumnsFileName', $jsonColumnsFileName);

        // есть ли php для выбранного суб?
        $phpFileName = PATH_INCLUDES . $department['id'] . '_' . $sub . '.php';
        $tplFileName = $department['id'] . '.tpl.html';

        if (file_exists($phpFileName))
        {
            //assign admin main department template
            if (file_exists(PATH_TPL . $tplFileName))
            {
                $smarty->assign('admin_main_content_template', $tplFileName);
            }
            else
            {
                $smarty->assign('admin_main_content_template', 'default_dpt.tpl.html');
            }
            //assign subdepts
            $smarty->assign('admin_sub_departments', $department['sub_departments']);
            //include selected sub-department
            include $phpFileName;
        }
        else
        {
            //no sub department found
            $smarty->assign('admin_main_content_template', 'notfound.tpl.html');
        }

        $smarty->assign('current_dpt_name', $department['name']);
        $smarty->assign('phpFileName', $phpFileName);
    }
}

$flatDepartments = flatAdminDepartments($admin_departments, SUB_DB_TABLES);
$smarty->assign('flatDepartments', $flatDepartments);
# assign current DB table
$current_sub_table=null;
foreach ($flatDepartments as $key => $dep)
{
    if ($dep['dpt_id'] === $dpt)
    {
        $current_sub_index = array_search($sub, $plucked_sub_ids);
        $current_tables    = $dep["sub_tables"];
        $current_sub_table = $dep["sub_tables"][$current_sub_index];
        $smarty->assign('current_sub_table', $current_sub_table);
        //no sub department found

    }
}

if (!is_null($current_sub_table) && !file_exists($phpFileName) && isset($dpt) && isset($sub))
{
    $phpFileName = PATH_INCLUDES . 'default_dpt.php';
    include $phpFileName;
}

include_once 'admin_end.php';