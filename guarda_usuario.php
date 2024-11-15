<?php

require 'conec_bd.php';

$nom_usu = $mysqli -> real_escape_string($_POST['usuario']);
$contra = $mysqli -> real_escape_string($_POST['contrasenia']);
$nombres_pas = $mysqli -> real_escape_string($_POST['nombres_pas']);
$apellidos_pas = $mysqli -> real_escape_string($_POST['apellidos_pas']);
$email = $mysqli -> real_escape_string($_POST['email']);
$telefono = $mysqli -> real_escape_string($_POST['telefono']);

$resultado = $mysqli->prepare("CALL registrar_pasajero(?,?,?,?)");
$resultado -> bind_param("ssss",$nombres_pas,$apellidos_pas,$email,$telefono);

$resultado->execute();

if($resultado>0) {
    echo "<h3>Registro eliminado correctamente</h3>";
    echo "<a href='conductor.php'>Regresar</a>";
} else {
    echo "<h3>Error al eliminar el registro</h3>";
    echo "<a href='conductor.php'></a>";
}

$resultado->close();
$mysqli->close();

?>
