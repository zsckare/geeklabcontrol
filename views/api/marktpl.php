<?php
    
    header('Content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    
    $marcas_array = array();


    foreach ($values as $row) {
    	$id_modelo=$row['id_marca'];
        $nombre=$row["nombre"];
        $marcas_array[]= array('id_marca' => $id_modelo,'nombre' => $nombre);
    }
    $modelo = array('marcas' => $marcas_array );
    $json =json_encode($modelo);
    echo $json;


?>