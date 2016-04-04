<?php
    
    header('Content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    
    $clients_array = array();


    foreach ($values as $row) {
        $id_modelo=$row['id_item'];
        $nombre=$row["name"];
        $apellido=$row['code'];
        $marca = $row['mark'];
        $quantity=$row['quantity'];
        $clients_array[]= array('id_item' => $id_modelo, 'name' => $nombre, 'code' => $apellido,'mark'=>$marca,'quantity'=>$quantity);
    }

    $clients = array('items' => $clients_array );
    $json =json_encode($clients);
    echo $json;

?>