<?php

session_start();

session_destroy();

header("Location: http://localhost/sistema_gestion_buses/sistema_buses_2.php");

?>