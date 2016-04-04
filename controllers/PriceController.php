<?php 

class PriceController
{
	
	public function indexAction()
	{
		$type="2";
		$notes =  new NoteModel();
        $values = $notes->getLastAll($type);
		return new View("price/index",["title"=>"Cotizaciones","layout"=>"on","nameLayout"=>"metro","values"=>$values]) ;
	}
	public function createAction()
	{
		
		return new View("price/new",["title"=>"Nueva Cotizacion","layout"=>"on","nameLayout"=>"metro"]);	
	}
}