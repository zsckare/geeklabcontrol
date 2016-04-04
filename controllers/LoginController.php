<?php

class LoginController{
    public function indexAction()
    {
    	
        return new View("admin/login", ["title" => "Iniciar Sesión", "layout" => "off", "nameLayout" => "metro" ]);   
    }
}
