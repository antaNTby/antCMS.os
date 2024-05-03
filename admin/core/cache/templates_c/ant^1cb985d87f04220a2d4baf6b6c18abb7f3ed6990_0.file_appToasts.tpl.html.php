<?php
/* Smarty version 5.1.0, created on 2024-05-03 10:27:08
  from 'file:tpl/apps/Toasts/appToasts.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_663491cc2478a8_64310526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cb985d87f04220a2d4baf6b6c18abb7f3ed6990' => 
    array (
      0 => 'tpl/apps/Toasts/appToasts.tpl.html',
      1 => 1713784779,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_663491cc2478a8_64310526 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl\\apps\\Toasts';
?><div class="toast-container position-fixed top-0 end-0 p-5">
    <div class="toast success-toast" id="mySuccess" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-bg-success bg-opacity-75">
                        <strong class="me-auto"><i class="bi bi-hand-thumbs-up-fill"></i> Данные сохранены</strong>
            <small class="showTime">10 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="message-body toast-body text-success bg-opacity-50">
            Запрос выполнен успешно         </div>
    </div>

    <div class="toast error-toast" id="myError" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-bg-danger bg-opacity-75">
                        <strong class="me-auto"><i class="bi bi-bug-fill"></i> Что-то пошло не так</strong>
            <small class="showTime">11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="message-body toast-body text-danger bg-opacity-50">
            Ошибка при выполнении запроса к серверу
        </div>
    </div>

    <div class="toast" id="myInvalid" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-danger bg-opacity-75">
                        <strong class="me-auto"><i class="bi bi-bug-fill"></i> Проверьте введенные данные</strong>
            <small class="showTime">10 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="message-body toast-body text-danger bg-opacity-50">
            Неверно заполнены данные формы
        </div>
    </div>
</div> 


<?php }
}
