<?php
/* Smarty version 5.4.1, created on 2024-09-23 08:19:24
  from 'file:start.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f0fa5c873255_94521654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5b24adf566b0de53fc7ccc0ff7d23adde45a5f9' => 
    array (
      0 => 'start.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66f0fa5c873255_94521654 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antCMS.os\\admin\\tpl';
?><h1 class="display-5 text-xl-center">Welcome, <span class="badge text-bg-secondary"> <?php echo $_smarty_tpl->getValue('adminlogname');?>
 ! </span></h1>
<div class="m-4 row row-cols-1 row-cols-md-3 g-3">
    <?php
$__section_dpt_index_0_loop = (is_array(@$_loop=$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('Departments'))) ? count($_loop) : max(0, (int) $_loop));
$__section_dpt_index_0_total = $__section_dpt_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_dpt_index'] = new \Smarty\Variable(array());
if ($__section_dpt_index_0_total !== 0) {
for ($__section_dpt_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_dpt_index']->value['index'] = 0; $__section_dpt_index_0_iteration <= $__section_dpt_index_0_total; $__section_dpt_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_dpt_index']->value['index']++){
?>
    <?php $_smarty_tpl->assign('myMenu', $_smarty_tpl->getValue('Departments')[($_smarty_tpl->getValue('__smarty_section_dpt_index')['index'] ?? null)], false, NULL);?>
    <div class="col">
        <div class="card h-100 border-dark">
            <div class="h5 card-header text-bg-dark">
                <?php echo $_smarty_tpl->getValue('myMenu')['name'];?>
<sub class="ps-2 fw-lighter text-dark text-opacity-25"><?php echo $_smarty_tpl->getValue('myMenu')['id'];?>
</sub>
            </div>
            <ul class="list-group list-group-flush">
                <?php $_smarty_tpl->assign('mySubMenu', $_smarty_tpl->getValue('myMenu')['sub_departments'], false, NULL);?>
                <?php
$__section_sub_index_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('myMenu')['sub_count']) ? count($_loop) : max(0, (int) $_loop));
$__section_sub_index_0_total = $__section_sub_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sub_index'] = new \Smarty\Variable(array());
if ($__section_sub_index_0_total !== 0) {
for ($__section_sub_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index'] = 0; $__section_sub_index_0_iteration <= $__section_sub_index_0_total; $__section_sub_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index']++){
?>
                <?php if ($_smarty_tpl->getValue('current_sub_id') == $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['id']) {?>
                <li class="list-group-item bg-danger" aria-current="true"><a class="card-link text-white text-start text-xl-center text-decoration-none" href="<?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['sub_href'];?>
" role="button"><?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['name'];?>
 <sub class="ps-2 fw-lighter text-dark text-opacity-25 text-decoration-none"><?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['id'];?>
</sub></a></li>
                <?php } else { ?>
                <li class="list-group-item"><a class="card-link text-dark text-start text-xl-center text-decoration-none" href="<?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['sub_href'];?>
" role="button"><?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['name'];?>
 <sub class="ps-2 fw-lighter text-dark text-opacity-25 text-decoration-none"><?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['id'];?>
</sub></a></li>
                <?php }?>
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
</div><?php }
}
