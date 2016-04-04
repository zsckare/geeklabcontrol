<div class="card padding-largo">
	<div class="row">
		<h3 class="center-align">Nueva Nota</h3>
	</div>
	<div class="row">
		<form action="" class="row padding-largo"  >
			<div class="row">
				<div class="input-field col s4 m4 l4">				
				    <select class="browser-default" id="select">
						<option value="" disabled selected>Selecciona Dispositivo</option>
						<option value="smartphone" onclick="obtener(1);">Smartphone</option>
						<option value="ios" onclick="obtener(2);">iPhone/iPad</option>
				    	<option value="tablet" onclick="obtener(3);">Tablet</option>
				    	<option value="consola" onclick="obtener(4);">Consola</option>
				    </select>
				</div>
				<div class="input-field col s4 m4 l3 no-mostrar" id="smartphone">				
				    <select class="browser-default" >
						<option value="" disabled selected>Selecciona Marca</option>
						<option value="smartphone" onclick="getMarca('Sony');">Sony</option>
						<option value="ios" onclick="getMarca('Smasung');">Samsung</option>
				    	<option value="tablet" onclick="getMarca('ZTE');">ZTE</option>
				    	<option value="consola" onclick="getMarca('Alcatel');">Alcatel</option>
				    </select>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
          			<textarea id="detalles" class="materialize-textarea"></textarea>
          			<label for="detalles">Detalles</label>
        		</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="text" id="cotizacion" >
					<label for="cotizacon">Cotizacion</label>
				</div>
			</div>
			<div class="row">
				<div class="center-align">
					<div class="btn" onclick="send();" >Registrar</div> 
				</div>
			</div>
		</form>
	</div>
</div>

<script>

var puerto =window.location.port;
var urlgeneral="http://" + window.location.hostname+":"+puerto;
var	dispositivo="";
var marca="";
	function obtener (device) {
		switch(device){
			case 1:
				console.log("Smartphone");
				$("#smartphone").removeClass("no-mostrar");
				dispositivo="Smartphone";
				break;
			case 2:
			dispositivo="IOs";
				console.log("IOs");
				break;
			case 3:
				dispositivo="Tablet";
				console.log("tablet");
				break;
			case 4:
				dispositivo="Consola";
				console.log("consola");
				break;
		}
	}

	function getMarca (mrk) {
		marca=mrk;
	}

	function send () {
		detalles = document.getElementById('detalles').value;
		cotizacion = document.getElementById('cotizacion').value;
		console.log("Device: "+dispositivo+" Marca: "+marca+" Detalles: "+detalles+" Cotizacion: "+cotizacion);
			var ajax = new XMLHttpRequest();
	
  	uri=urlgeneral+"/home/nuevoreporte";
  	ajax.open("POST",uri,true);
  	ajax.onreadystatechange=function () {
  		if (ajax.readyState==4){
  			console.log("!!!!!!!!!!!!!!!!");

  		}
  	}
  	
  	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  	//enviando los valores a registro.php para que inserte los datos
  	ajax.send("device="+dispositivo+"&marca="+marca+"&detalles="+detalles+"&cotizacion="+cotizacion);

	}
</script>