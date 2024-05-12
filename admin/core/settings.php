<?php
### НАСТРОЙКИ
#    //    {$smarty.const.

/*Количество часов, в течении которых магазин будет "помнить" посетителей  Укажите количество часов, в течении которых магазин будет "помнить" посетителей после последнего посещения. По истечении срока сессия удаляется.*/
const CONF_SECURITY_EXPIRE       = 12; //   {$smarty.const.CONF_SECURITY_EXPIRE}
const ADMIN_SMARTY_FORCE_COMPILE = 1;  //   {$smarty.const.ADMIN_SMARTY_FORCE_COMPILE}


const ADMIN_BSCONTAINER_WIDTH = 'lg'; //    {$smarty.const.ADMIN_BSCONTAINER_WIDTH}


const CONF_SECURE_SESSIONS = 1; //   {$smarty.const.CONF_SECURE_SESSIONS}  Использовать безопасные сессии    При использовании данной опции ip адрес и поле user_agent будут сверяться с начальным значением при старте сессии

const CONF_ENABLE_REGCONFIRMATION = 0; //Требовать активацию учетной записи покупателя после регистрации Если данная опция включена, покупателю будет отправляться по электронной почте ключ активации, который он должен ввести после заполнения регистрационной формы. Это позволяет проверять правильность ввода электронного адреса