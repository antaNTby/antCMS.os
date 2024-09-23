<?php
/* Smarty version 5.3.1, created on 2024-08-23 15:58:04
  from 'file:atoms/aPageH1.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66c8875cc42365_37688332',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f80e88918275fbbe68fa3465f501c165f0e5901' => 
    array (
      0 => 'atoms/aPageH1.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66c8875cc42365_37688332 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antaNT64.local\\antCMS.os\\admin\\tpl\\atoms';
?><h1 class="h4 fw-lighter text-body" data-id="PageH1">
    <?php echo $_smarty_tpl->getValue('current_sub_name');?>
 <sub><?php echo $_smarty_tpl->getValue('current_dpt_name');?>
</sub>
</h1><?php }
}
