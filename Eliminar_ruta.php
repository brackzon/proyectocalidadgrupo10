<?php

require 'conec_bd.php';

$id = $mysqli -> real_escape_string($_GET['id_ruta']);


$sql = "DELETE FROM ruta WHERE id_ruta=$id";
$resultado = $mysqli->query($sql);

header('Location: http://localhost/sistema_gestion_buses/rutas.php');

?>