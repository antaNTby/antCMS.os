<?php
/* Smarty version 5.1.0, created on 2024-04-26 12:33:02
  from 'file:trade.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_662b74ce3abd55_39070677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63d5e5240f5c171d34dbc79e25ccf74301d128cb' => 
    array (
      0 => 'trade.tpl.html',
      1 => 1714108941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_662b74ce3abd55_39070677 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\OSPanel\\domains\\antCMS\\admin\\tpl';
$__section_sub_index_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('admin_sub_departments')) ? count($_loop) : max(0, (int) $_loop));
$__section_sub_index_0_total = $__section_sub_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sub_index'] = new \Smarty\Variable(array());
if ($__section_sub_index_0_total !== 0) {
for ($__section_sub_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index'] = 0; $__section_sub_index_0_iteration <= $__section_sub_index_0_total; $__section_sub_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index']++){
if ($_smarty_tpl->getValue('current_sub') == $_smarty_tpl->getValue('admin_sub_departments')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['id']) {?>
<nav class="my-1 d-flex flex-column-inverse flex-md-row-inverse justify-content-start justify-content-md-end" style="--bs-breadcrumb-divider: '::';" aria-label="breadcrumb">
    <ol class="my-0 px-1 breadcrumb text-small lh-1">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><i class="bi bi-house-gear"></i></a></li>
        <li class="breadcrumb-item"><a href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><?php echo $_smarty_tpl->getValue('current_dpt_name');?>
</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $_smarty_tpl->getValue('admin_sub_departments')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['name'];?>
</li>
    </ol>
</nav>
<h1 class="h1 fw-lighter text-body" data-id="PageH1">
    <?php echo $_smarty_tpl->getValue('admin_sub_departments')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['name'];?>

</h1>
<?php }
}
}
?>
<div class="row">
    <div class="col">
        <hr>
        <?php $_smarty_tpl->renderSubTemplate("sub/".((string)$_smarty_tpl->getValue('admin_sub_dpt')), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>
</div>
<?php }
}
