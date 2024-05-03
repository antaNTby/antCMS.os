<?php
/* Smarty version 5.1.0, created on 2024-05-03 22:50:33
  from 'file:admin__navbar.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_66354009743174_93018212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8d56f3e5c730f3c147adfbac92debe0b71fd4a5' => 
    array (
      0 => 'admin__navbar.tpl.html',
      1 => 1714455044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66354009743174_93018212 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS.os\\admin\\tpl';
?><nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-xxl">
        <a class="navbar-brand" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu"><img alt="nix.by logo" src="/media/logo64.png" height="32" /> <?php echo (defined('SITE_URL') ? constant('SITE_URL') : null);?>
</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <span class="navbar-text d-none d-sm-inline-block">login </span>
            <span class="navbar-text badge text-bg-secondary mx-1 mx-lg-3" id="adminName" data-adminname="<?php echo $_smarty_tpl->getValue('admintempname');?>
"><?php echo $_smarty_tpl->getValue('admintempname');?>
</span>
                        <div class="navbar-nav me-auto mb-2 mb-lg-0 d-flex d-lg-none">
                <hr>
                <a class="nav-link active" aria-current="page" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><?php echo (defined('LANG_ADMINISTRATE_LINK') ? constant('LANG_ADMINISTRATE_LINK') : null);?>
 <i class="bi bi-house-gear"></i></a>
                <a class="nav-link" href="index.php"><?php echo (defined('LANG_ADMIN_BACK_TO_SHOP') ? constant('LANG_ADMIN_BACK_TO_SHOP') : null);?>
 <i class="bi bi-house"></i></a>
                <a class="nav-link" href="<?php echo (defined('ADMIN_LOGOUT_LINK') ? constant('ADMIN_LOGOUT_LINK') : null);?>
"><?php echo (defined('LANG_ADMIN_LOGOUT_LINK') ? constant('LANG_ADMIN_LOGOUT_LINK') : null);?>
 <i class="bi bi-door-open"></i></a>
            </div>
        </div>
        <div class="navbar-nav d-none d-lg-flex me-0 mb-2 mb-lg-0">
            <a class="nav-link fs-5 active" aria-current="page" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><i class="bi bi-house-gear"></i> Admin </a>
            <a class="nav-link fs-5" href="index.php"><i class="bi bi-house"></i> <?php echo (defined('LANG_ADMIN_BACK_TO_SHOP') ? constant('LANG_ADMIN_BACK_TO_SHOP') : null);?>
 </a>
            <a class="nav-link fs-5" href="<?php echo (defined('ADMIN_LOGOUT_LINK') ? constant('ADMIN_LOGOUT_LINK') : null);?>
"><i class="bi bi-door-open"></i> <?php echo (defined('LANG_ADMIN_LOGOUT_LINK') ? constant('LANG_ADMIN_LOGOUT_LINK') : null);?>
 </a>
        </div>
    </div>
</nav><?php }
}
