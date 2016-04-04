<?php
    
    header('Content-type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    
    $corte_array = array();
    $total = null;

    foreach ($values as $row) {
        $item = $row['type'];
        $mark = $row['mark'];
        $model = $row['model'];
        $details = $row['details'];
        $price = $row['price'];
        $total = $total+=$price;
        $corte_array[]= array('item'=>$item,'mark'=>$mark, 'model'=>$model, 'details'=>$details, 'price'=>$price);
    }
    

    $cortes = array('items' => $corte_array, 'total'=> $total );
    $json =json_encode($cortes);
    echo $json;

?>