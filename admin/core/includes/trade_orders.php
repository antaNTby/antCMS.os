<?php
###trade_orders.php
$DPT_SUB             = 'trade_orders';
$jsonPath            = 'tpl/sub/';
$jsonColumnsFileName = $jsonPath . $DPT_SUB . '__columns.json';

$subTables         = array(ORDERS_TABLE);
$dbTable           = ORDERS_TABLE;
$primaryKey        = 'orderID';
$dbTableFields     = db_getColumnNames($dbTable);
$dbTableFieldNames = array_keys($dbTableFields); // выводим в логг все названия полей

$dtColumnFieldNames = array(
    'orderID',
    'customerID',
    'order_time',
    'shipping_cost',
    'order_discount',
    'order_amount',
    'currency_code',
    'currency_value',
    'currency_round',
    'shippmethod',
    'paymethod',
    'companyID',
    'admin_comment',
);

$Columns = array();

if (file_exists($jsonColumnsFileName))
{
    $jsonColumns = file_get_contents($jsonColumnsFileName);
}
else
{
    foreach ($dtColumnFieldNames as $key => $value)
    {
        $newColumnItem = array(
            'index'      => $key,
            'data'       => $value,
            'db'         => $value,
            'dt'         => $value,
            'title'      => 'Заголовок',
            'orderable'  => true,
            'visible'    => true,
            'searchable' => true,
        );
        $Columns[] = $newColumnItem;
        // jlog($newColumnItem);
    }

    $jsonColumns        = json_encode($Columns, JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE | JSON_UNESCAPED_UNICODE);
    $saveNewJsonColumns = true;
}

if (isset($_GET['saveNewJsonColumns']) || $saveNewJsonColumns)
{
    $isSaved = file_put_contents($jsonColumnsFileName, $jsonColumns);
    header("Content-Type: application/json; charset=utf-8");
    die(json_encode('isSaved: ' . $isSaved));
}

$Columns = json_decode($jsonColumns);

cls();
jlog($Columns);

//show Smarty output
$smarty->assign('subTables', $subTables);
$smarty->assign('dtColumnFieldNames', $dtColumnFieldNames);
// $smarty->assign('jsonColumns', $jsonColumns);
$smarty->assign('Columns', $Columns);
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
