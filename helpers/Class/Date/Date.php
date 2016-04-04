<?php  
	
if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
	class Date
		{	
			public static function getDias($fecha_f)
			{
				$fecha_i = date("Y-m-d");
				$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
				$dias 	= abs($dias); $dias = floor($dias);	
				return $dias;
			}
			public static function getFolio()
			{
				$fecha = date("ymd-his");

				return $fecha;
			}

			public static function getFolioPrice()
			{
				$tipo = "";
				$fecha = date("ymd-his");
				$tipo = "COT-".$fecha;
				return $tipo;
			}
			public static function getFecha()
			{
				
				$fecha = date("Y-m-d");

				return $fecha;
			}
			public static function getHora()
			{
				
				$hora = date("his");

				return $hora;
			}



			public static function getTiempo($fecha_f)
			{
				$fecha_i = date("Y-m-d");
				$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
				$dias 	= abs($dias); $dias = floor($dias);	
				
				if($dias == 1){
					$nombre=1;
					return ""." ".$nombre." "."día";
				}
				if($dias > 31 && $dias < 61){
					$nombre=1;
					return ""." ".$nombre." "."mes";
				}elseif ($dias >= 62 && $dias <= 92) {
					# code...
					$nombre=2;
					return ""." ".$nombre." "."meses";
				}elseif ($dias >= 93) {
					# code...
					$nombre=3;
					return "+"." ".$nombre." "."meses";
				}else{
					return ""." ".$dias." "."días";
				}
				
				
			}
		}

	date_default_timezone_set('America/Mexico_City');
}