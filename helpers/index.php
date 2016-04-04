<?php
if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
	define("ROOT_RUTA", "http://".$_SERVER['HTTP_HOST']. "/");
	define('SLASH', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . SLASH);
	define('APP_PATH', ROOT . SLASH);

	require_once APP_PATH . 'Conection' . SLASH . 'Conection.php';
	require_once APP_PATH . 'Querys' . SLASH .'Querys.php';
	require_once APP_PATH . 'Class'. SLASH . "Cookies" . SLASH . "Cookies.php";
	require_once APP_PATH . 'Class'. SLASH . "Date" . SLASH . "Date.php";
	require_once APP_PATH . 'Class'. SLASH . "Loads" . SLASH . "Loads.php";
	require_once APP_PATH . 'Class'. SLASH . "Pagination" . SLASH . "Pagination.php";
	require_once APP_PATH . 'Class'. SLASH . "Prototype" . SLASH . "Prototype.php";
	require_once APP_PATH . 'Class'. SLASH . "Redirection" . SLASH . "Redirection.php";
	require_once APP_PATH . 'Class'. SLASH . "Security" . SLASH . "Security.php";
	require_once APP_PATH . 'Class'. SLASH . "Security" . SLASH . "Token.php";
	require_once APP_PATH . 'Class'. SLASH . "Session" . SLASH . "Session.php";
}