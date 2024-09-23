<?php
/* Smarty version 5.4.1, created on 2024-09-23 08:31:23
  from 'file:atoms/aEmptyTableBodyWithPlaceholders.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f0fd2b1ec6e8_47209855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3ffd1fc3b2f4b25ed59c1fdfce72d9c93e470ae' => 
    array (
      0 => 'atoms/aEmptyTableBodyWithPlaceholders.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66f0fd2b1ec6e8_47209855 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antCMS.os\\admin\\tpl\\atoms';
$_smarty_tpl->tpl_vars['__smarty_section_upR'] = new \Smarty\Variable(array());
if (true) {
for ($__section_upR_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_upR']->value['index'] = 0; $__section_upR_0_iteration <= 5; $__section_upR_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_upR']->value['index']++){
?>
<tr class="ant-text-no-rotated align-items-center">
    <td><?php echo ($_smarty_tpl->getValue('__smarty_section_upR')['index'] ?? null);?>
</td>
    <?php
$__section_tdP_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('countTD')) ? count($_loop) : max(0, (int) $_loop));
$__section_tdP_0_total = $__section_tdP_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_tdP'] = new \Smarty\Variable(array());
if ($__section_tdP_0_total !== 0) {
for ($__section_tdP_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_tdP']->value['index'] = 0; $__section_tdP_0_iteration <= $__section_tdP_0_total; $__section_tdP_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_tdP']->value['index']++){
?>
    <td>
        <p class="placeholder-wave">
            <span class="placeholder col-12  placeholder-lg"></span>
        </p>
    </td>
    <?php
}
}
?>
</tr>
<?php
}
}
if ((null !== ($_GET['operation'] ?? null))) {?>
<tr class="align-items-center">
    <td colspan=<?php echo $_smarty_tpl->getValue('countTD');?>
>
        <div class="progress" role="progressbar" aria-label="Animated striped" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="height: 40px">
            <div data-progress="<?php echo $_smarty_tpl->getValue('progressPercent');?>
" class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: <?php echo $_smarty_tpl->getValue('progressPercent');?>
%">Пожалуйста, подождите ...</div>
        </div>
    </td>
</tr>
<?php }?>

<?php
$_smarty_tpl->tpl_vars['__smarty_section_lowR'] = new \Smarty\Variable(array());
if (true) {
for ($__section_lowR_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_lowR']->value['index'] = 6; $__section_lowR_0_iteration <= 3; $__section_lowR_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_lowR']->value['index']++){
?>
<tr class="ant-text-no-rotated align-items-center">
    <td><?php echo ($_smarty_tpl->getValue('__smarty_section_lowR')['index'] ?? null);?>
</td>
    <?php
$__section_tdP_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('countTD')) ? count($_loop) : max(0, (int) $_loop));
$__section_tdP_0_total = $__section_tdP_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_tdP'] = new \Smarty\Variable(array());
if ($__section_tdP_0_total !== 0) {
for ($__section_tdP_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_tdP']->value['index'] = 0; $__section_tdP_0_iteration <= $__section_tdP_0_total; $__section_tdP_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_tdP']->value['index']++){
?>
    <td>
        <p class="placeholder-glow">
            <span class="placeholder col-12  placeholder-lg"></span>
        </p>
    </td>
    <?php
}
}
?>
</tr>
<?php
}
}
?>



<?php if ((null !== ($_GET['operation'] ?? null))) {?>
<input id="toastTimer" name="toastTimer" type="hidden" value=<?php echo $_smarty_tpl->getValue('timerSec');?>
>


<?php echo '<script'; ?>
>

const iterationCount = 10;

let divProgress = document.querySelector("div[data-progress]");
let timerEl = document.querySelector('input[name="toastTimer"]');

let time = 10; // 30 sec
if (timerEl && timerEl.value > 0) {
    time = timerEl.value; // 30 sec
}
let step = 100/iterationCount; //0.3 sec
let increment = 0; // счетчик

function doProgress() {

    if (increment <= iterationCount) {
        let percentCss =  (step * increment); //  10s*0 //+10s*1 //10*2 // 10*3
        divProgress.style.width = percentCss + "%";
        // console.log(percentCss,increment,divProgress.style.width);
    increment = increment + 1;
    }

return false;
}

setInterval(doProgress, Math.ceil(time*1000/(iterationCount)));
doProgress();

<?php echo '</script'; ?>
>

<?php }
}
}
