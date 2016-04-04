<?php
    
    header('Content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    
    $devices_array = array();


    foreach ($values as $row) {
        $id = $row['id_sale'];
    	$producto = $row['producto'];
        $cantidad = $row["cantidad"];
        $precio = $row["precio"];

        $devices_array[]= array( 'idproducto'=>$id, 'producto' => $producto,'cantidad' => $cantidad, 'precio' => $precio);
    }
    $devices = array('devices' => $devices_array );
    $json =json_encode($devices);
    echo $json;


?>