<section>

	<form action="" method="POST">	
	<?php foreach ($values as $row) { 
		$rate = null;
		if ($row['rating']==1) {
			$rate = "A";
		}
		if ($row['rating']==2) {
			$rate = "B";
		}
		if ($row['rating']==3) {
			$rate = "C";
		}
	?>
	<input type="hidden" name="id" value="<?=$row['id_client']?>" >
		<div class="grid">
			<div class="row">
				<h3>Editar Cliente</h3>
			</div>
			<div class="row">
				<div class="cell">
					<div class="row">
						<label for="">Nombre:</label>
					</div>
					<div class="input-control text">
						<input type="text" name="name" value="<?=$row['name']?>" >
					</div>
				</div>
			
				<div class="cell">
					<div class="row">
						<label for="">Apellidos:</label>
					</div>
					<div class="input-control text">
						<input type="text" name="lastname" value="<?=$row['paterno']?>" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="cell">
				<div class="row"><label for="">Telefono:</label></div>
					<div class="input-control text">
						<input type="text" name="phone" value="<?=$row['phone']?>" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="cell">
					<div class="row">
						<label for="">Tipo de Cliente:</label>
					</div>
					<div class="input-control select">
						<select name="tipo" id="">
							<option value="<?=$row['type']?>"><?=$tipo?></option>
							<option value="1">Nuevo Cliente</option>
							<option value="2">Cliente</option>
							<option value="3">Taller</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="cell">
				<div class="row"><label for="">Clasificacion:</label></div>
					<div class="input-control select">
						<select name="rating" id="">							
							<option value="<?=$row['rating']?>"><?=$rate?></option>
							<option value="1">A</option>
							<option value="2">B</option>
							<option value="3">C</option>
						</select>
					</div>
				</div>
			</div>
	<?php } ?>
			<div class="row">
				<input type="submit" class="button" value="Actualizar Datos">
			</div>
		</div>
	</form>
</section>