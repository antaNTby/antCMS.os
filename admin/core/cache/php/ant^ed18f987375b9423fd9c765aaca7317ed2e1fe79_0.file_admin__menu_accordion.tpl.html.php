<?php
/* Smarty version 5.4.1, created on 2024-09-23 08:32:17
  from 'file:admin__menu_accordion.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f0fd610787d4_65826057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed18f987375b9423fd9c765aaca7317ed2e1fe79' => 
    array (
      0 => 'admin__menu_accordion.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66f0fd610787d4_65826057 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antCMS.os\\admin\\tpl';
?><div class="accordion accordion-flush" id="DepartmentsAccordion" data-bs-theme="light">
    <?php
$__section_dpt_index_0_loop = (is_array(@$_loop=$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('Departments'))) ? count($_loop) : max(0, (int) $_loop));
$__section_dpt_index_0_total = $__section_dpt_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_dpt_index'] = new \Smarty\Variable(array());
if ($__section_dpt_index_0_total !== 0) {
for ($__section_dpt_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_dpt_index']->value['index'] = 0; $__section_dpt_index_0_iteration <= $__section_dpt_index_0_total; $__section_dpt_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_dpt_index']->value['index']++){
?>
    <?php $_smarty_tpl->assign('myMenu', $_smarty_tpl->getValue('Departments')[($_smarty_tpl->getValue('__smarty_section_dpt_index')['index'] ?? null)], false, NULL);?>
    <div class="accordion-item my-2">
        <h2 class="h6 accordion-header" id="heading_<?php echo $_smarty_tpl->getValue('myMenu')['id'];?>
">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo $_smarty_tpl->getValue('myMenu')['id'];?>
" aria-expanded="<?php if ($_smarty_tpl->getValue('current_dpt') == $_smarty_tpl->getValue('myMenu')['id']) {?>true<?php } else { ?>false<?php }?>" aria-controls="collapse_<?php echo $_smarty_tpl->getValue('myMenu')['id'];?>
">
                <?php echo $_smarty_tpl->getValue('myMenu')['name'];?>
 <sub class="ps-2 fw-lighter text-dark text-opacity-25"><?php echo $_smarty_tpl->getValue('myMenu')['id'];?>
</sub>
            </button>
        </h2>
        <div id="collapse_<?php echo $_smarty_tpl->getValue('myMenu')['id'];?>
" class="accordion-collapse collapse<?php if ($_smarty_tpl->getValue('current_dpt') == $_smarty_tpl->getValue('myMenu')['id']) {?> show<?php }?>" aria-labelledby="heading_<?php echo $_smarty_tpl->getValue('myMenu')['id'];?>
" data-bs-parent="#DepartmentsAccordion">
            <div class="accordion-body">
                <div class="d-grid gap-1 col mx-auto">
                    <?php $_smarty_tpl->assign('mySubMenu', $_smarty_tpl->getValue('myMenu')['sub_departments'], false, NULL);?>
                    <?php
$__section_sub_index_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('myMenu')['sub_count']) ? count($_loop) : max(0, (int) $_loop));
$__section_sub_index_0_total = $__section_sub_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sub_index'] = new \Smarty\Variable(array());
if ($__section_sub_index_0_total !== 0) {
for ($__section_sub_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index'] = 0; $__section_sub_index_0_iteration <= $__section_sub_index_0_total; $__section_sub_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index']++){
?>
                    <?php if ($_smarty_tpl->getValue('current_sub_id') == $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['id']) {?>

                    <a class="btn btn-danger text-wrap text-start text-xl-center" href="<?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['sub_href'];?>
" role="button"><?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['name'];?>
 <sub class="ps-2 fw-lighter text-dark text-opacity-25"><?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['id'];?>
</sub></a>

                    <?php } else { ?>

                    <a class="btn btn-light text-wrap text-start text-xl-center" href="<?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['sub_href'];?>
" role="button"><?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['name'];?>
 <sub class="ps-2 fw-lighter text-dark text-opacity-25"><?php echo $_smarty_tpl->getValue('mySubMenu')[($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]['id'];?>
</sub></a>

                    <?php }?>
                    <?php
}
}
?></div>
            </div>
        </div>
    </div>
    <?php
}
}
?>
</div><?php }
}
