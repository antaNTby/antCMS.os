<?php
/* Smarty version 5.3.1, created on 2024-08-22 13:26:33
  from 'file:atoms/aPageH1.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66c712598605b3_02478951',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '685e0261a70dfa69099498daf54f440a836a9ce8' => 
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
function content_66c712598605b3_02478951 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antaNT64\\antCMS.os\\admin\\tpl\\atoms';
?><h1 class="h4 fw-lighter text-body" data-id="PageH1">
    <?php echo $_smarty_tpl->getValue('current_sub_name');?>
 <sub><?php echo $_smarty_tpl->getValue('current_dpt_name');?>
</sub>
</h1><?php }
}
