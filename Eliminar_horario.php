<?php

require 'conec_bd.php';

$id = $mysqli -> real_escape_string($_GET['id_horario']);


$sql = "DELETE FROM horario WHERE id_horario=$id";
$resultado = $mysqli->query($sql);

header('Location: http://localhost/sistema_gestion_buses/bus.php');
?>