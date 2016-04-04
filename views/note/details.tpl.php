<?php $id_note= null; $status = null; $ready = null; $type = null;?>
<section>
	<div class="grid">
		<div class="row">
			<h3 class="">Detalles</h3>
		</div>
		<div class="row cells12" >
			<?php foreach ($values as $row) { $id_note=$row['id_note']; $status = $row['status'];  $type=$row['type'];?>
					
				<div class="cell">
					<p>Folio: </p>
					<p><?=$row['folio']?></p>
				</div>
				<div class="cell offset1">
					<p>Fecha:</p>
					<p><?=$row['date']?></p>
				</div>
			<?php } ?>
			<?php if (isset($client)) { ?>
				
				<?php foreach ($client as $row) {?>
					<div class="cell offset1 colspan3">
					<p>Cliente: </p>
					<p><?=$row['name']?> <?=$row['paterno']?></p>			
					</div>

					<div class="cell offset1 colspan3">
					<p>Telefono: </p>
					<p><?=$row['phone']?></p>			
					</div>
				<?php  } ?>

			<?php } ?>
		</div>
		
		<table class="table striped hovered">
			<thead>
				<tr>
					<th>Dispositvo</th>
					<th></th>
					<th></th>
					<th></th>
					<th>Cotizacion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($devices as $row) { $ready = $row['ready'];?>
					
					<tr>
						<td><?=$row['type']?></td>
						<td><?=$row['mark']?></td>
						<td><?=$row['model']?></td>
						<td><?=$row['details']?></td>
						<td><?=$row['price']?></td>						
						<?php if ($status==1) { ?>
							<td><a href="/device/update/?id=<?=$row['id_device']?>" title="Editar" class="button"><span class="mif-pencil"></span></a></td>
						<?php }?>

							<?php if ($ready==0) {?>
								<td><a href="/device/ready/?id=<?=$row['id_device']?>&ready=1" class="" title="Listo" ><span class="ion-android-checkbox-outline mif-2x fg-green"></span></a></td>
								<td><a href="/device/ready/?id=<?=$row['id_device']?>&ready=2" class="" title="No se pudo" ><span class="ion-android-checkbox-blank mif-2x fg-red"></span></a></td>
							<?php } ?>
							<?php if ($ready==1) {?>
								<td><span class="ion-android-done-all fg-lightGreen mif-3x"></span></td>
								<td></td>
							<?php } ?>
							<?php if ($ready==2) {?>
								<td><span class="ion-android-cancel fg-crimson mif-3x"></span></td>
								<td></td>
							<?php } ?>
				<?php } ?>

					</tr>
			</tbody>
		</table>
		<?php if ($status==1 && $type==1) { ?>
		
		
			<div class="place-right" style="margin-top:2em;" >	
				<a href="/note/ready/?id=<?=$id_note?>&payment=2" class="rigth-space" title="Pago en Efectivo" ><span class="ion-cash fg-emerald mif-3x" ></span></a>
			</div>
			<div class="place-right" style="margin-top:2em;" >	
				<a href="/note/ready/?id=<?=$id_note?>&payment=1" class="rigth-space" Title="Pago con Tarjeta" ><span class="ion-card fg-darkCobalt mif-3x" ></span></a>
			</div>
		<?php } ?>

			<div class="place-left" style="margin-top:2em;" >	
				<a href="/print/index/?id=<?=$id_note?>" class="rigth-space" Title="Imprimir" ><span class="ion-ios-printer-outline fg-blue mif-2x" ></span>	</a>
			</div>
	</div>
</section>