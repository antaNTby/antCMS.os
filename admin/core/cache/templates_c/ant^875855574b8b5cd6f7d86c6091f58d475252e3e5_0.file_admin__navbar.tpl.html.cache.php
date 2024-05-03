<?php
/* Smarty version 5.1.0, created on 2024-04-26 13:16:23
  from 'file:admin__navbar.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_662b7ef7e81164_69142239',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '875855574b8b5cd6f7d86c6091f58d475252e3e5' => 
    array (
      0 => 'admin__navbar.tpl.html',
      1 => 1714108941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_662b7ef7e81164_69142239 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl';
$_smarty_tpl->getCompiled()->nocache_hash = '708220161662b7ef7e7d9b4_14354370';
?>
<nav class="navbar navbar-dark navbar-expand-lg  bg-dark bg-gradient bg-opacity-75">
    <div class="container-xxl">
        <a class="navbar-brand" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><img alt="nix.by logo" src="/media/logo64.png" height="32" /> <?php echo (defined('SITE_URL') ? constant('SITE_URL') : null);?>
</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <span class="navbar-text d-none d-sm-inline-block">login </span>
            <span class="navbar-text badge bg-dark mx-1 mx-lg-3" id="adminName" data-adminname="<?php echo $_smarty_tpl->getValue('admintempname');?>
"></span>
                        <div class="navbar-nav me-auto mb-2 mb-lg-0 d-flex d-lg-none">
                <hr>
                <a class="nav-link active" aria-current="page" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><?php echo (defined('LANG_ADMINISTRATE_LINK') ? constant('LANG_ADMINISTRATE_LINK') : null);?>
 <i class="bi bi-house-gear"></i></a>
                <a class="nav-link" href="index.php"><?php echo (defined('LANG_ADMIN_BACK_TO_SHOP') ? constant('LANG_ADMIN_BACK_TO_SHOP') : null);?>
 <i class="bi bi-house"></i></a>
                <a class="nav-link" href="index.php?logout=yes"><?php echo (defined('LANG_ADMIN_LOGOUT_LINK') ? constant('LANG_ADMIN_LOGOUT_LINK') : null);?>
 <i class="bi bi-door-open"></i></a>
            </div>
        </div>
        <div class="navbar-nav d-none d-lg-flex me-0 mb-2 mb-lg-0">
            <a class="nav-link fs-5 active" aria-current="page" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><i class="bi bi-house-gear"></i> Admin </a>
            <a class="nav-link fs-5" href="index.php"><i class="bi bi-house"></i> <?php echo (defined('LANG_ADMIN_BACK_TO_SHOP') ? constant('LANG_ADMIN_BACK_TO_SHOP') : null);?>
 </a>
            <a class="nav-link fs-5" href="index.php?logout=yes"><i class="bi bi-door-open"></i> <?php echo (defined('LANG_ADMIN_LOGOUT_LINK') ? constant('LANG_ADMIN_LOGOUT_LINK') : null);?>
 </a>
        </div>
    </div>
</nav><?php }
}
