<?php

require 'conec_bd.php';

$id = $mysqli -> real_escape_string($_GET['id_reserva']);


$sql = "DELETE FROM reserva WHERE id_reserva=$id";
$resultado = $mysqli->query($sql);

header('Location: http://localhost/sistema_gestion_buses/reservas.php');

?>