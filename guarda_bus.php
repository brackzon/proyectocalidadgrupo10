<?php

require 'conec_bd.php';


$num_bus = $mysqli -> real_escape_string($_POST['num_bus']);
$modelo = $mysqli -> real_escape_string($_POST['modelo']);
$capacidad = $mysqli -> real_escape_string($_POST['capacidad']);
$anio_fab = $mysqli -> real_escape_string($_POST['fab']);
//$cond = $mysqli -> real_escape_string($_POST['id_co']);

$lista = $_REQUEST['lista'];

$sql = "SELECT id_conductor FROM conductor WHERE num_licencia = $lista";
                $resultado = $mysqli->query($sql);
//SACA EL ID DEl CONDUCTOR
//comparando el numero de licencia q se extrajo del select
//con el de la consulta select

while($fila = $resultado->fetch_assoc()) {
                          
    $id_cond = $fila['id_conductor'];

    }

if($id_cond)
{

    $resultado_bus = $mysqli->prepare("CALL registrar_bus(?,?,?,?,?)");
    $resultado_bus -> bind_param("ssiii",$num_bus,$modelo,$capacidad,$anio_fab,$id_cond);
    
    $resultado_bus->execute();
    
    if($resultado_bus>0) {
        echo "<script>
        window.location = 'Registrar_bus.php';
        alert('Se registro correctamente');
        </script>";
    } else {
        echo "<script>
    window.location = 'Registrar_bus.php';
    alert('Hubo errores en el registro');
    </script>";
    }
    
    
    
    $resultado_pasa->close();
    $mysqli->close();
    
}
else {
    echo "<script>
    window.location = 'Registrar_bus.php';
    alert('No selecciono el conductor');
    </script>";
    
    }
?>