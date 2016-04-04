<?php 
$status="0";
if (isset($ultimo)) {
	$consulta = new DeviceModel();

    return $consulta->updateDevices(["id_note"=> $ultimo,"status"=> $status]);
}


?>