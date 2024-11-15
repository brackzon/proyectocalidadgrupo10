<?php

require 'conec_bd.php';


$origen = $mysqli -> real_escape_string($_POST['inicio']);
$destino = $mysqli -> real_escape_string($_POST['destino']);
$distancia = $mysqli -> real_escape_string($_POST['distancia']);
$tiempo = $mysqli -> real_escape_string($_POST['tiempo']);
$bus = $mysqli -> real_escape_string($_POST['id_bus']);
$hora = $mysqli -> real_escape_string($_POST['id_hor']);
$tarifa = $mysqli -> real_escape_string($_POST['tarifa']);

if($bus && $hora)
{
    $resultado_ruta = $mysqli->prepare("CALL registrar_ruta(?,?,?,?,?,?,?)");
    $resultado_ruta -> bind_param("ssssiid",$origen,$destino,$distancia,$tiempo,$bus,$hora,$tarifa);
    
    $resultado_ruta->execute();

    if($resultado_ruta) {
        echo "<script>
        window.location = 'Registrar_ruta.php';
        alert('Se registro correctamente');
        </script>";
    
    } else {
        echo "<script>
    window.location = 'Registrar_ruta.php';
    alert('Hubo errores en el registro');
    </script>";
    }
    
    $resultado_ruta->close();
    $mysqli->close();
    }
    else {
        echo "<script>
        window.location = 'bus.php';
        alert('No selecciono el bus u horario');
        </script>";
        
        }
?>