<?php

require 'conec_bd.php';

$id = $mysqli -> real_escape_string($_POST['id_horario']);
$dia = $mysqli -> real_escape_string($_POST['dia']);
$salida = $mysqli -> real_escape_string($_POST['salida']);


$sql = "UPDATE horario SET dia='$dia', hora_salida='$salida', 
            WHERE id_horario = $id";
$resultado = $mysqli->query($sql);

if($resultado>0) {
    header('Location: http://localhost/sistema_gestion_buses/bus.php');
    echo "<script>window.confirm('Se registro con éxito');</script>";
} else {
    header('Location: http://localhost/sistema_gestion_buses/bus.php');
    echo "<script>window.alert('Hubo un error al registrar');</script>";
}
?>