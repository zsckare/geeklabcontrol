<?php
session_start();
class ClientController{

    public function indexAction()
    {
        if (isset($_SESSION['user'])) {  
            $client = new ClientModel();
            $values = $client->getAllByLastname();

            return new View("client/index", ["title" => "Catalogo de Clientes", "layout" => "on", "nameLayout" => "metro","values"=>$values]);
        }else{
            Redirection::go('login');
        }
    }
    public function createAction()
    {
        if (isset($_SESSION['user'])) {  
        	if (isset($_POST['name'])) {
        		$consulta = new ClientModel();
        		return $consulta->create([
                    "name"=>$_POST['name'],
                    "lastname"=>$_POST['lastname'],
                    "phone"=>$_POST['phone'] 
                    ]);
        	}
        	return new View("client/new", ["title" => "Nuevo Cliente", "layout" => "on", "nameLayout" => "metro"]);
        }else{
            Redirection::go('login');
        }
    }
    public function updateAction()
    {
        if (isset($_SESSION['user'])) {  
            if (isset($_POST['name'])) {
                $consulta = new ClientModel();
                return $consulta->update([
                	"id"=>$_POST['id'],
                    "name"=>$_POST['name'],
                    "lastname"=>$_POST['lastname'],
                    "phone"=>$_POST['phone'],
                    "rating"=>$_POST['rating'],
                    "type"=>$_POST['tipo']
                    ]);
            }
            $id = $_REQUEST['id'];
            $client  = new ClientModel();
            $values = $client->get("id_client",$id);
            $tipo = null;
            foreach ($values as $row) {
            	if ($row['type']==1) {
            		$tipo = "Cliente Nuevo";
            	}
            	if ($row['type']==2) {
            		$tipo = "Cliente";
            	}
            	if ($row['type']==3) {
            		$tipo = "Taller";
            	}
            }
            return new View("client/edit", ["title" => "Editar Cliente", "layout" => "on", "nameLayout" => "metro","values"=>$values,"tipo"=>$tipo]);
        }else{
            Redirection::go('login');
        }
    }
    public function deleteAction()
    {
        if (isset($_SESSION['user'])) {  
            $id = $_REQUEST['id'];
            $client = new ClientModel();
            $client->destroy($id);
        }else{
            Redirection::go('login');
        }
    }
}
