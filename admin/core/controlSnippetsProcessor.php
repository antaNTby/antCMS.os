<?php

// require_once '/admin/core/classes/class.Toasts.php'; //load php class
// $phpToast      = new Toasts();

if (isset($_GET['app']) && isset($_GET['operation']) && ($_GET['app'] == 'controlSnippetsProcessor'))
{

    $operation = $_GET['operation'] ?? 'missedOperation';

    if (($operation == 'updateCSValue'))
    {

        $requestData = json_decode(file_get_contents("php://input"), true, JSON_BIGINT_AS_STRING | JSON_INVALID_UTF8_IGNORE);

        $result = false;

        // dump($_GET);
        // dump($requestData);

        header('Content-Type: application/json; charset=utf-8');
        exit(json_encode(
            [

                'requestData' => $requestData,
                'result' => $result,
                'message'=>'Усё нармальна мама , трын-дын-дым, дын-дын-дым!'

            ]

        ));
    }

    if (($operation == 'updateCSValue'))
    {

    }

}