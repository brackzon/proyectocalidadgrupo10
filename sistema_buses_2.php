
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de gestion de buses</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/disenio_vista_principal.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

  </head>
  <body>
    
      <div class="container-fluid text-black" style="background-color: #BEE7F4" id="cont_menu">
        
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
                  <a class="nav-link" href="sistema_buses.php" style="display:none"><strong>Inicio</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="pasajeros.php" style="display:none"><strong>Pasajero</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="usuario.php" style="display:none"><strong>Usuario</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="conductor.php" style="display:none"><strong>Conductor</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="reseervas.php" style="display:none"><strong>Reservas</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="rutas.php" style="display:none"><strong>Rutas</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn btn-success" role="button" href="iniciar_sesion.php" id="crear_usuario"><strong>Iniciar sesion</strong></a>
                </li>
              </ul>
              </div>
            </div>
          </div>
        </nav>

      </div>
      
      <div class="container-fluid" id="contenedor_fondo">

        
          <div id="contenido_principal">
            <div class="texto">
              <h1><b>Rerservas online</b></h1>
              <h3>¡Ahora puedes movilizarte programando reservas de viaje!</h3>
              <a href="Registrar_pasajero.php" class="btn btn-primary boton">Registrate</a>
            </div>
            
            <div class="imagen">
              <img src="images/bus.png" alt="bus.png">
            </div>
            
          </div>
          
      </div>

      

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>