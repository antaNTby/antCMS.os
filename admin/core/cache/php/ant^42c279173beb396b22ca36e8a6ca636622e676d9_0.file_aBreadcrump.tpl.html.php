<?php
/* Smarty version 5.4.1, created on 2024-09-20 12:10:31
  from 'file:atoms/aBreadcrump.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66ed3c07275c79_91586600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42c279173beb396b22ca36e8a6ca636622e676d9' => 
    array (
      0 => 'atoms/aBreadcrump.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66ed3c07275c79_91586600 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antCMS.os\\admin\\tpl\\atoms';
?><nav class="my-1 d-flex flex-column-inverse flex-md-row-inverse justify-content-start justify-content-md-end" style="--bs-breadcrumb-divider: '::'" aria-label="breadcrumb">
    <ol class="my-0 px-1 breadcrumb text-small lh-1">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><i class="bi bi-house-gear"></i></a></li>
        <li class="breadcrumb-item"><a href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><?php echo $_smarty_tpl->getValue('current_dpt_name');?>
</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $_smarty_tpl->getValue('current_sub_name');?>
</li>
    </ol>
</nav><?php }
}
