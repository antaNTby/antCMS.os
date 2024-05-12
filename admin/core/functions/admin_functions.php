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

    $_anchor                  = '';
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
