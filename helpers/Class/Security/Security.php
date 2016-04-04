<?php  

if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
	class Security
	{
		public static function getEncrypt($_value)
		{
			$private_clave = md5("@aplication_wcode(encrypt)@");
			$join = $private_clave.$_value;
			$code = md5($join);
			$key  = hash('sha256', $code);
			
			return $key;

		}
	}
}