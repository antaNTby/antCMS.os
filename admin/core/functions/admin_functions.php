<?php
// admin_functions.php

function set_cookie(
    $Name,
    $Value = '',
    $Expires = '',
    $Secure = false,
    $Path = '',
    $Domain = '',
    $HTTPOnly = false
)
{
    header('Set-Cookie: ' . rawurlencode($Name) . '=' . rawurlencode($Value)
        . (empty($Expires) ? '' : ' ; expires=' . gmdate('D, d-M-Y H:i:s', $Expires) . ' GMT')
        . (empty($Path) ? '' : ' ; path=' . $Path)
        . (empty($Domain) ? '' : ' ; domain=' . $Domain)
        . (!$Secure ? ' ; flavor=choco; SameSite=Lax' : ' ; SameSite=None; Secure ')
        . (!$HTTPOnly ? '' : '; HttpOnly'), false);
}

function isWindows()
{
    return (isset($_SERVER['WINDIR']) || isset($_SERVER['windir']));
}

function fix_directory_separator($str)
{
    global $IS_WINDOWS;
    if ($IS_WINDOWS)
    {
        $str = str_replace('/', DIRECTORY_SEPARATOR, $str);
    }
    else
    {
        $str = str_replace('\\', DIRECTORY_SEPARATOR, $str);
    }

    return $str;
}

//adds new $admin_dpt to departments list
function add_department($admin_dpt)
{
    global $admin_departments;

    $i = 0;
    while ($i < count($admin_departments) && $admin_departments[$i]['sort_order'] < $admin_dpt['sort_order'])
    {
        $i++;
    }

    for ($j = count($admin_departments) - 1; $j >= $i; $j--)
    {
        $admin_departments[$j + 1] = $admin_departments[$j];
    }

    $admin_departments[$i] = $admin_dpt;
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

function checkColumnJsonIsPresent(
    $DPT_SUB,
    $path
)
{
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

        $ii = 0;
        foreach ($ad as $key => $value)
        {
            if ($key == 'sub_departments')
            {
                foreach ($value as $k => $v)
                {
                    $menu[$dpt_key]['sub_id'][]    = $v['id'];
                    $menu[$dpt_key]['sub_name'][]  = $v['name'];
                    $menu[$dpt_key]['sub_href'][]  = ADMIN_FILE . "?dpt={$dpt_id}&sub=" . $v['id'] . '&table=' . $v['id'];
                    $menu[$dpt_key]['sub_href2'][] = ADMIN_FILE . "?dpt={$dpt_id}&sub=" . $v['id'];
                }
            }
        }
    }
    $res = $menu;
    return $res;
}

function showSubSmartyOutput(
    $dpt_sub,
    $folder = 'tpl/sub/',
    $ext = '.tpl.html'
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

function checklogin()
{
    $rls = array();
    if (isset($_SESSION['log'])) //look for user in the database
    {
        $q   = db_query('SELECT cust_password, actions FROM ' . CUSTOMERS_TABLE . " WHERE Login='" . trim($_SESSION['log']) . "'");
        $row = db_fetch_row($q);                                                //found customer - check password
        if (!$row || !isset($_SESSION['pass']) || $row[0] != $_SESSION['pass']) //unauthorized access
        {
            unset($_SESSION['log']);
            unset($_SESSION['pass']);
        }
        else
        {
            $rls = unserialize($row[1]);
            unset($row);
            # fix log errors WARNING: in_array() expects parameter 2 to be array, boolean given
            if (!is_array($rls))
            {
                $rls = array();
            }
        }
    }
    return $rls;
}

// *****************************************************************************
// Purpose        redirects to other PHP page specified URL ( $url )
// Inputs           $url
// Remarks        this function uses header
// Returns        nothing
function Redirect($url)
{
    header('Location: ' . $url);
    exit();
}
// *****************************************************************************
// Purpose        redirects to other PHP page specified URL ( $url )
// Inputs
// Remarks        if CONF_PROTECTED_CONNECTION == '1' this function uses protected ( https:// ) connection
//                        else it uses unsecure http://
//                        $url is relative URL, NOT an absolute one, e.g. index.php, index.php?productID=x, but not http://www.example.com/
// Returns        nothing
function RedirectProtected($url)
{
    if (CONF_PROTECTED_CONNECTION == '1')
    {
        Redirect(correct_URL(CONF_FULL_SHOP_URL, 'https') . $url); //redirect to HTTPS part of the website
    }
    else
    {
        Redirect($url);
    }
    //relative URL
}
// *****************************************************************************
// Purpose        redirects to other PHP page specified URL ( $url )
// Inputs           $url
// Remarks        this function uses JavaScript client script
// Returns        nothing
function RedirectJavaScript($url)
{
    exit("<script type='text/javascript'> window.location = '" . $url . "'; </script>");
}

function set_query(
    $_vars,
    $_request = '',
    $_store = false
)
{
    if (!$_request)
    {
        global $_SERVER;
        $_request = $_SERVER['REQUEST_URI'];
    }

    $_anchor                   = '';
    list($_request, $_anchor) = explode('#', $_request);

    if (strpos($_vars, '#') !== false)
    {
        list($_vars, $_anchor) = explode('#', $_vars);
    }

    if (!$_vars && !$_anchor)
    {
        return preg_replace('|\?.*$|', '', $_request) . ($_anchor ? '#' . $_anchor :
            '');
    }
    elseif (!$_vars && $_anchor)
    {
        return $_request . '#' . $_anchor;
    }

    $_rvars  = array();
    $tr_vars = explode('&', strpos($_request, '?') !== false ? preg_replace('|.*\?|', '', $_request) :
        '');
    foreach ($tr_vars as $_var)
    {
        $_t = explode('=', $_var);
        if ($_t[0])
        {
            $_rvars[$_t[0]] = $_t[1];
        }
    }
    $tr_vars = explode('&', preg_replace(array('|^\&|', '|^\?|'), '', $_vars));
    foreach ($tr_vars as $_var)
    {
        $_t = explode('=', $_var);
        if (!$_t[1])
        {
            unset($_rvars[$_t[0]]);
        }
        else
        {
            $_rvars[$_t[0]] = $_t[1];
        }
    }
    $tr_vars = array();
    foreach ($_rvars as $_var => $_val)
    {
        $tr_vars[] = "$_var=$_val";
    }

    if ($_store)
    {
        global $_SERVER;
        $_request               = $_SERVER['REQUEST_URI'];
        $_SERVER['REQUEST_URI'] = preg_replace('|\?.*$|', '', $_request) . (count($tr_vars) ? '?' . implode
            ('&', $tr_vars) : '') . ($_anchor ? '#' . $_anchor : '');
        return $_SERVER['REQUEST_URI'];
    }
    else
    {
        return preg_replace('|\?.*$|', '', $_request) . (count($tr_vars) ? '?' . implode('&', $tr_vars) :
            '') . ($_anchor ? '#' . $_anchor : '');
    }
}
