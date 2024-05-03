<?php
/* Smarty version 5.1.0, created on 2024-04-29 14:26:59
  from 'file:sub/standartsub.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_662f840395cce9_75921333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd78ed249a9a8a5968fb9fda695714573500fa423' => 
    array (
      0 => 'sub/standartsub.tpl.html',
      1 => 1714389115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_662f840395cce9_75921333 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl\\sub';
?><h5 class="bg-danger p-2 justify-content-center">
    Файл шаблона "<?php echo $_smarty_tpl->getValue('current_dpt');?>
_<?php echo $_smarty_tpl->getValue('current_sub');?>
.tpl.html" не найден в директории "tpl/sub/" <small class="text-body-secondary">выведен стандартный шаблон "tpl/sub/standartsub.tpl.html"</small>
</h5>
<div class="btn-group p-2 d-flex justify-content-center">
    <a class="btn btn-outline-secondary me-2" aria-current="page" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><i class="bi bi-house-gear"></i> <?php echo (defined('LANG_ADMINISTRATE_LINK') ? constant('LANG_ADMINISTRATE_LINK') : null);?>
 </a>
    <a class="btn btn-outline-secondary me-2" href="index.php"><i class="bi bi-house"></i> <?php echo (defined('LANG_ADMIN_BACK_TO_SHOP') ? constant('LANG_ADMIN_BACK_TO_SHOP') : null);?>
 </a>
    <a class="btn btn-outline-secondary me-2" href="<?php echo (defined('ADMIN_LOGOUT_LINK') ? constant('ADMIN_LOGOUT_LINK') : null);?>
"><i class="bi bi-door-open"></i> <?php echo (defined('LANG_ADMIN_LOGOUT_LINK') ? constant('LANG_ADMIN_LOGOUT_LINK') : null);?>
 </a>
</div><?php }
}
