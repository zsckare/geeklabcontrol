<?php
    
    header('Content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    
    $modelos_array = array();


    foreach ($values as $row) {
    	$id_modelo=$row['id_modelo'];
        $nombre=$row["nombre"];
        $modelos_array[]= array('id_modelo' => $id_modelo,'nombre' => $nombre);
    }
    $modelo = array('modelos' => $modelos_array );
    $json =json_encode($modelo);
    echo $json;


?>