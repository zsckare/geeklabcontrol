<?php
session_start();
class SaleController{
    public function indexAction()
    {
        $consulta = new NoteModel();
        $values = $consulta->getAllSales();
        return new View("sale/index", ["title" => "Notas de Venta", "layout" => "on", "nameLayout" => "metro","values"=>$values ]);   
    }
    public function createAction()
    {
    	$consulta = new NoteModel();
        if (isset($_SESSION['user'])) {  
	        if (isset($_POST['producto'])) {
	            $producto = $_POST['producto'];
	            $precio = $_POST['precio'];
	            $cantidad = $_POST['cantidad'];
	            $fecha = Date::getFecha();

	            return $consulta->createSale([
	            	"producto"=>$producto,
	            	"cantidad"=>$cantidad,
	            	"precio"=>$precio,
	            	"cliente"=>$cliente,
	            	"fecha"=> $fecha	                
	                ]);
	        }
        	
        	return new View("note/sale", ["title" => "Nueva Nota de Venta", "layout" => "on", "nameLayout" => "metro"]);         
        }else{
            Redirection::go('login');
        }
    	
    }

    public function createNoteAction()
    {
        if (isset($_SESSION['user'])){
            $consulta = new NoteModel();
            if (isset($_POST['cliente'])) {
                $cliente = $_POST['cliente'];
                return $consulta->createVenta($cliente);
            }
        }else{
            Redirection::go('login');
        }
    }
    public function updateSaleAction()
    {
        if (isset($_SESSION['user'])){
            $consulta = new NoteModel();
            $last = null;
            $value = $consulta->LastSale();
            foreach ($value as $row) {
                $last = $row['id_venta'];
            }
            $consulta->updateSales($last);
        }
    }
}
