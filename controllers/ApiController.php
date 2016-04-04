<?php

class ApiController{
    public function getTypesAction()
    {
     
        $device = new DeviceModel();
        $values = $device->getDevicesTypes();
        
        return new View("api/types", ["title" => "Framework", "layout" => "off", "nameLayout" => "metro" ,"values"=>$values ]);   
    }
    public function getmarcaAction()
    {
        $type=$_REQUEST['type'];
        $device = new DeviceModel();
        $values = $device->getMarca($type);
        
        return new View("api/mark", ["title" => "Framework", "layout" => "off", "nameLayout" => "metro" ,"values"=>$values ]);
    }

    public function getmodeloAction()
    {

        $marca=$_REQUEST['marca'];
        $device = new DeviceModel();
        $values = $device->getModelo($marca);
        return new View("api/model", ["title" => "Framework", "layout" => "off", "nameLayout" => "metro","values"=>$values]);  
    }
    public function newClientAction()
    {
        if (isset($_REQUEST['name'])) {
            $name = $_REQUEST['name'];
            $lastname = $_REQUEST['lastname'];
            $phone = $_REQUEST['phone'];

            $client = new ClientModel();

            $client->create([
                "name"=>$name,
                "lastname"=>$lastname,
                "phone"=>$phone
                ]);
        }
    }
    public function getClientsAction()
    {
     
        $client = new ClientModel();
        $values = $client->getAllByLastname();
        return new View("api/clients", ["title" => "Clientes", "layout" => "off", "nameLayout" => "metro","values"=>$values]);   
    }

    public function getDevicesAction()
    {   
        $valor = "0";
        $device = new DeviceModel();
        $values = $device->getDevices($valor);
        return new View("api/devices", ["title" => "Framework", "layout" => "off", "nameLayout" => "metro","values"=>$values]);  
    }

    //controlador para crear notas
    public function quitDeviceAction()
    {
        if (isset($_REQUEST['id_device'])) {
            $id = $_REQUEST['id_device'];
            $consulta = new DeviceModel();
            return $consulta->quitDevice($id);
        }
    }
    public function addDeviceAction()
    {

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
    //return new View("api/adddevice", ["title" => "Clientes", "layout" => "off", "nameLayout" => "metro"]);   
    }
    public function tableSaleAction()
    {
        $sale =new SearchModel();
        $values = $sale->getSale();
         return new View("api/sales", ["title" => "Framework", "layout" => "off", "nameLayout" => "metro","values"=>$values]);  
    }
}
