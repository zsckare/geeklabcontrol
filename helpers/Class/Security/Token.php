<?php  

if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
	class Token
	{
		public static function getToken($_value)
		{
			$private_clave = md5("@aplication_wcode(encrypt)@");
			$join = md5($private_clave);
			$code = md5($_value);
			$token = md5($join.$code);

			return $token;
		}
	}
}