<section>
	<div class="grid">
		<div class="row"><h3>Items</h3></div>
		<div class="row">
            <div class="row">
                 <div class="cell">
                 <div class="row"><label for="">Buscar</label></div>
                     <div class="input-control text">
                         <input type="search" id="buscadoritem">
                     </div>
                </div>
            </div>
		</div>
	<div style="height: 500px;overflow: auto;" >
		
		<table class="table striped hovered">
			<thead>
				<tr>
					<th>Item</th>
					<th>Marca</th>
					<th></th>
					<th>Existencias</th>
				</tr>
			</thead>
			<tbody  id="tabla">
				<?php foreach ($values as $row) { ?>
					<tr>
						<td><?=$row['name']?></td>
						<td><?=$row['mark']?></td>
						<td></td>
						<td><?=$row['quantity']?></td>
						<td><a href="/inventary/minus/?id=<?=$row['id_item']?>"><span class="ion-minus-round mif-2x"></span></a></td>
						<td><a href="/inventary/altitem/?id=<?=$row['id_item']?>"><span class="ion-edit mif-2x"></span></a></td>
						<td><a href="/inventary/deleteitem/?id=<?=$row['id_item']?>"><span class="ion-trash-b mif-2x fg-red"></span></a></td>
					</tr>
					
				<?php } ?>
			</tbody>
		</table>
	</div>
	
	<div class="place-right">
		<a href="/inventary/additem" class="button cycle-button bg-blue" title="Nuevo Item" ><span class="ion-archive mif-lg fg-white"></span></a>
	</div>
	</div>
</section>
<script>
	$(document).ready(function() {
	
	url = urlhost+"/search/article/?search=";
	var value = "";
	$("#buscadoritem").keyup(function() {
		$("#resultado").empty();
		value = "";
		value = $("#buscadoritem").val();
		console.log()
		uri = url+value;
		console.log("url"+url);
		txt = "";
		$("#tabla").empty();
		$.getJSON(uri,function(datos){
			txt = "";
			
			$.each(datos.items, function(i, item){
				console.log(item.name+" "+item.mark);	
				txt += '<tr><td>'+item.name+'</td><td>'+item.mark+'</td><td></td><td>'+item.quantity+'</td><td><a href="/inventary/altitem/?id='+item.id_item+'"><span class="ion-ios-download-outline mif-3x"></span></a></td><td><a href="/inventary/deleteitem/?id='+item.id_item+'"><span class="ion-ios-trash mif-3x fg-red"></span></a></td></tr>';
			});
			$("#tabla").html(txt);
		});
	});
});

</script>