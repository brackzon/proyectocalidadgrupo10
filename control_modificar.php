<?php

require 'conec_gen.php';

$tabla_sql = $mysqli -> real_escape_string($_POST['tabla']);

$con = $mysqli -> real_escape_string($_POST['conexion']);

$sql = "SELECT atributo FROM vista_tabla WHERE tabla = '$tabla_sql';";

$resultado = $mysqli->query($sql);
$resultado2 = $mysqli->query($sql);

$archivo = fopen("C:\Users\BRACKZON\Desktop\Registrar_".$tabla_sql.".php","a") or die ("ERROR AL CREAR");

fwrite($archivo,"<?php"."\n");
fwrite($archivo,""."\n");
fwrite($archivo,"require '".$con.".php';"."\n");
fwrite($archivo,""."\n");

while($fila = $resultado->fetch_assoc()) {
    fwrite($archivo,'$'.$fila['atributo'].' = $mysqli -> real_escape_string($_POST[\''.$fila['atributo'].'\']);'."\n");
}

$array_atributos = [];
$array_atributos2 = [];

   //SE ESTA CREANDO UN ARRAT DE ATRIBUTIS
     
    //PARA MANEJAR MEJOR LA DATA
    while($fila = $resultado2->fetch_assoc()) {
        array_push($array_atributos,$fila['atributo']);
        array_push($array_atributos2,$fila['atributo']);
     }

     $string_atributos = "";
     $string_atributos2 = "";

     foreach ($array_atributos as $valor) {
        $string_atributos .= $valor . " = '$" . $valor . "', ";
    }

    foreach ($array_atributos2 as $valor) {
        $string_atributos2 .= "'$" . $valor . "',";
    }

    fwrite($archivo,'$sql = "UPDATE '.$tabla_sql.' SET '.$string_atributos."\n");
    fwrite($archivo,'WHERE id_'.$tabla_sql.' = $' .$tabla_sql. '";'."\n");

    fwrite($archivo,'$resultado = $mysqli->query($sql);'."\n");


fwrite($archivo,""."\n");
fwrite($archivo,'if($resultado>0) {'."\n");
fwrite($archivo,'   echo "<script>'."\n");
fwrite($archivo,'       window.location = \'Registrar_'.$tabla_sql.'.php\';'."\n");
fwrite($archivo,'       alert(\'Se registro correctamente\');'."\n");
fwrite($archivo,'       </script>";'."\n");
fwrite($archivo,'} else {'."\n");
fwrite($archivo,'    echo "<script>'."\n");
fwrite($archivo,'    window.location = \'Registrar_'.$tabla_sql.'.php\';'."\n");
fwrite($archivo,'    alert(\'Hubo errores en el registro\');'."\n");
fwrite($archivo,'    </script>";'."\n");
fwrite($archivo,'}'."\n");
fwrite($archivo,'?>'."\n");
fwrite($archivo,''."\n");
fwrite($archivo,''."\n");
fwrite($archivo,''."\n");
