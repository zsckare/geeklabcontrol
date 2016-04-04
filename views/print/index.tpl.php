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

<div id="impresion">
<?php foreach ($values as $row) {?>
	<div >
		<img src="/assets/img/GeekLab.png" alt="" width="100px" style="margin-left:30px;" >
	</div>
	<div  >
		<p>Fecha: <?=$row['date']?></p>
		<p>Folio: <?=$row['folio']?></p>
	</div>
<?php } ?>
<?php foreach ($client as $row) { ?>
	<p>Cliente: <?=$row['name']?> <?=$row['paterno']?> </p>
	<p>Telefono: <?=$row['phone']?></p>
<?php } ?>
<?php foreach ($devices as $row) { ?>
<p>------------------------------------------------------</p>
<p>Dispositivo: <?=$row['type']?> <?=$row['mark']?> <?=$row['model']?></p>
<p>Detalles: <?=$row['details']?></p>
<p>Cotizacion: $<?=$row['price']?></p>
<?php } ?>
<p>------------------------------------------------------</p>
<p>Whatsapp: 6182110443</p>
<p>------------------------------------------------------</p>
<p>Acepto que despues de 30 dias el aparato mecionado pasara a ser propiedad de la empresa y podra disponer de el como mejor le convenga.        </p>
<p  style="padding-bottom:2em;" >(Conserve su nota, en caso de extravio de la misma genera un cargo de $30)</p>
<p style="padding-left:2em;">___________________________</p>
<p style="padding-left:5em;" >Nombre y Firma</p>

</div>

<div>
	<a href="javascript:imprSelec('impresion')" target="_parent">Imprimir</a>
</div>
<div>
	<a href="/note/details/?note=<?=$id?>">Regresar</a>
</div>
</body>
</html>