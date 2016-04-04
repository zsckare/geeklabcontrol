<?php $id=$_REQUEST['id']; ?>
<!DOCTYPE>
<html>
<head>
<meta charset="UTF-8">
<head><title>Impresion de Nota</title>

<!-- funcion de Impresion -->
<script language="Javascript">
function imprSelec(nombre)
{
var articulo = document.getElementById(nombre);
var ventimp = window.open(' ','Nota','no','no','50','no','no','no','no','no','no','no','no','50');
ventimp.document.write(articulo.innerHTML );
ventimp.document.close();
ventimp.print( );
ventimp.close();
}
</script>
<!-- Fin funcion de impresion-->

</head>
<body>
<?php $total = 0; ?>
<div id="impresion">
<?php foreach ($sale as $row) {?>
	<div >
		<img src="/assets/img/GeekLab.png" alt="" width="100px" style="margin-left:30px;" >
	</div>
	<div  >
		<p>Fecha: <?=$row['fecha']?></p>
		<p>Folio: 000<?=$row['id_venta']?></p>
	</div>
	<div>
		<p>Cliente: <?=$row['cliente']?></p>
	</div>
<?php } ?>
<p>------------------------------------------------------</p>	
<table>
	<thead>
		<tr>
			<th align="right" ><h3>Producto</h3></th>
			<th align="right" ><h3>Cantidad</h3></th>
			<th align="right" ><h3>Precio</h3></th>
		</tr>	
	</thead>
	<tbody>
<?php foreach ($values as $row) { $total+=$row['precio']?>

		<tr>
			<td align="right"><?=$row['producto']?></td>
			<td align="right"><?=$row['cantidad']?></td>
			<td align="right"><?=$row['precio']?></td>
		</tr>
<?php } ?>
		<tr>
			<td></td>
			<td></td>
			<td><h4 align="left">Total: <?=$total?></h4></td>
		</tr>
	</tbody>
</table>

<p>------------------------------------------------------</p>
<p>Whatsapp: 6182110443</p>
<p>------------------------------------------------------</p>


</div>

<div>
	<a href="javascript:imprSelec('impresion')" target="_parent">Imprimir</a>
</div>
<div>
	<a href="/sale">Regresar</a>
</div>
</body>
</html>