<?php

require 'conec_bd.php';

$nombres = $mysqli -> real_escape_string($_POST['nombres']);
$apellidos = $mysqli -> real_escape_string($_POST['apellidos']);
$num_licencia = $mysqli -> real_escape_string($_POST['num_licencia']);
$contacto = $mysqli -> real_escape_string($_POST['contacto']);
$disponibilidad = $mysqli -> real_escape_string($_POST['disponibilidad']);

$resultado = $mysqli->prepare("CALL registrar_conductor(?,?,?,?,?)");
$resultado -> bind_param("sssss",$nombres,$apellidos,$num_licencia,
$contacto,$disponibilidad);

$resultado->execute();

if($resultado) {
    echo "<h3>Conductor Registrado correctamente</h3>";
    echo "<a href='conductor.php'>Regresar</a>";
} else {
    echo "<h3>Error al registrar conductor</h3>";
    echo "<a href='conductor.php'>Regresar</a>";
}

$resultado->close();
$mysqli->close();

?>
