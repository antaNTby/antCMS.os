<?php
/* Smarty version 5.1.0, created on 2024-05-03 13:29:01
  from 'file:admin__footer.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_6634bc6d71f669_57718482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a827bd18db284a043bd7e1a360c5277a225c881' => 
    array (
      0 => 'admin__footer.tpl.html',
      1 => 1714729628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6634bc6d71f669_57718482 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl';
?><div class="d-flex flex-wrap justify-content-between align-items-center px-xl-0">
        <span class="navbar-text" data-id="template-now"> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),"%Y-%m-%d %H:%M");?>
</span>
    <ul class="nav col-md-6 justify-content-end">
        <li class="nav-item"><a href="/" class="nav-link disabled px-2 text-muted">Home</a></li>
                <li class="nav-item dropdown">
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-command"></i></button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" target="_blank" href="etfm.php"><i class="bi bi-house-exclamation-fill"></i> TinyFileManager</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <?php if ($_smarty_tpl->getValue('c')) {?><li><button class="dropdown-item text-bg-danger" name="btn_TerminateCompany" title="УДАЛИТЬ ЭТУ КОМПАНИЮ БЕЗО ВСЯКИХ НЕЖНОСТЕЙ" data-kill_id="<?php echo $_smarty_tpl->getValue('c')['companyID'];?>
" data-app="AdminCompany" data-operation="TerminateCompany"><i class="bi bi-sign-dead-end"></i> Удалить компанию</button></li><?php }?>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><button type="button" class="dropdown-item" id="btnSuccess">Показать Success</button></li>
                <li><button type="button" class="dropdown-item" id="btnDanger">Show Error</button></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="#" class="nav-link disabled px-2 text-muted">About</a></li>
    </ul>
</div><?php }
}
