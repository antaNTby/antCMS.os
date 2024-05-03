<?php
/* Smarty version 5.1.0, created on 2024-05-03 13:29:01
  from 'file:admin.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_6634bc6d6bbff3_48244498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe57df63cad05256cdb04dba2da812701b1e9e24' => 
    array (
      0 => 'admin.tpl.html',
      1 => 1714730825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin__navbar.tpl.html' => 1,
    'file:admin__menu_offcanvas.tpl.html' => 1,
    'file:admin__menu_accordion.tpl.html' => 1,
    'file:admin__footer.tpl.html' => 1,
    'file:../apps/Toasts/appToasts.tpl.html' => 1,
  ),
))) {
function content_6634bc6d6bbff3_48244498 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl';
?><!DOCTYPE html>
<html class="container-<?php echo (defined('ADMIN_BSCONTAINER_WIDTH') ? constant('ADMIN_BSCONTAINER_WIDTH') : null);?>
 h-100 text-bg-secondary bg-opacity-50" lang="ru-RU">
<?php $_smarty_tpl->assign('use_offcanvas_menu', 1, false, NULL);?>

<head>
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
    <link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css">
</head>

<body class="d-flex flex-column h-100 shadow-lg px-0" style="max-height: 2000px!important; overflow-y: scroll;">
    <header>
        <?php $_smarty_tpl->renderSubTemplate("file:admin__navbar.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </header>
    <?php if ($_smarty_tpl->getValue('smarty_error')) {?>
    <h6 class="text-bg-danger p-2">
        <?php echo $_smarty_tpl->getValue('smarty_error_message');?>

    </h6>
    <?php }?>
    <main class="flex-shrink-0" data-tpl="admin.tpl.html">
        <?php if ($_smarty_tpl->getValue('use_offcanvas_menu')) {?>
        <div class="container-<?php echo (defined('ADMIN_BSCONTAINER_WIDTH') ? constant('ADMIN_BSCONTAINER_WIDTH') : null);?>
">
            <div class="row" data-bs-theme="light">
                <?php $_smarty_tpl->renderSubTemplate("file:admin__menu_offcanvas.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            </div>
            <div class="row">
                <?php $_smarty_tpl->renderSubTemplate(((string)$_smarty_tpl->getValue('admin_main_content_template')), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            </div>
        </div>
        <?php } else { ?>
        <div class="container-<?php echo (defined('ADMIN_BSCONTAINER_WIDTH') ? constant('ADMIN_BSCONTAINER_WIDTH') : null);?>
">
            <div class="row">
                <div class="col order-2  order-md-1 col-md-4">
                    <?php $_smarty_tpl->renderSubTemplate("file:admin__menu_accordion.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                </div>
                <div class="colorder-1  order-md-2 col-md-8">
                    <?php $_smarty_tpl->renderSubTemplate(((string)$_smarty_tpl->getValue('admin_main_content_template')), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                </div>
            </div>
        </div>
        <?php }?>
    </main>
    <footer class=" text-bg-dark d-block mt-auto">
        <div class="container-<?php echo (defined('ADMIN_BSCONTAINER_WIDTH') ? constant('ADMIN_BSCONTAINER_WIDTH') : null);?>
">
            <?php $_smarty_tpl->renderSubTemplate("file:admin__footer.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
    </footer>
            <?php echo '<script'; ?>
 src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/lib/jquery/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/admin/js/admin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/admin/js/index.js" type="module"><?php echo '</script'; ?>
>
</body>
    <?php $_smarty_tpl->renderSubTemplate("file:../apps/Toasts/appToasts.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

</html><?php }
}
