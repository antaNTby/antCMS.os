<?php
/* Smarty version 5.1.0, created on 2024-04-26 13:16:23
  from 'file:admin__menu_offcanvas.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_662b7ef7e863a7_45370897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97a0c496284cf7df9ffdd270900867f3ef9ac703' => 
    array (
      0 => 'admin__menu_offcanvas.tpl.html',
      1 => 1714108941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin__menu_accordion.tpl.html' => 1,
  ),
))) {
function content_662b7ef7e863a7_45370897 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl';
$_smarty_tpl->getCompiled()->nocache_hash = '299004019662b7ef7e84ee9_83882460';
?>
<div class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvasExample" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Меню <?php echo (defined('SITE_URL') ? constant('SITE_URL') : null);?>
</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
        </div>
        
        <?php $_smarty_tpl->renderSubTemplate("file:admin__menu_accordion.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>
</div><?php }
}
