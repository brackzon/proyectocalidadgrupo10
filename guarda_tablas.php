<?php

require 'conec_gen.php';

$atributo = $mysqli -> real_escape_string($_POST['atributo']);
$tabla = $mysqli -> real_escape_string($_POST['tabla']);
$sistema = $mysqli -> real_escape_string($_POST['sistem']);

$sql = "INSERT INTO vista_tabla (tabla,atributo,nom_system)
VALUES ('$tabla','$atributo','$sistema');";
$resultado = $mysqli->query($sql);

if($resultado>0) {
    echo "<script>
        window.location = 'generador_php.php';
        alert('Se registro correctamente');
        </script>";
    
} else {
    echo "<script>
    window.location = 'generador_php.php';
    alert('Hubo errores en el registro');
    </script>";
}
?>