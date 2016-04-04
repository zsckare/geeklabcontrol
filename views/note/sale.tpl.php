<section class="grid" >
<div class="row">
	<h3>Nota de Venta</h3>
</div>
	<form action="" method="POST">
		<div class="rows">
			<div class="row">
				<div class="cell">
					<div class="row">
						<label for="">Producto</label>
					</div>
					<div class="input-control text">
						<input type="text" name="producto" id="producto" >
					</div>
				</div>
				<div class="cell">
					<div class="row">
						<label for="">Cantidad</label>
					</div>
					<div class="input-control text">
						<input type="text" name="cantidad" id="cantidad" >
					</div>
				</div>
				<div class="cell">
					<div class="row">
						<label for="">Precio</label>
					</div>
					<div class="input-control text">
						<input type="text" name="precio" id="precio" >
					</div>
				</div>
				<div class="cell">
					<div class="button cycle-button bg-blue" onclick="addProductSale();" style="margin-top:1.5em;"><span class="mif-plus mif-lg fg-white"></span></div>
				</div>
			</div>
		<input type="hidden" name="add" value="1">
		<div class="row">
			
		</div>
		</div>
	</form>
	<form action="/sale/createnote" method="post">
<div class="row">
	<div class="cell">
		<div class="input-control text">
			<div class="row">
				<label for="">Cliente</label>
			</div>
			<input type="text" name="cliente" >
		</div>
	</div>
	<div class="cell">
		<div style="margin-top:1.5em;">
			<input type="submit" value="Guardar">
		</div>
	</div>
</div>
	</form>
	<table class="table striped hovered">
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody id="tbody" >
			
		</tbody>
	</table>
</section>