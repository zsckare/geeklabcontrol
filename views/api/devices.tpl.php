<?php
    
    header('Content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    
    $devices_array = array();


    foreach ($values as $row) {
    	$id_modelo = $row['id_device'];
        $type = $row["type"];
        $mark = $row["mark"];
        $model = $row["model"];
        $details = $row["details"];
        $price = $row["price"];

        $devices_array[]= array('id_device' => $id_modelo,'type' => $type, 'mark' => $mark, 'model' => $model, 'details'=>$details, 'price'=>$price);
    }
    $devices = array('devices' => $devices_array );
    $json =json_encode($devices);
    echo $json;


?>