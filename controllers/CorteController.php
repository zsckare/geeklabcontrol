<?php
session_start();
class CorteController{

    public function indexAction()
    {
        if (isset($_SESSION['user'])) {                
            $type = '1';
            $dia = Date::getFecha();
            $item = new ItemModel();
            $values = $item->getCorte($dia);

            $not = new NoteModel();
            $notas = $not->getVentas();
            return new View("corte/index", ["title" => "Corte del Dia", "layout" => "on", "nameLayout" => "metro","values"=>$values,"notas"=>$notas]);
        }else{
            Redirection::go('login');
        }
    }

    public function jsonAction()
    {

        $dia = $_REQUEST['query'];
        $item = new ItemModel();

        $values = $item->getCorte($dia);


            $not = new NoteModel();
            $notas = $not->getVentas();
        return new View("corte/json", ["title" => "Corte del Dia", "layout" => "off", "nameLayout" => "metro","values"=>$values,"notas"=>$notas]);
    }

  
}
