
<section >
<div class="grid">
	<div class="row">
		<div class="cell"><h4>Notas</h4></div>
	</div>
</div>
<div style="height: 500px;overflow: auto;" >
	<table class="table striped hovered">
		<thead>
			<tr>
				<th>Folio</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($values as $row) {?>
			<tr>
				<td><?=$row['folio']?></td>
				<td><?=$row['date']?></td>
				<?php if($row['status']==1){ ?>
				<td><div class="ion-close fg-amber mif-lg puntero"></div></td>
				<td>&nbsp;</td>
				<?php } ?>
	
				<?php if($row['status']==2){ ?>
				<td><div class="ion-checkmark mif-lg fg-green puntero" title="Entregado" ></div></td>
					<?php if($row['payment']==1){ ?>
						<td>
							<div class="ion-card fg-emerald mif-lg puntero" title="Pagado con Tarjeta" ></div>
						</td>
					<?php } ?>
					<?php if($row['payment']==2){ ?>
						<td>
							<div class="ion-cash fg-emerald mif-lg puntero  " title="Pagado en Efectivo" ></div>
						</td>
					<?php } ?>
				<?php } ?>
				<td><a href="/note/details/?note=<?=$row['id_note']?>" title="Detalles" ><span class="mif-eye mif-lg"></span></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
</section>

<div class="place-right">
	<a href="/note/create" class="button cycle-button bg-blue" title="Nueva Nota" ><span class="mif-plus mif-lg fg-white"></span></a>
</div>