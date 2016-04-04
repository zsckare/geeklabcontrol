<?php
session_start();
class DeviceController{

    public function updateAction()
    {
        if (isset($_SESSION['user'])) {  
        	if (isset($_POST['details'])) {
        		$consulta = new DeviceModel();

        		return $consulta->updateDetails($_POST['id_device'],$_POST['details'],$_POST['price']);
        	}
        	$id = $_REQUEST['id'];
        	$device = new DeviceModel();
        	$values = $device->getBy($id);
        	return new View("device/update", ["title" => "Editar Dispositivo", "layout" => "on", "nameLayout" => "metro","values"=>$values,"id"=>$id]);
        }else{
            Redirection::go('login');
        }
    }
    public function readyAction()
    {
        if (isset($_SESSION['user'])) {  
            if (isset($_REQUEST['ready'])) {
                $id = $_REQUEST['id'];
                $status = $_REQUEST['ready'];
                $device = new DeviceModel();
                
                $device->updateStatus($id,$status);
            }
        }else{
            Redirection::go('login');
        }
    }
}
