<?php
/* Smarty version 5.1.0, created on 2024-04-26 12:32:12
  from 'file:admin__footer.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_662b749c1c18d4_70854441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7076ae345de04a38788850f6d8bab34f6b38f43' => 
    array (
      0 => 'admin__footer.tpl.html',
      1 => 1713884079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_662b749c1c18d4_70854441 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\OSPanel\\domains\\antCMS\\admin\\tpl';
?><div class="d-flex flex-wrap justify-content-between align-items-center py-1 px-2 px-xl-0">
    <p class="col-md-6 mb-0 text-muted"><span class="nix-brand">nix.by</span></p>
    <ul class="nav col-md-6 justify-content-end">
        <span class="navbar-text"> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),"%Y-%m-%d %H:%M");?>
</span>
        <li class="nav-item"><a href="/" class="nav-link disabled px-2 text-muted">Home</a></li>
        <li class="nav-item dropdown">
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-command"></i></button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" target="_blank" href="etfm.php"><i class="bi bi-house-exclamation-fill"></i> TinyFileManager</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <?php if ($_smarty_tpl->getValue('c')) {?><li><button class="dropdown-item text-bg-danger" name="btn_TerminateCompany" title="УДАЛИТЬ ЭТУ КОМПАНИЮ БЕЗО ВСЯКИХ НЕЖНОСТЕЙ" data-kill_id="<?php echo $_smarty_tpl->getValue('c')['companyID'];?>
" data-app="AdminCompany" data-operation="TerminateCompany"><i class="bi bi-sign-dead-end"></i> Удалить компанию</button></li><?php }?>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="#" class="nav-link disabled px-2 text-muted">About</a></li>
    </ul>
</div><?php }
}
