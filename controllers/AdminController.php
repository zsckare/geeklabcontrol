<?php
session_start();

class AdminController{
    public function indexAction()
    {   
        $devices = new DeviceModel();
        $values = $devices->getDevicesTypes();
                
        return new View("admin/devices", ["title" => "Dispositivos", "layout" => "on", "nameLayout" => "metro","values"=>$values]);   
    }
    public function marksAction()
    {
        $type = $_REQUEST['type'];

        $device = new DeviceModel();
        $values = $device->getMarca($type);
        
        return new View("admin/marks", ["title" => "Marcas", "layout" => "on", "nameLayout" => "metro" ,"values"=>$values ]);
    }
    public function createMarkAction()
    {
        if (isset($_REQUEST['name'])) {
            $consulta = new DeviceModel();

            return $consulta->createMark($_REQUEST['name'],$_REQUEST['type']);
        }
        $type = $_REQUEST['type'];
        return new View("admin/newmark", ["title" => "Agregar Marca", "layout" => "on", "nameLayout" => "metro","type"=>$type ]);
    }
    public function modelsAction()
    {
        $mark = $_REQUEST['mark'];

        $model = new DeviceModel();
        $values = $model->getModelo($mark);
        return new View("admin/models", ["title" => "Modelos", "layout" => "on", "nameLayout" => "metro" ,"values"=>$values ]);
    }
    public function createModelAction()
    {

        if (isset($_REQUEST['name'])) {
            $consulta = new DeviceModel();

            return $consulta->createModel($_REQUEST['name'],$_REQUEST['mark']);
        }
        $type = $_REQUEST['mark'];
        return new View("admin/newmodel", ["title" => "Agregar Modelo", "layout" => "on", "nameLayout" => "metro","type"=>$type ]);
    }
    public function createDeviceAction()
    {
        if (isset($_REQUEST['name'])) {
            $consulta = new DeviceModel();

            return $consulta->createType($_REQUEST['name']) ;
        }
        return new View("admin/newdevice", ["title" => "Agregar Modelo", "layout" => "on", "nameLayout" => "metro"]);
    }
    public function deleteMarkAction()
    {
        $id = $_REQUEST['id'];
        $type = $_REQUEST['type'];
        $mark = new DeviceModel();
        $mark->deleteMark($id,$type);
    }
}
