<?php

require 'conec_bd.php';

$id = $mysqli -> real_escape_string($_GET['id_bus']);


$sql = "DELETE FROM bus WHERE id_bus=$id";
$resultado = $mysqli->query($sql);

header('Location: http://localhost/sistema_gestion_buses/bus.php');

?>