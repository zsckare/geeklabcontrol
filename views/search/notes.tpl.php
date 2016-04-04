
<section >
<div class="grid">
	<div class="row">
		<div class="cell"><h4>Resultado de la Busqueda</h4></div>
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
				<td><div class="button cycle-button bg-amber"><span class="mif-event-busy mif-lg"></span></div></td>
				<?php } ?>
	
				<?php if($row['status']==2){ ?>
				<td><div class="button cycle-button bg-lightGreen"><span class="mif-event-available mif-lg fg-white no-padding"></span></div></td>
				<?php } ?>
				<td><a href="/note/details/?note=<?=$row['id_note']?>" title="Detalles" ><span class="mif-eye mif-2x"></span></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
</section>
