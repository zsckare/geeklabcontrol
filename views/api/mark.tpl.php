<?php
    
    header('Content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    
    $marcas_array = array();


    foreach ($values as $row) {
    	$id_modelo=$row['id_mark'];
        $nombre=$row["name"];
        $marcas_array[]= array('id_mark' => $id_modelo,'name' => $nombre);
    }
    $modelo = array('marks' => $marcas_array );
    $json =json_encode($modelo);
    echo $json;


?>