<?php
session_start();
class NoteController{

    public function indexAction()
    {
        if (isset($_SESSION['user'])) {                
            $type = '1';
            $notes =  new NoteModel();
            $values = $notes->getLastAll($type);
            return new View("note/index", ["title" => "Notas", "layout" => "on", "nameLayout" => "metro","values"=>$values]);
        }else{
            Redirection::go('login');
        }
    }

    public function createAction()
    {
        if (isset($_SESSION['user'])) {  
    	$fecha = Date::getFecha();
    	$clients = new ClientModel();
    	$values = $clients->getAllByLastname();

        if (isset($_POST['cliente'])) {
            $consulta = new NoteModel();
            $type = $_POST['tipo'];
            return $consulta->create([
                "id_client"=> $_POST['cliente'],
                "fecha"=> $fecha,
                "tipo"=>$type
                ]);
        }
    	return new View("note/new", ["title" => "Nueva Nota", "layout" => "on", "nameLayout" => "metro","fecha" => $fecha]);
        }else{
            Redirection::go('login');
        }
    }
    public function updateAction()
    {
        if (isset($_SESSION['user'])) {  
        $utlimo = "";
        $note = new NoteModel();
        $values = $note->getLast();
        foreach ($values as $row) {
            $ultimo = $row['id_note'];
        }
        return new View("note/update", ["title" => "Nueva Nota", "layout" => "on", "nameLayout" => "metro","ultimo"=>$ultimo]);   
        }else{
            Redirection::go('login');
        }
    }

    public function detailsAction()
    {
        if (isset($_SESSION['user'])) {  
        $id = $_REQUEST['note'];
        $idCliente = "";
        $note = new NoteModel();
        $device = new DeviceModel();
        $devices = $device->getByID($id);
        $values = $note->get("id_note",$id);
        foreach ($values as $row) {
            $idCliente = $row['id_client'];
        }
        $client = new ClientModel();
        $dataClient = $client->get("id_client",$idCliente);
        return new View("note/details", ["title" => "Detalles de la Nota", "layout" => "on", "nameLayout" => "metro","values"=>$values,"devices"=>$devices,"client"=>$dataClient]);   
        }else{
            Redirection::go('login');
        }
    }

    public function lastNoteAction()
    {   
        if (isset($_SESSION['user'])) {  
        $id = "";
        $note = new NoteModel();
        $idCliente = "";
        $values = $note->getLast();
            foreach ($values as $row) {
                $id = $row['id_note'];
                $idCliente = $row['id_client'];
            }

        $device = new DeviceModel();
        $devices = $device->getByID($id);

        $data = new ClientModel();
        $client = $data->get("id_client",$idCliente);
        return new View("note/last", ["title" => "Nueva Nota", "layout" => "off", "nameLayout" => "metro","values"=>$values, "devices"=>$devices,"cliente"=>$client]);      
        }else{
            Redirection::go('login');
        }
    }
    public function readyAction()
    {
        if (isset($_SESSION['user'])) {  
        $id = $_REQUEST['id'];
        $payment = $_REQUEST['payment'];
        $note = new NoteModel();
        $note->ready($id,$payment);
        }else{
            Redirection::go('login');
        }
    }

    //---------Notas de Venta--------------------


    public function saleAction()
    {
        if (isset($_SESSION['user'])) {  
        if (isset($_POST['add'])) {
            $producto = $_POST['producto'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $cliente = $_POST['cliente'];
        }
        return new View("note/sale", ["title" => "Nueva Nota", "layout" => "on", "nameLayout" => "metro"]);         
        }else{
            Redirection::go('login');
        }
    }
}
