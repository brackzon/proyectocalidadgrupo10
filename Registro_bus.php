<?php
session_start();
$usu_sesion = $_SESSION['usu'];
// Verificar el tipo de usuario
if ($usu_sesion = '' || $usu_sesion == null) {
header("Location: http://localhost/sistemas_buses/");
echo '<style>#cerrar_sesion { display: none; }</style>';
die();
}
else {

echo '<style>#crear_usuario { display: none; }</style>';
if ($_SESSION['pf'] === cliente) {
echo '<style>.item { display: none; }</style>';
}
}
?>

<!doctype html>
<html lang="es">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>sistemas_buses</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/disenio_reg_mod_conductor.css" rel="stylesheet">
<link href="css/disenio_vista_principal.css" rel="stylesheet">
<link rel= "stylesheet" href="css/jquery.dataTables.min.css">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    </head>
    <body>

    <div class="container-fluid text-black" style="background-color: #BEE7F4" id="cont_menu">

       <nav class="navbar navbar-expand-md navbar-light border-3 border-button">
          <div class="container-fluid">
             <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="100"><strong>sistemas_buses</strong></a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
                <span class="navbar-toggler-icon"></span>
             </button>
             <div class="container fluid">
                <div class="collapse navbar-collapse" id="MenuNavegacion">
                   <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
<a class="nav-link" href="id_bus.php"><strong>id_bus</strong></a>
                      </li>
                      <li class="nav-item">
<a class="nav-link" href="modelo.php"><strong>modelo</strong></a>
                      </li>
                      <li class="nav-item">
<a class="nav-link" href="placa.php"><strong>placa</strong></a>
                      </li>
                      <li class="nav-item">
<a class="nav-link" href="id_conductor.php"><strong>id_conductor</strong></a>
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
       <form class="row g-3" id="formulario" method="post" name="registro_bus" action="guarda_bus.php">
<!-- COLOCAMOS POST XQ SE ENVIAN DATOS, EN ACTION VA EL ARCHIVO DONDE ESTA EL CODIGO PARA -->
<!-- GUARDAR LA INFO   -->
       <div class="col-12">
           <h3>Datos del bus</h3>
       </div>
     <div class="col-md-4">
         <label for="id_bus" class="form-label">id_bus</label>
         <input type="text" class="form-control" name="id_bus" id="id_id_bus"
         required>
       </div>
     <div class="col-md-4">
         <label for="modelo" class="form-label">modelo</label>
         <input type="text" class="form-control" name="modelo" id="id_modelo"
         required>
       </div>
     <div class="col-md-4">
         <label for="placa" class="form-label">placa</label>
         <input type="text" class="form-control" name="placa" id="id_placa"
         required>
       </div>
     <div class="col-md-4">
         <label for="id_conductor" class="form-label">id_conductor</label>
         <input type="text" class="form-control" name="id_conductor" id="id_id_conductor"
         required>
       </div>

         <div class="col-md-12">
         <br>
         <button type="submit" class="btn btn-primary">Registrar</button>
         <br>
         <br>
         </div>
   </form>
</div>

<script src="js/jquery-3.7.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

  <script>
   //restaurar datos del formulario
   window.addEventListener('beforeunload', function(event) {
   // Obtener el formulario y sus campos
 var id_bus = document.getElementById('id_bus');
 var modelo = document.getElementById('modelo');
 var placa = document.getElementById('placa');
 var id_conductor = document.getElementById('id_conductor');

 // Guardar los datos del formulario en el almacenamiento local
 sessionStorage.setItem('id_bus', id_bus.value);
 sessionStorage.setItem('modelo', modelo.value);
 sessionStorage.setItem('placa', placa.value);
 sessionStorage.setItem('id_conductor', id_conductor.value);

   // Eliminar los datos del formulario al cambiar de pestaña
 id_bus.value = '';
 modelo.value = '';
 placa.value = '';
 id_conductor.value = '';

});

 window.addEventListener('load', function() {

 var id_bus = document.getElementById('id_bus');
 var modelo = document.getElementById('modelo');
 var placa = document.getElementById('placa');
 var id_conductor = document.getElementById('id_conductor');

 // Obtener los datos del almacenamiento local y restaurarlos en los campos del formulario
 if (sessionStorage.getItem('id_bus')) {
     id_bus.value = sessionStorage.getItem('nombres_co');
 }

 if (sessionStorage.getItem('modelo')) {
     modelo.value = sessionStorage.getItem('nombres_co');
 }

 if (sessionStorage.getItem('placa')) {
     placa.value = sessionStorage.getItem('nombres_co');
 }

 if (sessionStorage.getItem('id_conductor')) {
     id_conductor.value = sessionStorage.getItem('nombres_co');
 }

});
 </script>
</body>
</html>

