<section>
<?php foreach ($values as $row) { ?>
<form action="" method="POST" >
<input type="hidden" name="id_device" value="<?=$id?>" >
		<div class="grid">
		<div class="row">
			<div class="cell">
		<div class="row"><label for="">Dispositivo</label></div>
			<div class="input-control text">
				<input type="text" value="<?=$row['type']?>" name="type">
			</div>
		</div>

		<div class="cell">
		<div class="row"><label for="">Marca</label></div>
			<div class="input-control text">
				<input type="text" value="<?=$row['mark']?>" name="mark">
			</div>
		</div>
		</div>

		<div class="row">
			<div class="cell">
		<div class="row"><label for="">Modelo</label></div>
			<div class="input-control text">
				<input type="text" value="<?=$row['model']?>" name="model">
			</div>
		</div>

		<div class="cell">
			<div class="row"><label for="">Cotizacion</label></div>
			<div class="input-control text">
				<input type="text" name="price" value="<?=$row['price']?>" >
			</div>
		</div>
		
		</div>
		<div class="cell">
		<div class="row"><label for="">Detalles:</label></div>
			<div class="input-control textarea">
				<textarea name="details" id="" style="width:25em;"><?=$row['details']?></textarea>
			</div>
		</div>
		<div class="cell">
			<div class="input-control">
				<input type="submit" value="Editar">
			</div>
		</div>
	</div>
</form>
<?php } ?>
</section>