<?php
	
	//Seguridad de nuestra aplicacion !!No modificarlo!!
	define("YOi_Start", True);
	$YOi_Token = "5ab7b44c0747390658bbf882ae4df1c7";
	//Librerias del proyecto
	require 'helpers/index.php';
	require 'helpers/templates.php';
	//Configuracion basica del proyecto
	require 'config.php';
	//Library
	require 'library/Request.php';
	require 'library/Inflector.php';
	require 'library/Response.php';
	require 'library/View.php';


	//Incluye los modelos automaticamente
	spl_autoload_register(function ($model) {
	    include 'models/' . $model . '.php';
	});


	//Llamar al controlador indicado

	if (empty($_GET['url']))
	{
	    $url = "";
	}
	else
	{
	    $url = $_GET['url'];
	}

	$request = new Request($url);
	$request->executeYOi();

	// Plus
	require_once APP_PATH . 'Class'. SLASH . "Messages" . SLASH . "Messages.php";