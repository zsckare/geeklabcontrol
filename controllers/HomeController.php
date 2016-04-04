<?php
session_start();
class HomeController{

    public function indexAction()
    {
	    
	  	Redirection::go("note");
	
    }

}
