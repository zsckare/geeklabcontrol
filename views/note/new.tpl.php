	<div class="grid"  >
	<form action="" method="post">
		<div class="row cells12">
			<div class="cell offset4 colspan3"><h4>Nueva Nota</h4></div>		
		</div>
		<div class="row cells12">
			<div class="cell offset2">
				<p><span>Fecha:</span></p>
				<p><?=$fecha?></p>
			</div>
			<div class="cell colspan5 offset4">
				<div class="row">
					<label for="">Cliente</label>
				</div>
				<div class="input-control select">
					<select name="cliente" id="clients" style="width:20em !important;" >
					</select>
				</div>
			</div>
		</div>
		<div class="row cells12">
			
			<div class="cell offset2">
				<div class="button cycle-button" title="Agregar Dispositivo" onclick="getTipos();" ><span class="mif-plus"></span></div>
			</div>
			<div class="cell offset4" style="padding-left:1em;" ><input type="submit" value="Guardar"></div>
			<div class="cell">
				<label class="input-control radio">
				    <input type="radio" name="tipo" value="1" checked="" >
				    <span class="check"></span>
				    <span class="caption">Nota</span>
				</label>
			</div>
			<div class="cell">				
				<label class="input-control radio">
				    <input type="radio" name="tipo" value="2" >
				    <span class="check"></span>
				    <span class="caption">Cotizacion</span>
				</label>
			</div>
		</div>
	</form>
	<div class="row cells12 mostrar" id="devicetable">
		<table>
			<table class="table striped hovered">
	<thead>
		<tr>
			<th>Dispositivo</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="tbody" >
	</tbody>
</table>
		</table>
	</div>
</div>
<div id="modaladd" class="no-mostrar"  >
		<div class="grid">

			<div class="row cells12">
				<div class="cell offset4 colspan3"><h4>Agregar Dispositivo</h4></div>		
			</div>
			<div class="cell colspan10 offset1">
				<input type="hidden" name="add">
				<div class="row cells3">
					<div class="cell">
					<div class="row"><label for="">Dispositivo</label></div>
						<div class="input-control select">
						
						    <select name="device" id="device" >
						    </select>
						</div>
					</div>
			
					<div class="cell left-space">
					<div class="row"><label for="">Marca</label></div>
						<div id="mark">
							<div class="input-control select">
							
							    <select id="marcas" name="marca" ></select>
							</div>
						</div>
					</div>
			
					<div class="cell left-space">
					<div class="row"><label for="">Modelo</label></div>
						<div class="input-control text">
							<input type="text" name="model" id="modelos">
						</div>
					</div>
				</div>
				
				<div class="row cells2 top-space">
					<div class="cell ">					
						<div class="row">Detalles</div>
						<div class="input-control textarea">				
			        		<textarea style="width:26em;" name="detalles" id="detalles" ></textarea>
			    		</div>	
					</div>	
					<div class="cell left-space">
					<div class="row">Cotizacion</div>
						<div class="input-control text">
							<input type="number" placeholder="$" name="cotizacion" id="price" >
						</div>
					</div>
				</div>
			
				<div class="row top-space">
					<div class="button" onclick="addDevice();" > Agregar</div>
				</div>
		</div>
		</div>
</div>

<div id="modalclient" class="no-mostrar">
	<div class="grid">
		<div class="row">
			<div class="cell"><h4>Nuevo Cliente</h4></div>
		</div>
		<div class="row">
			<div class="cell">
				<div class="row"><label for="">Nombre</label></div>
				<div class="input-control text">
					<input type="text" id="nameclient" >
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cell">
				<div class="row"><label for="">Apellidos</label></div>
				<div class="input-control text">
					<input type="text" id="lastnameclient" >
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cell">
				<div class="row"><label for="">Telefono</label></div>
				<div class="input-control text">
					<input type="text" id="phoneclient" >
				</div>
			</div>
		</div>
		<div class="row">
			<div class="button" onclick="addNewClient();" >Registrar</div>
		</div>
	</div>
</div>
<div id="cortinaclient" class="no-mostrar" onclick="quitarModalClient();" ></div>
<script>
	$(document).ready(function() {
		getClients();
	});
</script>