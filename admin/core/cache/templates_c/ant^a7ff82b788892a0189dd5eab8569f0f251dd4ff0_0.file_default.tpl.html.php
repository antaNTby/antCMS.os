<?php
/* Smarty version 5.1.0, created on 2024-05-03 13:06:10
  from 'file:default.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_6634b712d95516_92962053',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7ff82b788892a0189dd5eab8569f0f251dd4ff0' => 
    array (
      0 => 'default.tpl.html',
      1 => 1714030404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6634b712d95516_92962053 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl';
?><div class="m-3 row row-cols-1 row-cols-md-3 g-3">
    <?php
$__section_dpt_index_0_loop = (is_array(@$_loop=$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('antMenu'))) ? count($_loop) : max(0, (int) $_loop));
$__section_dpt_index_0_total = $__section_dpt_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_dpt_index'] = new \Smarty\Variable(array());
if ($__section_dpt_index_0_total !== 0) {
for ($__section_dpt_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_dpt_index']->value['index'] = 0; $__section_dpt_index_0_iteration <= $__section_dpt_index_0_total; $__section_dpt_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_dpt_index']->value['index']++){
?>
    <?php $_smarty_tpl->assign('myMenu', $_smarty_tpl->getValue('antMenu')[($_smarty_tpl->getValue('__smarty_section_dpt_index')['index'] ?? null)], false, NULL);?>
    <div class="col">
        <div class="card h-100 border-dark">
            <div class="card-header text-bg-secondary  h5">
                <?php echo $_smarty_tpl->getValue('myMenu')['dpt_name'];?>
<sub class="ps-2 fw-lighter text-dark text-opacity-25"><?php echo $_smarty_tpl->getValue('myMenu')['dpt_id'];?>
</sub>
            </div>
            <ul class="list-group list-group-flush">
                <?php $_smarty_tpl->assign('mySubMenu', $_smarty_tpl->getValue('myMenu'), false, NULL);?>
                <?php
$__section_sub_index_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('mySubMenu')['sub_count']) ? count($_loop) : max(0, (int) $_loop));
$__section_sub_index_0_total = $__section_sub_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sub_index'] = new \Smarty\Variable(array());
if ($__section_sub_index_0_total !== 0) {
for ($__section_sub_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index'] = 0; $__section_sub_index_0_iteration <= $__section_sub_index_0_total; $__section_sub_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index']++){
?>
                <li class="list-group-item"><a class="card-link text-start text-xl-center text-decoration-none" href="<?php echo $_smarty_tpl->getValue('mySubMenu')['sub_href'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)];?>
" role="button"><?php echo $_smarty_tpl->getValue('mySubMenu')['sub_name'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)];?>
 <sub class="ps-2 fw-lighter text-dark text-opacity-25 text-decoration-none"><?php echo $_smarty_tpl->getValue('mySubMenu')['sub_id'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)];?>
</sub></a></li>
                <?php
}
}
?>
            </ul>
        </div>
    </div>
    <?php
}
}
?>

    <b>admintempname:<?php echo $_smarty_tpl->getValue('admintempname');?>
</b>
</div><?php }
}
