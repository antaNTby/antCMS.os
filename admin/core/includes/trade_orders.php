<?php
###trade_orders.php

$subTables         = array(ORDERS_TABLE);
$dbTable           = ORDERS_TABLE;
$primaryKey        = 'orderID';
$dbTableFields     = db_getColumnNames($dbTable);
$dbTableFieldNames = array_keys($dbTableFields); // выводим в логг все названия полей

$dtColumnFieldNames = array(
    'orderID',
    'customerID',
    'order_time',
    // 'shipping_cost',
     // 'order_discount',
     'order_amount',
    'currency_code',
    'currency_value',
    // 'currency_round',
     // 'shippmethod',
     // 'paymethod',
     // 'companyID',
     'admin_comment',
);

require PATH_CORE . 'dtGenerateColumns.php';
require PATH_CORE . 'dtInit.php';

//show Smarty output
$smarty->assign('subTables', $subTables);
$smarty->assign('dtColumnFieldNames', $dtColumnFieldNames);
// $smarty->assign('jsonColumns', $jsonColumns);
$smarty->assign('dtColumns', $Columns);
showSubSmartyOutput($DPT_SUB);

/*
"orderID",
"customerID",
"order_time",
"customer_ip",
"shipping_type",
"payment_type",
"customers_comment",
"statusID",
"shipping_cost",
"order_discount",
"order_amount",
"currency_code",
"currency_value",
"customer_firstname",
"customer_lastname",
"customer_email",
"shipping_firstname",
"shipping_lastname",
"shipping_country",
"shipping_state",
"shipping_city",
"shipping_address",
"billing_firstname",
"billing_lastname",
"billing_country",
"billing_state",
"billing_city",
"billing_address",
"cc_number",
"cc_holdername",
"cc_expires",
"cc_cvv",
"affiliateID",
"shippingServiceInfo",
"custlink",
"currency_round",
"shippmethod",
"paymethod",
"companyID",
"contractID",
"order_aka",
"customer_aka",
"admin_comment"

 */
;
{

}
