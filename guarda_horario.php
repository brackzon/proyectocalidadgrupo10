<?php

require 'conec_bd.php';


$dia = $mysqli -> real_escape_string($_POST['dia']);
$salida = $mysqli -> real_escape_string($_POST['salida']);
    $resultado_hor = $mysqli->prepare("CALL registrar_horario(?,?)");
    $resultado_hor -> bind_param("ss",$dia,$salida);
    
    $resultado_hor->execute();

    if($resultado_hor>0) {
        echo "<script>
        window.location = 'Registrar_horario.php';
        confirm('Se registro correctamente');
        </script>";
    } else {
        echo "<script>
    window.location = 'Registrar_horario.php';
    alert('Hubo errores en el registro');
    </script>";
    }
    $resultado_hor->close();
    $mysqli->close();
?>