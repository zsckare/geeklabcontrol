<section>
	<div class="grid">
		<div class="row"><h3>Clientes</h3></div>
	<div style="height: 500px;overflow: auto;" >
		
		<table class="table striped hovered">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody  >
				<?php foreach ($values as $row) { ?>
					<tr>
						<?php if ($row['type']==1) {?>
							<td><span class="ion-document mif-2x puntero"></span></td>
						<?php } ?>
						<?php if ($row['type']==2) {?>
							<td><span class="ion-star mif-2x puntero"></span></td>
						<?php } ?>
						<?php if ($row['type']==3) {?>
							<td><span class="ion-settings mif-2x puntero"></span></td>
						<?php } ?>
						<td><?=$row['name']?></td>
						<td><?=$row['paterno']?></td>
						<td></td>

						<?php if ($row['rating']==2) { ?>
							<td><span class="fg-cobalt mif-lg">A</span></td>
						<?php } ?>

						<?php if ($row['rating']==1) { ?>
							<td><span class="fg-violet mif-lg">B</span></td>
						<?php } ?>
						
						<?php if ($row['rating']==0) { ?>
							<td><span class="fg-crimson mif-lg">C</span></td>
						<?php } ?>

						<td></td>
						<td><a href="/client/update/?id=<?=$row['id_client']?>" title="Editar"><span class="ion-edit mif-lg" ></span></a></td>
						<td></td>
						<td><a href="/client/delete/?id=<?=$row['id_client']?>"><span class="ion-ios-close-outline mif-lg fg-red" title="Eliminar" ></span></a></td>
						<td></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
		<div class="place-right">
		<a href="/client/create" class="button cycle-button bg-blue" title="Nuevo Cliente" ><span class="mif-plus mif-lg fg-white"></span></a>
</div>
	</div>
</section>