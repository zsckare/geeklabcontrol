<?php

ini_set('display_errors', true);// Desabilitarlo en produccion
error_reporting(E_ALL); // Desabilitarlo en produccion
//	error_reporting(0); // Habilitarlo en produccion

	if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {

		define("DB_HOST", "localhost");
		define("DB_USER", "root");
		define("DB_PASS", "");
		define("DB_NAME", "geeklab");
		define("DB_CHAR", "utf8");

	}