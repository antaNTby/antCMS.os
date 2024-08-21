<?php
/* Smarty version 5.3.1, created on 2024-08-21 10:42:23
  from 'file:admin.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66c59a5fa91b97_26712213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fff14e458f1fc670d73801e2adce03f191c811c3' => 
    array (
      0 => 'admin.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../apps/Toasts/appToasts.tpl.html' => 1,
    'file:admin__navbar.tpl.html' => 1,
    'file:admin__menu_offcanvas.tpl.html' => 1,
    'file:admin__footer.tpl.html' => 1,
  ),
))) {
function content_66c59a5fa91b97_26712213 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antaNT64\\antCMS.os\\admin\\tpl';
?><!DOCTYPE html>
<html class="h-100" lang="ru-BY"><?php $_smarty_tpl->assign('use_offcanvas_menu', 1, false, NULL);?>

<head>
    
    <style type="text/css">
    div.offcanvas {
        background-color: #8888aa88;
    }

    div.offcanvas-header {
        background-color: #222222;
    }

    div#uiControl {
        background-color: #8888aa02;
    }
    </style>
    
    <base href= />
    <link rel="icon" sizes=16x16 href="/media/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="title" content="admin antCMS" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>admin :: <?php echo (defined('SITE_URL') ? constant('SITE_URL') : null);?>
 :: antCMS v00 alpha</title>
            <link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="/lib/datatables/datatables.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/uiAdmin.css">
</head>


<body class="h-100" >     <?php if ($_smarty_tpl->getValue('smarty_error')) {?>
    <h6 class="text-bg-danger p-2">
        <?php echo $_smarty_tpl->getValue('smarty_error_message');?>

    </h6>
    <?php }?>

    <div aria-live="polite" aria-atomic="true" class="position-relative" id="toast-area">
        <!-- Position it: -->
        <!-- - `.toast-container` for spacing between toasts -->
        <!-- - `top-0` & `end-0` to position the toasts in the upper right corner -->
        <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
        <?php $_smarty_tpl->renderSubTemplate("file:../apps/Toasts/appToasts.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('position'=>0), (int) 0, $_smarty_current_dir);
?>
    </div>


<div id="wrapper" class="d-flex flex-column h-100">

    <header>
        <?php $_smarty_tpl->renderSubTemplate("file:admin__navbar.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </header>



    <?php $_smarty_tpl->renderSubTemplate("file:admin__menu_offcanvas.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    <main id="uiMain" class="flex-shrink-0" data-tpl="admin.tpl.html" style="padding-top:60px;">
        <div class="<?php echo $_smarty_tpl->getValue('container_width');?>
">
            <?php $_smarty_tpl->renderSubTemplate(((string)$_smarty_tpl->getValue('admin_main_content_template')), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
    </main>


    <footer id="uiFooter" class="text-bg-dark d-block mt-auto">
                    <?php $_smarty_tpl->renderSubTemplate("file:admin__footer.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            </footer>

</div>



            <?php echo '<script'; ?>
 src="/vendor/components/jquery/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/lib/datatables/datatables.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="/admin/js/admin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/admin/js/index.js" type="module"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/admin/js/dt/dataTables.cellEdit.js"><?php echo '</script'; ?>
>
    </body>

</html><?php }
}
