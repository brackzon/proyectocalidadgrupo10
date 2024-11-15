<?php

require 'conec_bd.php';

$id = $mysqli -> real_escape_string($_GET['id_pasajero']);


$sql = "DELETE FROM pasajero WHERE id_pasajero=$id";
$resultado = $mysqli->query($sql);

header('Location: http://localhost/sistema_gestion_buses/pasajeros.php');
?>