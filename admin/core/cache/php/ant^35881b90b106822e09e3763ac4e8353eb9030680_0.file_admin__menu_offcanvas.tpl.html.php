<?php
/* Smarty version 5.3.1, created on 2024-08-22 13:40:12
  from 'file:admin__menu_offcanvas.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66c7158c3768f0_03837861',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35881b90b106822e09e3763ac4e8353eb9030680' => 
    array (
      0 => 'admin__menu_offcanvas.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin__menu_accordion.tpl.html' => 1,
    'file:atoms/aDivDropdownContainerSize.tpl.html' => 1,
  ),
))) {
function content_66c7158c3768f0_03837861 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\.antaNT64\\antCMS.os\\admin\\tpl';
if ($_smarty_tpl->getValue('show_offcanvas_menu_on_load')) {
$_smarty_tpl->assign('show', " show", false, NULL);
}?>
<div class="offcanvas offcanvas-start<?php echo $_smarty_tpl->getValue('show');?>
" tabindex="-1" id="offcanvasMenu" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="offcanvasMenuLabel" data-bs-theme="dark">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasMenuLabel">Меню <?php echo (defined('SITE_URL') ? constant('SITE_URL') : null);?>
 [Ctrl+Alt+M]</h5>
        <button class="btn btn-danger btn-sm bg-opacity-75 ms-4 me-1" name="arrowUp"><i class="bi bi-chevron-double-up" title="[Ctrl+Alt+Up/Down]"></i></button>
        <button class="btn btn-primary btn-sm bg-opacity-75 ms-1 me-4" name="arrowDown"><i class="bi bi-chevron-double-down" title="[Ctrl+Alt+Up/Down]"></i></button>
        <button type="button" class="btn-close" id="btnCloseMenu" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-between">
        <?php $_smarty_tpl->renderSubTemplate("file:admin__menu_accordion.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <hr>
        <div class="d-flex flex-column justify-content-between p-3 rounded-1 bg-dark" id="uiControl">
            <div class="d-flex justify-content-center">
                <a class="px-2 nav-link text-nowrap" aria-current="page" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
"><i class="bi bi-house-gear"></i> Admin </a>
                <a class="px-2 nav-link text-nowrap" href="index.php"><i class="bi bi-house"></i> <?php echo (defined('LANG_ADMIN_BACK_TO_SHOP') ? constant('LANG_ADMIN_BACK_TO_SHOP') : null);?>
 </a>
                <a class="px-2 nav-link text-nowrap" href="<?php echo (defined('ADMIN_LOGOUT_LINK') ? constant('ADMIN_LOGOUT_LINK') : null);?>
"><i class="bi bi-door-open"></i> <?php echo (defined('LANG_ADMIN_LOGOUT_LINK') ? constant('LANG_ADMIN_LOGOUT_LINK') : null);?>
 </a>
                <button class="btn btn-danger btn-sm bg-opacity-75 ms-4 me-1" name="arrowUp"><i class="bi bi-chevron-double-up" title="[Ctrl+Alt+Up/Down]"></i></button>
                <button class="btn btn-primary btn-sm bg-opacity-75 ms-1 me-4" name="arrowDown"><i class="bi bi-chevron-double-down" title="[Ctrl+Alt+Up/Down]"></i></button>
            </div>
            <hr>
            <div class="d-flex flex-row justify-content-between">
                <div class="form-check form-switch d-flex justify-content-start" title="Открывать это меню при каждой загрузке страницы">
                    <input class="form-check-input" type="checkbox" role="switch" name="switcherMenuOnLoad" id="switcherMenuOnLoad">
                    <label class="form-check-label px-3" for="switcherMenuOnLoad"><i class="bi bi-pin-angle-fill"></i></label>
                </div>
                <div class="d-flex justify-content-center">
                    <?php $_smarty_tpl->renderSubTemplate("file:atoms/aDivDropdownContainerSize.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                </div>
                <div class="form-check form-switch d-flex justify-content-end" title="Расположение меню">
                    <label class="form-check-label pe-1" for="switcherMenuPosition"><i class="bi bi-text-indent-left"></i></label>
                    <input class="form-check-input ms-2" type="checkbox" role="switch" name="switcherMenuPosition" id="switcherMenuPosition">
                    <label class="form-check-label ps-3" for="switcherMenuPosition"><i class="bi bi-text-indent-right"></i></label>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
