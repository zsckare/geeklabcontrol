	
<section>
	<div class="grid">
	<div class="row">
		<div class=""><h4>Agregar al Inventario</h4></div>
	</div>
		<form action="" method="POST"  >

			<input type="hidden" name="add" >
			
				<div class=" cell">
					<div class="row"><label for="">Marca</label></div>
						<div class="input-control select">
						
						    <select id="marcas" name="mark" >
						    <?php foreach ($values as $row) { ?>
						    	<option value="<?=$row['name']?>"><?=$row['name']?></option>
						    <?php } ?>
						    </select>
						</div>
				</div>
				<div class="cell">
					<div class="row">
						<label for="">Nombre del Producto</label>
					</div>
					<div class="input-control text">
						<input type="text" name="name">
					</div>
				</div>
				<div class="cell">
					<div class="row">
						<label for="">Codigo</label>
					</div>
					<div class="input-control text">
							<input type="text" name="code" >
					</div>
				</div>
				<div class="cell">
					<div class="row">
						<label for="">Cantidad</label>
					</div>
					<div class="input-control text">
							<input type="text" name="quantity" >
					</div>
				</div>
			<div class="row">
				
			<div class="cell">
				<input type="submit" value="Guardar">
			</div>
			</div>
		</form>
	</div>
</section>