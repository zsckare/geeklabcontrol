<?php
session_start();
class SessionController{
	private $_session;

    public function indexAction()
    {
    	$user=trim($_POST['user']);
    	$pass=trim($_POST['password']);

    	$driver = new UserModel();
    	$values=$driver->get("user_name",$user);

        return new View("admin/session", ["title" => "", "layout" => "off", "nameLayout" => "dash", "values"=> $values, "pass"=> $pass ]); 
    }
}
