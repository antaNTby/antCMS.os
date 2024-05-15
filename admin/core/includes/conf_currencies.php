<?php
###conf_currencies.php

$subTables         = array(CURRENCY_TYPES_TABLE);
$dbTable           = CURRENCY_TYPES_TABLE;
$primaryKey        = 'CID';
$dbTableFields     = db_getColumnNames($dbTable);
$dbTableFieldNames = array_keys($dbTableFields); // выводим в логг все названия полей

// dump($dbTableFieldNames);

$dtColumnFieldNames = array(
    "CID",
    "Name",
    "code",
    "currency_value",
    "where2show",
    "sort_order",
    "currency_iso_3",
    "roundval",
);

require PATH_CORE . 'dtGenerateColumns.php';
require PATH_CORE . 'dtInit.php';

//show Smarty output
$smarty->assign('subTables', $subTables);
$smarty->assign('dtColumnFieldNames', $dtColumnFieldNames);
// $smarty->assign('jsonColumns', $jsonColumns);
$smarty->assign('dtColumns', $Columns);
showSubSmartyOutput($admin_page);

/*
"CID",
"Name",
"code",
"currency_value",
"where2show",
"sort_order",
"currency_iso_3",
"roundval",
 */