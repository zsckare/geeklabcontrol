<?php

class LogOutController{
    public function indexAction()
    {
    	session_start();
    	session_destroy();
    	Redirection::go('login');
    }
}
