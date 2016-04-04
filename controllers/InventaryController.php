<?php 
session_start();

class InventaryController
{
	
	public function indexAction()
	{
		if (isset($_SESSION['user']) && $_SESSION['type']==1) {  
			$item = new ItemModel();

			$values = $item->getAll();
			return new View("inventory/index", ["title" => "Inventario", "layout" => "on", "nameLayout" => "metro","values"=>$values]);
		}else{
            Redirection::go('login');
        }
	}
	public function addItemAction()
	{
		if (isset($_SESSION['user']) && $_SESSION['type']==1) {  
			if (isset($_POST['add'])) {
				$item = new ItemModel();

				$nombre = $_POST['name'];
				$marca = $_POST['mark'];
				$codigo = $_POST['code'];
				$cantidad = $_POST['quantity'];

				return  $item->create([
					"name"=>$nombre,
					"mark"=>$marca,
					"code"=>$codigo,
					"quantity"=>$cantidad
					]);
			}
			$mark = new DeviceModel();
			$values = $mark->getMarcas();
			return new View("inventory/add", ["title" => "Nuevo Producto", "layout" => "on", "nameLayout" => "metro","values"=>$values]);
		}else{
            Redirection::go('login');
        }
	}
	public function altItemAction()
	{
		if (isset($_SESSION['user']) && $_SESSION['type']==1) {  
			$id = $_GET['id'];
			$item = new ItemModel();
			$values = $item->get("id_item",$id);

			if (isset($_POST['add'])) {

				$nombre = $_POST['name'];
				$marca = $_POST['mark'];
				$codigo = $_POST['code'];
				$cantidad = $_POST['quantity'];

				
				return  $item->update([
					"name"=>$nombre,
					"mark"=>$marca,
					"code"=>$codigo,
					"quantity"=>$cantidad,
					"id"=>$_POST['id']
					]);

			}
			return new View("inventory/edit", ["title" => "Nuevo Producto", "layout" => "on", "nameLayout" => "metro","values"=>$values]);
		}else{
            Redirection::go('login');
        }

	}
	public function deleteItemAction()
	{
		if (isset($_SESSION['user']) && $_SESSION['type']==1) {
			$id = $_REQUEST['id'];
			$item = new ItemModel();
			$item->destroy($id);	
		}

	}
	public function minusAction()
	{
		
		$id = $_REQUEST['id'];
		$item = new ItemModel();
		$values = $item->get("id_item",$id);
		$total = null;
		foreach ($values as $row) {
			$total = $row['quantity'];
		}
		if ($total==0) {
			Redirection::go('Inventary');
		}else{
			$nvo = $total-1;
			
			$item->minus($nvo,$id);
		}
	}
	
}