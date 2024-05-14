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
            $smarty->assign('admin_sub_dpt', 'default_sub.tpl.html');
        }
    }
    catch (SmartyException $e)
    {
        $smarty->assign('smarty_error', true);
        $smarty->assign('smarty_error_message', $e->getMessage());
        dump($smarty->getTemplateVars());
    }
}
