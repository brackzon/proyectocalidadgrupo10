
<?php
ob_start();
?>

<?php
require 'conec_bd.php';
$id = $_POST['reserva'];

$sql = "SELECT pas_nombres, pas_apellidos,
fecha_reserva,asiento_reservado, ruta_origen,
ruta_destino, duracion_estimada, tarifa
        FROM reserva INNER JOIN ruta USING (id_ruta)
        INNER JOIN pasajero USING (id_pasajero)
        WHERE id_reserva=$id LIMIT 1;";
     $resultado = $mysqli->query($sql);
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>PDF</title>
  </head>
  <body>

    <div class="container mt-4">
    <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/images/fondo.jpg" width="10"><span><b>TRANSBUS</b></span>
    
                <?php
                    while($fila = $resultado->fetch_assoc()) {
                ?>
                
        <div class="row text-center">
            <br>
            <h2>Datos del usuario</h2>
            <br>
            <div class="col-12">
                <h5>Nombres: <psan><?php echo $fila['pas_nombres'];?></span></h5>
                
            </div>
            <div class="col-12">
                <h5>Apellidos: <span><?php echo $fila['pas_apellidos'];?></span></h5>
               
            </div>
            <br>
            <h2>Datos de la reserva</h2>
            <br>
            <div class="col-12">
                <h5>Fecha de reserva: <span><?php echo $fila['fecha_reserva'];?></span></h5>
             
            </div>
            <div class="col-12">
                <h5>Asiento reservado: <span><?php echo $fila['asiento_reservado'];?></span></h5>
                
            </div>
            <div class="col-12">
            <h5>Origen: <span><?php echo $fila['ruta_origen'];?></span></h5>
            
            </div>
            <div class="col-12">
            <h5>Destino: <span><?php echo $fila['ruta_destino'];?></span></h5>
            
            </div>
            <div class="col-12">
            <h5>Duracion: <span><?php echo $fila['duracion_estimada'];?></span></h5>
            
            </div>
            <div class="col-12">
            <h5>Tarifa: <span><?php echo $fila['tarifa'];?></span></h5>
            
            </div>
        </div>
        
        
        <?php } ?>
    </div>
   
  </body>
</html>
<?php
$html = ob_get_clean();


require_once 'libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//opciones para mostrar imagenes en pdf
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();

$dompdf->stream("reserva.pdf", array("Attachment" => false));
?>