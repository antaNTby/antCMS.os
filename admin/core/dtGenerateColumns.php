<?php

if ($dtColumnFieldNames === array())
{
    $dtColumnFieldNames = $dbTableFieldNames;
}

$saveNewJsonColumns      = false;
$FORCE_SAVE_JSON_COLUMNS = false;

$Columns = array();
// dump("dddd ".$jsonColumnsFileName);
if (file_exists($jsonColumnsFileName))
{
    $jsonColumns = file_get_contents($jsonColumnsFileName);
    // dump($jsonColumns);
}
else
{
    $ii = 0;
    foreach ($dtColumnFieldNames as $key => $value)
    {

        if ($ii < 5)
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
            );
        }
        else
        {
            $newColumnItem = array(
                'index'      => $key,
                'data'       => $value,
                'db'         => $value,
                'dt'         => $value,
                'title'      => 'title ' . $value,
                'orderable'  => true,
                'visible'    => false,
                'searchable' => true,
            );
        }

        $Columns[] = $newColumnItem;
        $ii++;
        // jlog($newColumnItem);
    }

    $FORCE_SAVE_JSON_COLUMNS = true;
    $jsonColumns             = json_encode($Columns, JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE | JSON_UNESCAPED_UNICODE);
}

if ($FORCE_SAVE_JSON_COLUMNS)
{
    $isSaved = file_put_contents($jsonColumnsFileName, $jsonColumns);
    header("Content-Type: text/html; charset=utf-8");
    echo ($jsonColumnsFileName . ' Is saved size: ' . format_size($isSaved));
}