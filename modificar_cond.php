<?php

require 'conec_bd.php';

$id = $mysqli -> real_escape_string($_POST['id_co']);
$nombres = $mysqli -> real_escape_string($_POST['nombres']);
$apellidos = $mysqli -> real_escape_string($_POST['apellidos']);
$num_licencia = $mysqli -> real_escape_string($_POST['num_licencia']);
$contacto = $mysqli -> real_escape_string($_POST['contacto']);

$sql = "UPDATE conductor SET co_nombres='$nombres', co_apellidos='$apellidos', 
            num_licencia='$num_licencia', num_contacto='$contacto' WHERE id_conductor = $id";
$resultado = $mysqli->query($sql);

if($resultado>0) {
    echo "<h3>Conductor modificado correctamente</h3>";
    echo "<a href='conductor.php'>Regresar</a>";
} else {
    echo "<h3>Error al modificar conductor</h3>";
    echo "<a href='conductor.php'>Regresar</a>";
}
?>