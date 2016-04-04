<?php  
	
if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
	class Loads
	{
		private static $_app_path;

		public static function getDireccion($direccion)
		{
			self::$_app_path = ROOT_RUTA;
			return self::$_app_path.$direccion;
		}

		public static function getInclude($direccion)
		{
			$direccion = ereg_replace ("/", SLASH, $direccion);
			self::$_app_path = $_SERVER['DOCUMENT_ROOT'];;
			return self::$_app_path.$direccion;
		}
	}
}