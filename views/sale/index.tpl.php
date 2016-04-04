
<section >
<div class="grid">
	<div class="row">
		<div class="cell"><h4>Notas de Venta</h4></div>
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
				<td>000<?=$row['id_venta']?></td>
				<td><?=$row['fecha']?></td>
				
				<td><a href="/print/printsale/?id=<?=$row['id_venta']?>" title="Imprimir" ><span class="mif-print mif-lg"></span></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
</section>

<div class="place-right">
	<a href="/sale/create" class="button cycle-button bg-blue" title="Nueva Nota" ><span class="mif-plus mif-lg fg-white"></span></a>
</div>