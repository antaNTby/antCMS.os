<?php
/* Smarty version 5.4.1, created on 2024-09-23 08:32:17
  from 'file:atoms/aPageH1.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f0fd610f0a12_72694650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '598898ac5ce6abd356ad0f8d3db4f45a344989cc' => 
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
function content_66f0fd610f0a12_72694650 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antCMS.os\\admin\\tpl\\atoms';
?><h1 class="h4 fw-lighter text-body" data-id="PageH1">
    <?php echo $_smarty_tpl->getValue('current_sub_name');?>
 <sub><?php echo $_smarty_tpl->getValue('current_dpt_name');?>
</sub>
</h1><?php }
}
