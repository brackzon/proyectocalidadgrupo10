<?php

session_start(); // Asegúrate de iniciar la sesión en todas las vistas que requieren autenticación

$usu_sesion = $_SESSION['usu'];
// Verificar el tipo de usuario
if ($usu_sesion = '' || $usu_sesion == null) {
  header('Location: http://localhost/sistema_gestion_buses/Iniciar_sesion.php');
  die();
}
else {
echo '<style>#crear_usuario { display: none; }</style>';
if ($_SESSION['pf'] === 'Pasajero') {
    // Ocultar el boton
    echo '<style>#v_pas { display: none; }</style>';
    echo '<style>#v_con { display: none; }</style>';
    }
}
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Conductor</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/disenio_vista_principal.css" rel="stylesheet">
    <link href="css/disenio_reg_mod_conductor.css" rel="stylesheet">  
    
  </head>
  <body>
    
  <div class="container-fluid text-black" style="background-color: #BEE7F4">
        
        <nav class="navbar navbar-expand-md navbar-light border-3 border-button">
          <div class="container-fluid">
            <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="100"><strong>Sistema de gestion de buses</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container fluid">
              <div class="collapse navbar-collapse" id="MenuNavegacion">
              <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="sistema_buses.php"><strong>Inicio</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" id="v_pas" href="pasajeros.php"><strong>Pasajero</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="usuario.php"><strong>Usuario</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" id="v_con" href="conductor.php"><strong>Conductor</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="reservas.php"><strong>Reservas</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="rutas.php"><strong>Rutas</strong></a>
                </li>
                <li class="nav-item">
                  <a class='nav-link btn btn-danger' id='cerrar_sesion' role='button' href='cerrar_sesion.php'><strong>Cerrar sesion</strong></a>
                  <a class="nav-link btn btn-success" role="button" href="iniciar_sesion.php" id="crear_usuario"><strong>Iniciar sesion</strong></a>
                </li>
              </ul>
              </div>
            </div>
          </div>
        </nav>

  </div>
      
  <div class="container-fluid" id="contenedor_fondo">
      </div>
      
      <div class="container-fluid text-white" id="contenedor2">
      <form class="row g-3" id="formulario" method="post" name="registro_cond" action="guarda.php">
                <!-- COLOCAMOS POST XQ SE ENVIAN DATOS, EN ACTION VA EL ARCHIVO DONDE ESTA EL CODIGO PARA -->
            <!-- GUARDAR LA INFO   -->
                <div class="col-12">
                <h3>Datos del conductor</h3>
                </div>
  <div class="col-12">
    <label for="nombres_co" class="form-label" style="text-align:center">Nombres</label>
    <input type="text" class="form-control" name="nombres" id="nombres_co" placeholder="Luis Miguel" required>
  </div>
  <div class="col-12">
    <label for="apellidos_co" class="form-label">Apellidos</label>
    <input type="text" class="form-control" name="apellidos" id="apellidos_co" placeholder="Garcia Fernandez" required>
  </div>
  <div class="col-md-6">
    <label for="num_iicencia" class="form-label">Número de licencia</label>
    <input type="text" class="form-control" name="num_licencia" id="num_iicencia" placeholder="1234" required>
  </div>
  <div class="col-md-6">
    <label for="contacto_co" class="form-label">Número de contacto</label>
    <input type="text" class="form-control" name="contacto" id="contacto_co" placeholder="1234" required>
  </div>
  <!-- OCULTAMOS LA Disponibilidad CON DISPLAY: NONE-->
  <div class="col-md-12" id="seleccion" style="display: none;">
    <label for="disponible" class="form-label">Disponibilidad</label>
    <select class="form-select" name="disponibilidad" id="disponible" required>
      <option selected>Activo</option>
      <option>Inactivo</option>
    </select>
  </div>
              

        <div class="col-md-12">
          <br>
          <button type="submit" class="btn btn-primary" id="guarda_co" name="guarda_co">Registrar</button>
          <!-- BOTON PARA REGISTRAR CONDUCTOR -->
          <br>
          <br>
          </div>

          
      </form>
      </div>


    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    
    <script>
      //restaurar datos del formulario
      window.addEventListener('beforeunload', function(event) {
  // Obtener el formulario y sus campos
  var nombreconductor = document.getElementById('nombres_co');
  var apeaconductor = document.getElementById('apellidos_co');
  var num_licencia = document.getElementById('num_iicencia');
  var contacto_co = document.getElementById('contacto_co');


  // Guardar los datos del formulario en el almacenamiento local
  sessionStorage.setItem('nombres_co', nombreconductor.value);
  sessionStorage.setItem('apellidos_co', apeaconductor.value);
  sessionStorage.setItem('num_iicencia', num_licencia.value);
  sessionStorage.setItem('contacto_co', contacto_co.value);


  // Eliminar los datos del formulario al cambiar de pestaña
  nombreconductor.value = '';
  apeaconductor.value = '';
  num_licencia.value = '';
  contacto_co.value = '';


});

window.addEventListener('load', function() {
  var nombreconductor = document.getElementById('nombres_co');
  var apeaconductor = document.getElementById('apellidos_co');
  var num_licencia = document.getElementById('num_iicencia');
  var contacto_co = document.getElementById('contacto_co');

  // Obtener los datos del almacenamiento local y restaurarlos en los campos del formulario
  if (sessionStorage.getItem('nombres_co')) {
    nombreconductor.value = sessionStorage.getItem('nombres_co');
  }

  if (sessionStorage.getItem('apellidos_co')) {
    apeaconductor.value = sessionStorage.getItem('apellidos_co');
  }

  if (sessionStorage.getItem('num_iicencia')) {
    num_licencia.value = sessionStorage.getItem('num_iicencia');
  }

  if (sessionStorage.getItem('contacto_co')) {
    contacto_co.value = sessionStorage.getItem('contacto_co');
  }

});


    </script>
  </body>
  
</html>