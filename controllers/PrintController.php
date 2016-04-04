<?php

class PrintController{

    public function indexAction()
    {
    	$idnote = $_REQUEST['id'];

    	$note = new NoteModel();
    	$values = $note->get("id_note",$idnote);
    	$idCliente = null;
    	foreach ($values as $row) {
    		$idCliente = $row['id_client'];
    	}
        $device = new DeviceModel();
        $devices = $device->getByID($idnote);


        $data = new ClientModel();
        $client = $data->get("id_client",$idCliente);
        return new View("print/index", ["title" => "Notas", "layout" => "off", "nameLayout" => "metro","values"=>$values, "devices"=>$devices,"client"=>$client]);
    }
    public function printSaleAction()
    {
        $sale = new NoteModel();
        $id = $_REQUEST['id'];        
        $sales = $sale->getVenta($id);
        $nota = new NoteModel();
        $values = $nota->getSale("id_notesale",$id);
        return new View("print/sale", ["title" => "Notas", "layout" => "off", "nameLayout" => "metro","values"=>$values,"sale"=>$sales]);

    }

}
