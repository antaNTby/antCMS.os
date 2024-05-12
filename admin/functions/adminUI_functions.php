<?php
// adminUserInteface_functions.php

function d($var){
    return dump($var);
}


//adds new $department to departments list
function sortByField($item, $items, $sortField='sort_order')
{

    $i = 0;
    while ($i < count($items) && $items[$i][$sortField] < $item[$sortField])
    {
        $i++;
    }

    for ($j = count($items) - 1; $j >= $i; $j--)
    {
        $items[$j + 1] = $items[$j];
    }

    $items[$i] = $item;
    return $items;
}

function selectDefaultSub($subs)
{
    $defaultSub = $subs[0]['id'];

    if (is_array($subs) && count($subs) > 1)
    {
        foreach ($subs as $key => $value)
        {
            // dump($value);
            if (isset($value['default']) && $value['default'] == 1)
            {
                $defaultSub = $value['id'];
            }
        }
    }
    // dump($defaultSub);
    return $defaultSub;
}

function flatAdminDepartments(
    $departments,
    $subsTables
): array
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

        $menu[$dpt_key]['dpt_id']              = $dpt_id;
        $menu[$dpt_key]['dpt_name']            = $dpt_name;
        $menu[$dpt_key]['sub_count']           = count($ad['sub_departments']);
        $menu[$dpt_key]['dpt_template_file'][] = PATH_TPL . $dpt_id . '.tpl.html';

        $ii = 0;
        foreach ($ad as $key => $value)
        {
            if ($key == 'sub_departments')
            {
                foreach ($value as $k => $v)
                {
                    $menu[$dpt_key]['sub_ids'][]   = $v['id'];
                    $menu[$dpt_key]['sub_names'][] = $v['name'];

                    if (array_key_exists($v['id'], $subsTables))
                    {
                        $menu[$dpt_key]['sub_tables'][] = $subsTables[$v['id']];
                    }
                    else
                    {
                        $menu[$dpt_key]['sub_tables'][] = null;
                    }
                    $menu[$dpt_key]['sub_hrefs'][]              = ADMIN_FILE . "?dpt={$dpt_id}&sub=" . $v['id'];
                    $menu[$dpt_key]['columns_json_files'][]     = PATH_CONFIGS . $dpt_id . '_' . $v['id'] . '__columns.json';
                    $menu[$dpt_key]['include_php_files'][]      = PATH_INCLUDES . $dpt_id . '_' . $v['id'] . '.php';
                    $menu[$dpt_key]['dpt_sub_template_files'][] = PATH_TPL . $dpt_id . '_' . $v['id'] . '.tpl.html';
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
