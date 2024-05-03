<?php
/* Smarty version 5.1.0, created on 2024-05-03 13:06:19
  from 'file:notfound.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_6634b71bb52a02_06241561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6778240199d17e7df027e4087615effd27bd4de0' => 
    array (
      0 => 'notfound.tpl.html',
      1 => 1714455044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6634b71bb52a02_06241561 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl';
?><h3 class="text-dark bg-danger p-5" data-tpl="notfound.tpl.html">
    НЕТ *.php data-tpl="notfound.tpl.html"
</h3>
<div class="m-3 p-3 d-flex justify-content-center btn-group">
    <a class="btn btn-outline-secondary me-3" aria-current="page" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><i class="bi bi-house-gear"></i> <?php echo (defined('LANG_ADMINISTRATE_LINK') ? constant('LANG_ADMINISTRATE_LINK') : null);?>
 </a>
    <a class="btn btn-outline-secondary me-3" href="index.php"><i class="bi bi-house"></i> <?php echo (defined('LANG_ADMIN_BACK_TO_SHOP') ? constant('LANG_ADMIN_BACK_TO_SHOP') : null);?>
 </a>
    <a class="btn btn-outline-secondary me-3" href="<?php echo (defined('ADMIN_LOGOUT_LINK') ? constant('ADMIN_LOGOUT_LINK') : null);?>
"><i class="bi bi-door-open"></i> <?php echo (defined('LANG_ADMIN_LOGOUT_LINK') ? constant('LANG_ADMIN_LOGOUT_LINK') : null);?>
 </a>
</div><?php }
}
