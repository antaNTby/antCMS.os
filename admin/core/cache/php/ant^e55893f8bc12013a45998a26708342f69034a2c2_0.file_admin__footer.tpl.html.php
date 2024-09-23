<?php
/* Smarty version 5.4.1, created on 2024-09-23 08:32:17
  from 'file:admin__footer.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f0fd611b92d1_17290777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e55893f8bc12013a45998a26708342f69034a2c2' => 
    array (
      0 => 'admin__footer.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66f0fd611b92d1_17290777 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antCMS.os\\admin\\tpl';
?><div class="d-flex justify-content-between align-items-center px-xl-0">
        <ul class="nav justify-content-start ms-2 me-1" title="Ширина контейнера страницы">
        <li class="nav-item dropup-center dropup">
            <a class="dropdown-toggle btn btn-outline-secondary my-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_smarty_tpl->getValue('container_width');?>

            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li>
                    <h6 class="dropdown-header">
                        sm: 540px<br>
                        md: 720px<br>
                        lg: 960px<br>
                        xl: 1140px<br>
                        xxl: 1320px
                    </h6>
                </li>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('allowedContainerWidths'), 'width');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('width')->value) {
$foreach8DoElse = false;
?>
                <?php if ($_smarty_tpl->getValue('container_width') == $_smarty_tpl->getValue('width')) {?>
                <li><a class="dropdown-item disabled" aria-disabled="true"><?php echo $_smarty_tpl->getValue('width');?>
</a></li>
                <?php } else { ?>
                <li><a class="dropdown-item" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
?change_template_width=<?php echo $_smarty_tpl->getValue('width');?>
"><?php echo $_smarty_tpl->getValue('width');?>
</a></li>
                <?php }?>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </li>
    </ul>
    <ul class="nav justify-content-start me-1" title="Позиция вывода Сообщений Сервера">
        <li class="nav-item dropup-center dropup">
            <a class="dropdown-toggle btn btn-outline-secondary my-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_smarty_tpl->getValue('allowedToastPlacementNames')[$_smarty_tpl->getValue('placementID')];?>

            </a>
            <ul class="dropdown-menu dropdown-menu-dark" id="allowedToastPlacementsList" data-placement=<?php echo $_smarty_tpl->getValue('placementID');?>
>
                <?php
$__section_tpi_0_loop = (is_array(@$_loop=$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('allowedToastPlacements'))) ? count($_loop) : max(0, (int) $_loop));
$__section_tpi_0_total = $__section_tpi_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_tpi'] = new \Smarty\Variable(array());
if ($__section_tpi_0_total !== 0) {
for ($__section_tpi_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_tpi']->value['index'] = 0; $__section_tpi_0_iteration <= $__section_tpi_0_total; $__section_tpi_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_tpi']->value['index']++){
?>
                <?php $_smarty_tpl->assign('indexTP', ($_smarty_tpl->getValue('__smarty_section_tpi')['index'] ?? null), false, NULL);?>
                <?php if ($_smarty_tpl->getValue('indexTP') == $_smarty_tpl->getValue('placementID')) {?>
                <a class="dropdown-item active" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
?change_toast_placement=<?php echo $_smarty_tpl->getValue('indexTP');?>
" data-key="<?php echo $_smarty_tpl->getValue('indexTP');?>
" data-value="top-0 start-0" aria-current="true"><?php echo $_smarty_tpl->getValue('indexTP');?>
 - <?php echo $_smarty_tpl->getValue('allowedToastPlacementNames')[$_smarty_tpl->getValue('indexTP')];?>
</a>
                <?php } else { ?>
                <a class="dropdown-item" href="<?php echo (defined('ADMIN_FILE') ? constant('ADMIN_FILE') : null);?>
?change_toast_placement=<?php echo $_smarty_tpl->getValue('indexTP');?>
" data-key="<?php echo $_smarty_tpl->getValue('indexTP');?>
" data-value="top-0 start-0"><?php echo $_smarty_tpl->getValue('indexTP');?>
 - <?php echo $_smarty_tpl->getValue('allowedToastPlacementNames')[$_smarty_tpl->getValue('indexTP')];?>
</a>
                <?php }?>
                <?php
}
}
?>
                                <li class="dropdown-item" title="Показывать только сообщения с ошибками">
                    <div class="form-check form-switch d-flex justify-content-start" title="Показывать только сообщения с ошибками">
                        <input class="form-check-input" type="checkbox" role="switch" name="switcherOnlyErrorsToastShow" id="switcherOnlyErrorsToastShow">
                        <label class="form-check-label px-1" for="switcherOnlyErrorsToastShow">&nbsp; Только ошибки</label>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
    <span class="navbar-text" data-id="template-now"> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),"%Y-%m-%d %H:%M");?>
</span>
    <span class="navbar-text">php <?php echo $_smarty_tpl->getValue('pver');?>
</span>
    <span class="navbar-text">db <?php echo $_smarty_tpl->getValue('mver');?>
</span>
    <a class="navbar-brand" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu"><img alt="nix.by logo" src="/media/logo64.png" height="32" /> <?php echo (defined('SITE_URL') ? constant('SITE_URL') : null);?>
 menu</a>
    <ul class="nav justify-content-end">
        <li class="nav-item"><a href="/" class="nav-link disabled px-2 text-reset">Home</a></li>
                <li class="nav-item dropup-center dropup">
            <button class="dropdown-toggle btn btn-outline-secondary my-1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-command"></i></button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" target="_blank" href="etfm.php"><i class="bi bi-house-exclamation-fill"></i> TinyFileManager</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <?php if ($_smarty_tpl->getValue('c')) {?><li><button class="dropdown-item text-bg-danger" name="btn_TerminateCompany" title="УДАЛИТЬ ЭТУ КОМПАНИЮ БЕЗО ВСЯКИХ НЕЖНОСТЕЙ" data-kill_id="<?php echo $_smarty_tpl->getValue('c')['companyID'];?>
" data-app="AdminCompany" data-operation="TerminateCompany"><i class="bi bi-sign-dead-end"></i> Удалить компанию</button></li><?php }?>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><button type="button" class="dropdown-item" id="btnSuccess">Показать Success</button></li>
                <li><button type="button" class="dropdown-item" id="btnDanger">Show Error</button></li>
                <li><button type="button" class="dropdown-item" id="btnShowToast">Show btnShowToast</button></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="#" class="nav-link disabled px-2  text-reset">About</a></li>
    </ul>
</div><?php }
}
