
<section >
<div class="grid">
	<div class="row">
		<div class="cell"><h4>Dispositivos</h4></div>
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
			<?php foreach ($values as $row) {?>
			<tr>
				<td><?=$row['name']?></td>
				<td></td>
				<td><a href="/admin/marks/?type=<?=$row['id_type']?>"><span class="mif-eye"></span></a></td>
				<td><a href="/admin/createmark/?type=<?=$row['id_type']?>"><span class="mif-plus"></span></a></td>
				<td></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="grid">
	
<div class="place-right">
	<a href="/admin/createDevice " class="button cycle-button bg-blue" title="Nueva Dispositivo" ><span class="mif-plus mif-lg fg-white"></span></a>
</div>
</div>
</section>