
<?php
    require 'mysql_connect.php';

    $textTitle =  "Junta";
    $textDescription = "Reunion hoy a las 3:00 pm.";
    //el topico donde engloba a vendedores y cobradores es 'userpp'
    $toTopic = "/topics/userpp";
    $to="userToken";

    $message = array(
    "title" => $textTitle,
    "body" => $textDescription);
    
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
        "to" => $toTopic,
        "data" => $message
    );


    $headers = array('Content-Type: application/json',
    'Authorization:key='.$serverKey
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result == FALSE){
    die('Curl failed: ' . curl_error($ch));
    }
    curl_close($ch);

?>
