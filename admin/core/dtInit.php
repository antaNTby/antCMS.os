<?php

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