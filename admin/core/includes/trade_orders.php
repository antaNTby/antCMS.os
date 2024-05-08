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



$saveNewJsonColumns = false;

$Columns = array();

$ForceSaveJsonColumns = false;
    // dump($jsonColumnsFileName);
if (file_exists($jsonColumnsFileName))
{
    $jsonColumns = file_get_contents($jsonColumnsFileName);
    // dump($jsonColumns);
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
            'title'      => 'title ' . $value,
            'orderable'  => true,
            'visible'    => true,
            'searchable' => true,
            'formatter'  => null,
        );
        $Columns[] = $newColumnItem;
        // jlog($newColumnItem);
    }

    $ForceSaveJsonColumns = true;
    $jsonColumns        = json_encode($Columns, JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE | JSON_UNESCAPED_UNICODE);

}

if ( $ForceSaveJsonColumns )
{
    $isSaved = file_put_contents($jsonColumnsFileName, $jsonColumns);
    header("Content-Type: text/html; charset=utf-8");
    echo ($jsonColumnsFileName . ' Is saved size: ' . format_size($isSaved));
}



if (isset($_GET['operation']))
{

    $Columns = json_decode($jsonColumns, true); //as array

    if ($_GET['operation'] === "getDataTableData")
    {
        $ssp_result = adminSSP::simple($_POST, $pdo_connect, $dbTable, $primaryKey, $Columns);
        header("Content-Type: application/json; charset=utf-8");
        die(json_encode($ssp_result));
    }

}



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
