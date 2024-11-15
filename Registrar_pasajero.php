
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
                  <a class="nav-link" href="reservas.php" style="display:none"><strong>Reservas</strong></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="rutas.php" style="display:none"><strong>Rutas</strong></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn btn-success" role="button" href="iniciar_sesion.php"><strong>Iniciar sesion</strong></a>
                </li>
              </ul>
              </div>
            </div>
          </div>
        </nav>

  </div>
      
  <div class="container-fluid text-white" id="contenedor_fondo">
       
        
              
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
    <input type="password" class="form-control" name="contrasenia" id="usu_pas" placeholder="Escriba su contraseña" required>
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

  </body>

    </html>