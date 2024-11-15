<?php

require 'conec_bd.php';

$usuario = $mysqli -> real_escape_string($_POST['usuario']);
$contrasenia = $mysqli -> real_escape_string($_POST['contrasenia']);
$perfil = 'Pasajero';
$nombres_pas = $mysqli -> real_escape_string($_POST['nombres_pas']);
$apellidos_pas = $mysqli -> real_escape_string($_POST['apellidos_pas']);
$email = $mysqli -> real_escape_string($_POST['email']);
$telefono = $mysqli -> real_escape_string($_POST['telefono']);

$resultado_pasa = $mysqli->prepare("CALL registrar_pasajero(?,?,?,?)");
$resultado_pasa -> bind_param("ssss",$nombres_pas,$apellidos_pas,$email,$telefono);

$resultado_usu = $mysqli->prepare("CALL registrar_usuario(?,?,?,?,?)");
$resultado_usu -> bind_param("sssss",$nombres_pas,$apellidos_pas,$perfil,$usuario,$contrasenia);

$resultado_pasa->execute();
$resultado_usu->execute();

if($resultado_pasa>0) {
    header('Location: http://localhost/sistema_gestion_buses/sistema_buses.php');
    
} else {
    header('Location: http://localhost/sistema_gestion_buses/Registrar_pasajero_2.php');
}

if($resultado_usu>0) {
    header('Location: http://localhost/sistema_gestion_buses/sistema_buses.php');
    
} else {
    header('Location: http://localhost/sistema_gestion_buses/Registrar_pasajero_2.php');
}

$resultado_pasa->close();
$mysqli->close();

?>
