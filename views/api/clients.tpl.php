<?php
    
    header('Content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    
    $clients_array = array();


    foreach ($values as $row) {
        $id_modelo=$row['id_client'];
        $nombre=$row["name"];
        $apellido=$row['paterno'];
        $clients_array[]= array('id_client' => $id_modelo, 'name' => $nombre, 'lastname' => $apellido);
    }

    $clients = array('clients' => $clients_array );
    $json =json_encode($clients);
    echo $json;

?>