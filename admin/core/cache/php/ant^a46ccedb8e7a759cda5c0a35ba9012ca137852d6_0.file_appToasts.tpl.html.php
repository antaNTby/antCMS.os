<?php
/* Smarty version 5.3.1, created on 2024-08-22 13:26:33
  from 'file:C:\OSPanel\home\antaNT64\antCMS.os\admin\tpl\../apps/Toasts/appToasts.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66c712597cb575_73018649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a46ccedb8e7a759cda5c0a35ba9012ca137852d6' => 
    array (
      0 => 'C:\\OSPanel\\home\\antaNT64\\antCMS.os\\admin\\tpl\\../apps/Toasts/appToasts.tpl.html',
      1 => 1724147155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66c712597cb575_73018649 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\OSPanel\\home\\antaNT64\\antCMS.os\\admin\\apps\\Toasts';
?>
<div class="toast-container position-fixed <?php echo $_smarty_tpl->getValue('toast_placement');?>
 p-5" id="toast-container">
    <div class="toast success-toast" id="mySuccess" role="alert" aria-live="assertive" aria-atomic="true"  data-bs-delay="10000">
        <div class="toast-header text-bg-success bg-opacity-75">
                        <strong class="me-auto"><i class="bi bi-hand-thumbs-up-fill"></i> Данные сохранены</strong>
            <small class="showTime">10 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="message-body toast-body text-success bg-opacity-50">
            Запрос выполнен успешно         </div>
    </div>
    <div class="toast error-toast" id="myError" role="alert" aria-live="assertive" aria-atomic="true"  data-bs-delay="10000">
        <div class="toast-header text-bg-danger bg-opacity-75">
                        <strong class="me-auto"><i class="bi bi-bug-fill"></i> Что-то пошло не так</strong>
            <small class="showTime">11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="message-body toast-body text-danger bg-opacity-50">
            Ошибка при выполнении запроса к серверу
        </div>
    </div>
    <div class="toast" id="myInvalidForm" role="alert" aria-live="assertive" aria-atomic="true"  data-bs-delay="10000">
        <div class="toast-header text-danger bg-opacity-75">
                        <strong class="me-auto"><i class="bi bi-bug-fill"></i> Проверьте введенные данные</strong>
            <small class="showTime">10 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="message-body toast-body text-danger bg-opacity-50">
            Неверно заполнены данные формы
        </div>
    </div>
</div> <?php }
}
