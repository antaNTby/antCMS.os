<?php
/* Smarty version 5.3.1, created on 2024-08-23 14:43:00
  from 'file:default_dpt.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66c875c473d4f1_42685558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '752ef755fb6b1970eab81a191a8c453162d25f94' => 
    array (
      0 => 'default_dpt.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:atoms/aBreadcrump.tpl.html' => 1,
    'file:atoms/aPageH1.tpl.html' => 1,
    'file:sub/default_sub.tpl.html' => 1,
  ),
))) {
function content_66c875c473d4f1_42685558 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antaNT64.local\\antCMS.os\\admin\\tpl';
$_smarty_tpl->renderSubTemplate("file:atoms/aBreadcrump.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
$_smarty_tpl->renderSubTemplate("file:atoms/aPageH1.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>



<?php $_smarty_tpl->renderSubTemplate("file:sub/default_sub.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
if ($_smarty_tpl->getValue('page_message') != '') {?>
<hr>
<div class="alert alert-<?php echo $_smarty_tpl->getValue('page_message_type');?>
 alert-dismissible fade show" role="alert">
  <strong><?php echo $_smarty_tpl->getValue('admin_page');?>
 !</strong> <?php echo $_smarty_tpl->getValue('page_message');?>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php }?>

<?php }
}
