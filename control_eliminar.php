<?php

require 'conec_gen.php';

$tabla_sql = $mysqli -> real_escape_string($_POST['tabla']);
$proy = $mysqli -> real_escape_string($_POST['proy']);
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
    fwrite($archivo,'$id = $mysqli -> real_escape_string($_GET[\'id_'.$tabla_sql.'\']);'."\n");
}


    fwrite($archivo,'$sql = "DELETE FROM '.$tabla_sql.' WHERE id_'.$tabla_sql.' = $id'."\n");
   
    fwrite($archivo,'$resultado = $mysqli->query($sql);'."\n");


fwrite($archivo,"header('Location: http://localhost/".$proy."/".$tabla_sql.".php');"."\n");

fwrite($archivo,'?>'."\n");
fwrite($archivo,''."\n");
fwrite($archivo,''."\n");
