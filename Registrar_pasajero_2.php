<?php

session_start(); // Asegúrate de iniciar la sesión en todas las vistas que requieren autenticación

$usu_sesion = $_SESSION['usu'];
// Verificar el tipo de usuario
if ( ($usu_sesion = '') || ($usu_sesion == null) ) {
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
  <body style="background-color: white">
    
  <div class="container-fluid text-black" style="background-color: #BEE7F4">
        
        <nav class="navbar navbar-expand-md navbar-light border-3 border-button">
          <div class="container-fluid">
            <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="100"><strong>TRANSBUS</strong></a>
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
                  <a class="nav-link" href="bus.php"><strong>Buses</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="calcular_distancia_tiempo.php"><strong>Distancia y tiempo</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="buscador_direcciones.php"><strong>Ubicación</strong></a>
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
              <form class="row g-3" id="formulario" method="post" name="registro_pasa" action="guarda_pas.php">
                <!-- COLOCAMOS POST XQ SE ENVIAN DATOS, EN ACTION VA EL ARCHIVO DONDE ESTA EL CODIGO PARA -->
            <!-- GUARDAR LA INFO   -->
                <div class="col-12">
                <h3>Escriba los datos solicitados</h3>
                </div>
                <div class="col-md-6">
    <label for="usu_pas" class="form-label">Usuario</label>
    <input type="text" class="form-control" name="usuario" id="usu_pas" placeholder="Escriba su nombre de usuario" required>
  </div>
  <div class="col-md-6">
    <label for="contra_pas" class="form-label">Contraseña</label>
    <input type="text" class="form-control" name="contrasenia" id="contra_pas" placeholder="Escriba su contraseña" required>
  </div>
  <div class="col-md-6">
    <label for="nom_pas" class="form-label">Nombres</label>
    <input type="text" class="form-control" name="nombres_pas" id="nom_pas" placeholder="Luis Miguel" required>
  </div>
  <div class="col-md-6">
    <label for="ape_pas" class="form-label">Apellidos</label>
    <input type="text" class="form-control" name="apellidos_pas" id="ape_pas" placeholder="Garcia Fernandez" required>
  </div>
  <div class="col-md-6">
    <label for="email_pas" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" id="email_pas" placeholder="example@ejm.com" required>
  </div>
  <div class="col-md-6">
    <label for="tel_pas" class="form-label">Telefono</label>
    <input type="text" class="form-control" name="telefono" id="tel_pas" placeholder="1234" required>
  </div>
 
 
              

        <div class="col-md-12">
          <br>
          <button type="submit" class="btn btn-primary" id="guarda_pas" name="guarda_pas">Registrar</button>
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
  var nombreusuario = document.getElementById('usu_pas');
  var contrausuario = document.getElementById('contra_pas');
  var nompasajero = document.getElementById('nom_pas');
  var apepasajero = document.getElementById('ape_pas');
  var emailpasajero = document.getElementById('email_pas');
  var telpasajero = document.getElementById('tel_pas');

  // Guardar los datos del formulario en el almacenamiento local
  sessionStorage.setItem('usu_pas', nombreusuario.value);
  sessionStorage.setItem('contra_pas', contrausuario.value);
  sessionStorage.setItem('nom_pas', nompasajero.value);
  sessionStorage.setItem('ape_pas', apepasajero.value);
  sessionStorage.setItem('email_pas', emailpasajero.value);
  sessionStorage.setItem('tel_pas', telpasajero.value);

  // Eliminar los datos del formulario al cambiar de pestaña
  nombreusuario.value = '';
  contrausuario.value = '';
  nompasajero.value = '';
  apepasajero.value = '';
  emailpasajero.value = '';
  telpasajero.value = '';

});

window.addEventListener('load', function() {
  var nombreusuario = document.getElementById('usu_pas');
  var contrausuario = document.getElementById('contra_pas');
  var nompasajero = document.getElementById('nom_pas');
  var apepasajero = document.getElementById('ape_pas');
  var emailpasajero = document.getElementById('email_pas');
  var telpasajero = document.getElementById('tel_pas');

  // Obtener los datos del almacenamiento local y restaurarlos en los campos del formulario
  if (sessionStorage.getItem('usu_pas')) {
    nombreusuario.value = sessionStorage.getItem('usu_pas');
  }

  if (sessionStorage.getItem('contra_pas')) {
    contrausuario.value = sessionStorage.getItem('contra_pas');
  }

  if (sessionStorage.getItem('nom_pas')) {
    nompasajero.value = sessionStorage.getItem('nom_pas');
  }

  if (sessionStorage.getItem('ape_pas')) {
    apepasajero.value = sessionStorage.getItem('ape_pas');
  }

  if (sessionStorage.getItem('email_pas')) {
    emailpasajero.value = sessionStorage.getItem('email_pas');
  }

  if (sessionStorage.getItem('tel_pas')) {
    telpasajero.value = sessionStorage.getItem('tel_pas');
  }
});


    </script>

  </body>

    </html>