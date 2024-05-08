<?php
// adminUserInteface_functions.php

//adds new $department to departments list
function add_department($department)
{
    global $admin_departments;

    $i = 0;
    while ($i < count($admin_departments) && $admin_departments[$i]['sort_order'] < $department['sort_order'])
    {
        $i++;
    }

    for ($j = count($admin_departments) - 1; $j >= $i; $j--)
    {
        $admin_departments[$j + 1] = $admin_departments[$j];
    }

    $admin_departments[$i] = $department;
}

function selectDefaultSub($subs)
{
    $defaultSub = $subs[0]['id'];
    if (is_array($subs) && count($subs) > 1)
    {
        foreach ($subs as $key => $value)
        {
            if ($value['default'] == 1)
            {
                $defaultSub = $value['id'];
            }
        }
    }
    return $defaultSub;
}

function flatAdminDepartments($departments): array
{
    $res = array();
    if (!is_array($departments))
    {
        return $res;
    }
    $menu = array();
    foreach ($departments as $dpt_key => $ad)
    {
        $dpt_id   = $ad['id'];
        $dpt_name = $ad['name'];

        $menu[$dpt_key]['dpt_id']    = $dpt_id;
        $menu[$dpt_key]['dpt_name']  = $dpt_name;
        $menu[$dpt_key]['sub_count'] = count($ad['sub_departments']);
        $menu[$dpt_key]['dpt_template_file'][] = PATH_TPL . $dpt_id . '.tpl.html';

        $ii = 0;
        foreach ($ad as $key => $value)
        {
            if ($key == 'sub_departments')
            {
                foreach ($value as $k => $v)
                {
                    $menu[$dpt_key]['sub_ids'][]            = $v['id'];
                    $menu[$dpt_key]['sub_names'][]          = $v['name'];
                    $menu[$dpt_key]['sub_hrefs'][]          = ADMIN_FILE . "?dpt={$dpt_id}&sub=" . $v['id'];
                    $menu[$dpt_key]['columns_json_files'][] = PATH_JSON . $dpt_id . '_' . $v['id'] . '__columns.json';
                    $menu[$dpt_key]['include_php_files'][]  = PATH_INCLUDES . $dpt_id . '_' . $v['id'] . '.php';
                    $menu[$dpt_key]['dpt_sub_template_files'][] = PATH_TPL . $dpt_id . '_' . $v['id'] .'.tpl.html';
                }
            }
        }
    }
    $res = $menu;
    return $res;
}

function showSubSmartyOutput(
    $dpt_sub,
    $folder = PATH_TPL_SUB,
    $ext = EXT_TPL
)
{
    global $smarty;

    try {
        if (file_exists($folder . $dpt_sub . $ext))
        {
            $smarty->assign('admin_sub_dpt', $dpt_sub . $ext);
        }
        else
        {
            $smarty->assign('admin_sub_dpt', 'standartsub.tpl.html');
        }
    }
    catch (SmartyException $e)
    {
        $smarty->assign('smarty_error', true);
        $smarty->assign('smarty_error_message', $e->getMessage());
        dump($smarty->getTemplateVars());
    }
}
