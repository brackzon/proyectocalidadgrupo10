<?php
session_start(); // Inicia la sesión
require 'conec_bd.php'; // Incluir el archivo de conexión

// Recupera los datos del formulario
$usuario_nombre = $_POST['usuario_nombre'];
$password = $_POST['contrasenia'];

// Consulta para verificar las credenciales del usuario
$query = "SELECT * FROM usuario WHERE nom_usuario = '$usuario_nombre'
AND contrasenia = '$password'";
$result = $mysqli->query($query);

// Verifica si se encontró un usuario con el nombre ingresado
if ($result->num_rows == 1) {
    $usuario = $result->fetch_assoc();

        // Inicio de sesión exitoso
        $_SESSION['usu'] = $usuario['nom_usuario'];
        $_SESSION['pass'] = $usuario['contrasenia'];
        $_SESSION['nom'] = $usuario['nombres'];
        $_SESSION['ape'] = $usuario['apellidos'];
        $_SESSION['pf'] = $usuario['perfil'];
        // Redirige al usuario a una página de inicio o panel de control
        header('Location: http://localhost/sistema_gestion_buses/sistema_buses.php');  
} else {header('Location: http://localhost/sistema_gestion_buses/sistema_buses_2.php'); exit;}
// Si no se encontró el usuario o las credenciales son incorrectas, redirige al usuario a la página de inicio de sesión con un mensaje de error.
?>
