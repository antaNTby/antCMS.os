<?php
/* Smarty version 5.1.0, created on 2024-04-26 13:16:23
  from 'file:admin__menu_accordion.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_662b7ef7ea8671_08675456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59a5b0a92c5a3417b9d176665da0fe3687470cc7' => 
    array (
      0 => 'admin__menu_accordion.tpl.html',
      1 => 1714108941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_662b7ef7ea8671_08675456 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl';
$_smarty_tpl->getCompiled()->nocache_hash = '1229842570662b7ef7e8af76_45203475';
?>
<div class="accordion accordion-flush" id="antMenuAccordeon">
    <?php
$__section_dpt_index_0_loop = (is_array(@$_loop=$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('antMenu'))) ? count($_loop) : max(0, (int) $_loop));
$__section_dpt_index_0_total = $__section_dpt_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_dpt_index'] = new \Smarty\Variable(array());
if ($__section_dpt_index_0_total !== 0) {
for ($__section_dpt_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_dpt_index']->value['index'] = 0; $__section_dpt_index_0_iteration <= $__section_dpt_index_0_total; $__section_dpt_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_dpt_index']->value['index']++){
?>
    <?php $_smarty_tpl->assign('myMenu', $_smarty_tpl->getValue('antMenu')[($_smarty_tpl->getValue('__smarty_section_dpt_index')['index'] ?? null)], false, NULL);?>
    <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="heading_<?php echo $_smarty_tpl->getValue('myMenu')['dpt_id'];?>
">
            <button class="accordion-button fs-4 text-light fw-lighter text-uppercase bg-dark bg-gradient bg-opacity-75" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo $_smarty_tpl->getValue('myMenu')['dpt_id'];?>
" aria-expanded="<?php if ($_smarty_tpl->getValue('current_dpt') == $_smarty_tpl->getValue('myMenu')['dpt_id']) {?>true<?php } else { ?>false<?php }?>" aria-controls="collapse_<?php echo $_smarty_tpl->getValue('myMenu')['dpt_id'];?>
">
                <?php echo $_smarty_tpl->getValue('myMenu')['dpt_name'];?>
 <sub class="ps-2 fw-lighter text-dark text-opacity-25"><?php echo $_smarty_tpl->getValue('myMenu')['dpt_id'];?>
</sub>
            </button>
        </h2>
        <div id="collapse_<?php echo $_smarty_tpl->getValue('myMenu')['dpt_id'];?>
" class="accordion-collapse collapse<?php if ($_smarty_tpl->getValue('current_dpt') == $_smarty_tpl->getValue('myMenu')['dpt_id']) {?> show<?php }?>" aria-labelledby="heading_<?php echo $_smarty_tpl->getValue('myMenu')['dpt_id'];?>
" data-bs-parent="#antMenuAccordeon">
            <div class="accordion-body">
                <div class="d-grid gap-1 col-12 mx-auto">
                    <?php $_smarty_tpl->assign('mySubMenu', $_smarty_tpl->getValue('myMenu'), false, NULL);?>
                    <?php
$__section_sub_index_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('mySubMenu')['sub_count']) ? count($_loop) : max(0, (int) $_loop));
$__section_sub_index_0_total = $__section_sub_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sub_index'] = new \Smarty\Variable(array());
if ($__section_sub_index_0_total !== 0) {
for ($__section_sub_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index'] = 0; $__section_sub_index_0_iteration <= $__section_sub_index_0_total; $__section_sub_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sub_index']->value['index']++){
?>
                    <?php if ($_smarty_tpl->getValue('mySubMenu')['sub_id'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)] == "custlist") {?>
                    <?php $_smarty_tpl->assign('myHrefMod', "&groupID=0&fActState=-1&search=1", false, NULL);?>
                    <?php } else { ?>
                    <?php $_smarty_tpl->assign('myHrefMod', '', false, NULL);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('current_sub') == $_smarty_tpl->getValue('mySubMenu')['sub_id'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)]) {?>
                    <a class="btn btn-danger text-wrap text-start text-xl-center" href="<?php echo $_smarty_tpl->getValue('mySubMenu')['sub_href'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)];
echo $_smarty_tpl->getValue('myHrefMod');?>
" role="button"><?php echo $_smarty_tpl->getValue('mySubMenu')['sub_name'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)];?>
 <sub class="ps-2 fw-lighter text-dark text-opacity-25"><?php echo $_smarty_tpl->getValue('mySubMenu')['sub_id'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)];?>
</sub></a>
                    <?php } else { ?>
                    <a class="btn btn-light text-wrap text-start text-xl-center" href="<?php echo $_smarty_tpl->getValue('mySubMenu')['sub_href'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)];
echo $_smarty_tpl->getValue('myHrefMod');?>
" role="button"><?php echo $_smarty_tpl->getValue('mySubMenu')['sub_name'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)];?>
 <sub class="ps-2 fw-lighter text-dark text-opacity-25"><?php echo $_smarty_tpl->getValue('mySubMenu')['sub_id'][($_smarty_tpl->getValue('__smarty_section_sub_index')['index'] ?? null)];?>
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
