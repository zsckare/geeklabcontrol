<?php $type= null; ?>
<section >
<div class="grid">
	<div class="row">
		<div class="cell"><h4>Modelos</h4></div>
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
			<?php foreach ($values as $row) { $type = $row['id_mark'];?>
			<tr>
				<td><?=$row['name']?></td>
				<td></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
</section>

<div class="place-right">
	<a href="/admin/createmodel/?mark=<?=$type?>" class="button cycle-button bg-blue" title="Nueva Marca" ><span class="mif-plus mif-lg fg-white"></span></a>
</div>