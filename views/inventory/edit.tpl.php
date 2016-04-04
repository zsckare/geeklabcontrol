	
<section>
	<div class="grid">
	<div class="row">
		<div class=""><h4>Editar Producto</h4></div>
	</div>
		<form action="" method="POST"  >

			<input type="hidden" name="add" >
			<?php foreach ($values as $row) { ?>
				
				<input type="hidden" name="id" value="<?=$row['id_item']?>" >
				<div class=" cell">
					<div class="row"><label for="">Marca</label></div>
						<div class="input-control text">
							<input type="text" value="<?=$row['mark']?>" name="mark" >
						</div>
				</div>
				<div class="cell">
					<div class="row">
						<label for="">Nombre del Producto</label>
					</div>
					<div class="input-control text">
						<input type="text" name="name" value="<?=$row['name']?>" >
					</div>
				</div>
				<div class="cell">
					<div class="row">
						<label for="">Codigo</label>
					</div>
					<div class="input-control text">
							<input type="text" name="code" value="<?=$row['code']?>" >
					</div>
				</div>
				<div class="cell">
					<div class="row">
						<label for="">Cantidad</label>
					</div>
					<div class="input-control text">
							<input type="text" name="quantity" value="<?=$row['quantity']?>"  >
					</div>
				</div>
			<div class="row">
				<?php } ?>
			<div class="cell">
				<input type="submit" value="Guardar">
			</div>
			</div>
		</form>
	</div>
</section>