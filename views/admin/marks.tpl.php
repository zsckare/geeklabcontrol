<?php $type= null; ?>
<section >
<div class="grid">
	<div class="row">
		<div class="cell"><h4>Marcas</h4></div>
	</div>
</div>
<div style="height: 500px;overflow: auto;" >
	<table class="table striped hovered">
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($values as $row) { $type = $row['id_type'];?>
			<tr>
				<td><?=$row['name']?></td>
				<td></td>
				<td><a href="/admin/models/?mark=<?=$row['id_mark']?>"><span class="mif-eye mif-lg"></span></a></td>
				<td><a href="/admin/createmodel/?mark=<?=$row['id_mark']?>"><span class="mif-plus mif-lg"></span></a></td>
				<td><a href="/admin/deletemark/?id=<?=$row['id_mark']?>&type=<?=$type?>"><span class="ion-trash-b mif-lg fg-red"></span></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
</section>

<div class="place-right">
	<a href="/admin/createmark/?type=<?=$type?>" class="button cycle-button bg-blue" title="Nueva Marca" ><span class="mif-plus mif-lg fg-white"></span></a>
</div>