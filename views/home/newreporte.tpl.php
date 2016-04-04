    
    <?php require_once("/dompdf/dompdf_config.inc.php"); 
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_Personal_Almacen.doc");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=$title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
</head>
<body>
<div class="container">
  <div class="row"><h2 class="center-align">Comprobante</h2></div>
  <div class="row">
    <div class="col l4 offset-l4"><img src="http://lorempixel.com/400/200/" alt="" class="responsive-img"></div>
  </div>
   <div class=""style="padding:1.2em;">
     <table>
            <thead>
              <tr>
                  <th data-field="id">Producto</th>
                  <th data-field="name">Detalle</th>
                  <th></th>
                  <th data-field="price">Cotizacion</th>
              </tr>
            </thead>
       
            <tbody>
            <?php foreach ($values as $row) {?>
            
              <tr>
                <td><?=$device?></td>
                <td><?=$marca?></td>
                <td><?=$detalles?></td>
                <td><?=$cotizacion?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
   </div>
</div>
</body>
</html>