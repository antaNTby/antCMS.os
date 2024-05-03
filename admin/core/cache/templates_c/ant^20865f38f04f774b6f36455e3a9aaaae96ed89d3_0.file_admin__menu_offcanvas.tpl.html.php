<?php
/* Smarty version 5.1.0, created on 2024-05-03 22:50:33
  from 'file:admin__menu_offcanvas.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_6635400975a9e6_03360516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20865f38f04f774b6f36455e3a9aaaae96ed89d3' => 
    array (
      0 => 'admin__menu_offcanvas.tpl.html',
      1 => 1714455044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin__menu_accordion.tpl.html' => 1,
  ),
))) {
function content_6635400975a9e6_03360516 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS.os\\admin\\tpl';
?><div class="offcanvas offcanvas-end show" tabindex="-1" id="offcanvasMenu"  data-bs-scroll="false"  data-bs-backdrop="false" aria-labelledby="offcanvasMenuLabel" data-bs-theme="dark">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasMenuLabel">Меню <?php echo (defined('SITE_URL') ? constant('SITE_URL') : null);?>
</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php $_smarty_tpl->renderSubTemplate("file:admin__menu_accordion.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

        <div class="p-0 mt-5 d-block mt-auto">
            <a class="nav-link fs-5 active" aria-current="page" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><i class="bi bi-house-gear"></i> Admin </a>
            <a class="nav-link fs-5" href="index.php"><i class="bi bi-house"></i> <?php echo (defined('LANG_ADMIN_BACK_TO_SHOP') ? constant('LANG_ADMIN_BACK_TO_SHOP') : null);?>
 </a>
            <a class="nav-link fs-5" href="<?php echo (defined('ADMIN_LOGOUT_LINK') ? constant('ADMIN_LOGOUT_LINK') : null);?>
"><i class="bi bi-door-open"></i> <?php echo (defined('LANG_ADMIN_LOGOUT_LINK') ? constant('LANG_ADMIN_LOGOUT_LINK') : null);?>
 </a>
        </div>

    </div>
</div><?php }
}
