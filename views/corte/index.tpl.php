<?php $total= null; ?>
<section >
<div class="grid">
	<div class="row">
		<div ><h4>Corte del Dia</h4></div>
	</div>
	<div class="row">
		<input type="text" id="dia" required>
		<div class="button" onclick="getCortes();" >
			<i class="ion-search"></i>
		</div>
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
		<tbody id="cortes" >
			<?php foreach ($values as $row) {?>
				<tr>
				<?php if ($row['ready']==1) { ?>
				
					<td><?= $row['type']?> <?= $row['mark']?> <?= $row['model'] ?></td>
					<td><?= $row['details'] ?></td>
					<td style="text-align: right;" ><?= $row['price'] ?></td>
				</tr>
				<?php $total+=$row['price']; ?>
				<?php } ?>
				
			<?php } ?>
			<tr><td>----------------------------</td></tr>
			<?php foreach ($notas as $row) { ?>
				<tr>
					<td><?= $row['producto']?> </td>
					<td>
						<?= $row['cantidad']?> 
					</td>
					<td><?= $row['precio']?> </td>
					<?php $total+=$row['precio']; ?>
				</tr>				
			<?php  } ?>

			<tr>
				<td></td>
				
				<td  style="text-align: right;"  >Total: <?=$total?></td>
			</tr>
		</tbody>
	</table>
</div>
</section>
