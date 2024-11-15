<?php

require 'conec_bd.php';

$fecha = $mysqli -> real_escape_string($_POST['fecha_re']);
$asiento = $mysqli -> real_escape_string($_POST['asiento_re']);
$ruta = $mysqli -> real_escape_string($_POST['ruta']);
$pasajero = $mysqli -> real_escape_string($_POST['pasajero']);

if($ruta && $pasajero)
{

    $resultado_re = $mysqli->prepare("CALL registrar_reserva(?,?,?,?)");
    $resultado_re -> bind_param("ssii",$fecha,$asiento,$ruta,$pasajero);
    
    $resultado_re->execute();
    
    if($resultado_re) {
        echo "<script>
        window.location = 'Registrar_reserva.php';
        alert('Se registro correctamente');
        </script>";
    } else {
        echo "<script>
    window.location = 'Registrar_reserva.php';
    alert('Hubo errores en el registro');
    </script>";
    }
    
    
    
    $resultado_re->close();
    $mysqli->close();
    
}
else {
    echo "<script>
    window.location = 'Registrar_reserva.php';
    alert('No selecciono la ruta o el pasajero');
    </script>";
    
    }
?>