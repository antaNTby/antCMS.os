<?php

// https://profitweb.net/resources/phpmyadmin-dlja-open-server-panel-6-0-0-nastrojki-menju.9/
# The VarDumper component provides mechanisms for extracting the state out of any PHP variables.
# Built on top, it provides a better dump() function that you can use instead of var_dump

// npm
//  Открываем закладку Сервер
//  Затем Настройка использования переменной Path -> выбираем из этого списка Свой Path + userdata/config/path.txt + Win Path
// d:\OSPanel\userdata\config\path.txt  -- создать файл в опенсервер для подключения Npm
// C:\Program Files\nodejs\             -- прописать в него путь до nodejs

include_once 'core/const.php';
// echo (PATH_CORE);
include_once PATH_CORE . 'bootstrap.php';

include_once PATH_CORE . 'authentication.php';

### define department and subdepartment
include_once PATH_CORE . 'departments.php';

// dump($Deparments);

//define start smarty template
$smarty->assign('admin_main_content_template', 'start.tpl.html');

//show department if it is being selected
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

$plucked_dpt_ids   = pluck($Departments, 'id');
$plucked_dpt_names = pluck($Departments, 'name');
$current_dpt_index = array_search($dpt, $plucked_dpt_ids);

// $smarty->assign('plucked_dpt_ids', $plucked_dpt_ids);
$smarty->assign('current_dpt_index', $current_dpt_index);
$smarty->assign('current_dpt_id', $plucked_dpt_ids[$current_dpt_index]);
$smarty->assign('current_dpt_name', $plucked_dpt_names[$current_dpt_index]);

if (in_array($dpt, $plucked_dpt_ids))
{
    $smarty->assign('current_dpt', $dpt);
    $smarty->assign('current_sub', $sub);

    foreach ($Departments as $index => $department)
    {
        if ($dpt === $department['id'])
        {
            $plucked_sub_names = pluck($department['sub_departments'], 'name');
            $plucked_sub_ids   = pluck($department['sub_departments'], 'id');

            if (isset($sub) && in_array($sub, $plucked_sub_ids))
            {
                $route_message = null;
                $sub           = $sub;
            }
            else
            {
                $route_message = 'not correct sub => ' . $sub;
                $sub           = selectDefaultSub($department['sub_departments']);
            }

            $current_sub_index = array_search($sub, $plucked_sub_ids);
            $current_sub_id    = ($plucked_sub_ids[$current_sub_index]);
            $current_sub_name  = ($plucked_sub_names[$current_sub_index]);

            $smarty->assign('current_sub_index', $current_sub_index);
            $smarty->assign('current_sub_id', $current_sub_id);
            $smarty->assign('current_sub_name', $current_sub_name);

            // $smarty->assign('plucked_sub_ids', $plucked_sub_ids);
            // $smarty->assign('plucked_sub_names', $plucked_sub_names);

            $admin_page          = $department['sub_departments'][$current_sub_index]['admin_page'];
            $table_name          = $department['sub_departments'][$current_sub_index]['table_name'];
            $columnsJsonFileName = $department['sub_departments'][$current_sub_index]['columnsJsonFileName'];
            $table_primaryKey    = $department['sub_departments'][$current_sub_index]['table_primaryKey'];
            $sub_processor       = $department['sub_departments'][$current_sub_index]['sub_processor'];
            $sub_template        = $department['sub_departments'][$current_sub_index]['sub_template'];

            if (file_exists($sub_processor))
            {
                require $sub_processor;
                $smarty->assign('admin_main_content_template', $sub_template);
            }
            else
            {
                require PATH_INCLUDES . 'default_dpt.php';
                $smarty->assign('admin_main_content_template', 'default_dpt.tpl.html');
            }

            $smarty->assign('admin_page', $admin_page);
            $smarty->assign('table_name', $table_name);
            $smarty->assign('columnsJsonFileName', $columnsJsonFileName);
            $smarty->assign('table_primaryKey', $table_primaryKey);
            $smarty->assign('sub_processor', $sub_processor);
            $smarty->assign('sub_template', $sub_template);
        }
    }
}

if (
    !in_array($dpt, $plucked_dpt_ids)
)
{
    //no sub department found
    $route_message = 'not correct dpt => ' . $dpt;
    $smarty->assign('admin_main_content_template', 'notfound.tpl.html');
}

if (
    !isset($_GET['dpt']) &&
    !isset($_GET['sub'])
)
{
    //no sub department found
    $route_message = 'EMPTY dpt AND EMPTY sub';
    $smarty->assign('admin_main_content_template', 'start.tpl.html');
}

if (!is_null($route_message))
{
    $smarty->assign('ROUTE_MESSAGE', $route_message);
}

// $book = R::dispense("ant_companies");
// dd($book);

// $post            = R::xdispense('ant_ippost');
// $post->timeStamp = addslashes(time());
// $post->title     = 'My antaNT ЯкоБы IP';
// $post->ip        = addslashes(stGetCustomerIP_Address());
// $id              = R::store($post);

// $t = R::getAll('SELECT * FROM ant_ippost where time_Stamp Like "%7%";');

// d($t);

include_once PATH_CORE . 'admin_end.php';
