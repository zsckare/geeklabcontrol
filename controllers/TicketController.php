<?php 

class TicketController
{
	
	public function indexAction()
	{
		return new View("ticket/index", ["title" => "Revisar Estado", "layout" => "off", "nameLayout" => "metro" ]);   
	}
	public function checkAction()
	{
		$ticket = $_POST['ticket'];

		$note = new NoteModel();
		$values = $note->get("folio",$ticket);

		return new View("ticket/status", ["title" => "Revisar Estado", "layout" => "off", "nameLayout" => "metro","values"=>$values ]);
	}
}