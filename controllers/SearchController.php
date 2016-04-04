<?php

class SearchController{

    public function indexAction()
    {
    	$value = $_REQUEST['search'];

    	$search = new SearchModel();

    	$values = $search->getSearch($value);

        return new View("search/index", ["title" => "Resultados de la Busqueda", "layout" => "off", "nameLayout" => "metro","values"=>$values]);
    }
    public function notesAction()
    {
    	$value = $_REQUEST['search'];    	
    	$notes = new NoteModel();
    	$values = $notes->get("id_client",$value);
    return new View("search/notes", ["title" => "Resultados de la Busqueda", "layout" => "on", "nameLayout" => "metro","values"=>$values]);	
    }
    public function articleAction()
    {
        $item = new ItemModel();
        $value = $_REQUEST['search'];
        $values = $item->getSearch($value);
        return new View("search/items", ["title" => "Resultados de la Busqueda", "layout" => "off", "nameLayout" => "metro","values"=>$values]); 
    }
}
