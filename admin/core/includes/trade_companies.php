<?php
###trade_companies.php

$subTables         = array(COMPANIES_TABLE);
$dbTable           = COMPANIES_TABLE;
$primaryKey        = 'companyID';
$dbTableFields     = db_getColumnNames($dbTable);
$dbTableFieldNames = array_keys($dbTableFields); // выводим в логг все названия полей

// dump($dbTableFieldNames);

$dtColumnFieldNames = array(
);

require PATH_CORE . 'dtGenerateColumns.php';
require PATH_CORE . 'dtInit.php';

//show Smarty output
$smarty->assign('subTables', $subTables);
$smarty->assign('dtColumnFieldNames', $dtColumnFieldNames);
// $smarty->assign('jsonColumns', $jsonColumns);
$smarty->assign('dtColumns', $Columns);
showSubSmartyOutput($DPT_SUB);