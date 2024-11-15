<?php

require 'conec_bd.php';

$id = $mysqli -> real_escape_string($_GET['id_co']);


$sql = "DELETE FROM conductor WHERE id_conductor=$id";
$resultado = $mysqli->query($sql);

header('Location: http://localhost/sistema_gestion_buses/conductor.php');
?>