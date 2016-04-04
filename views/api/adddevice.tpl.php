<?php 

        header("Access-Control-Allow-Origin: *");     
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");  

        $type = $_REQUEST['type'];
        $mark = $_REQUEST['mark'];
        $model = $_REQUEST['model'];
        $detail = $_REQUEST['details'];
        $price = $_REQUEST['price'];
        echo $type." ".$mark;

        if (isset($_REQUEST['type'])) {
            $consulta = new NoteModel();
            return $consulta->addDevice([
                "type"=> $type,
                "mark"=> $mark,
                "model"=> $model,
                "details"=> $detail,
                "price"=> $price
                ]);
        }
 ?>