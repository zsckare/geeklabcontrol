<?php  
if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
	class Redirection{
		public static function go($url)
		{
			return header('Location:'.Loads::getDireccion($url));
		}
	}
}