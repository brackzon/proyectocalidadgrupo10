<?php
require 'conexion.php';
$sql = "SELECT 1212, FROM luar;";
$resultado = $mysqli->query($sql);
?>
<?php
session_start();
$usu_sesion = $_SESSION['usu'];
// Verificar el tipo de usuario
if ($usu_sesion = '' || $usu_sesion == null) {
header("Location: http://localhost/sistemas_prueba/");
echo '<style>#cerrar_sesion { display: none; }</style>';
die();
}
else {

echo '<style>#crear_usuario { display: none; }</style>';
if ($_SESSION['pf'] === Pasajero) {
echo '<style>.item { display: none; }</style>';
}
}
?>

<!doctype html>
<html lang="es">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>sistemas_prueba</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/disenio_vista_principal.css" rel="stylesheet">
<link rel= "stylesheet" href="css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

<script>
 $(document).ready(function () {
   $('#tablacond').DataTable();
 });
</script>

    </head>
    <body>

    <div class="container-fluid text-black" style="background-color: #BEE7F4" id="cont_menu">

       <nav class="navbar navbar-expand-md navbar-light border-3 border-button">
          <div class="container-fluid">
             <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="100"><strong>sistemas_prueba</strong></a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
                <span class="navbar-toggler-icon"></span>
             </button>
             <div class="container fluid">
                <div class="collapse navbar-collapse" id="MenuNavegacion">
                   <ul class="navbar-nav ml-auto">


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

       <div id="contenido_principal">
          <div>

           </div>
           <div id="contenido_imagen">
               <img src="images/fondo.png" class="imagen">
           </div>
       </div>
     </div>
    <div class="container-fluid" id="contenedor_fondo">
     <br>

       <a class="btn btn-primary mb-3" role="button" href="CRUD/Registrar_luar.php"><strong>Registrar luar</strong></a>

       <div class="tabla_co">
           <table id="tablacond" class="display" style="width:100%">
             <thead>
             <tr>
             <th>1212</th>
             <th></th>
             <th></th>
         </tr>
       </thead>
       <tbody>

       <?php
        while($fila = $resultado->fetch_assoc()) {
       ?>
<input type="hidden" value="<?php echo $fila['id_luar']?>" name="id_luar">
   <tr>
       <td><?php echo $fila[1212];?></td>

       <td><a class="btn btn-warning" role="button" 
         href="CRUD/Modificar_luar.php?id_luar=<?php echo $fila['id_luar'];?>">Modificar</a></td>
         <td><a class="btn btn-danger"
           href="CRUD/Eliminar_luar.php?id_luar=<?php echo $fila['id_luar'];?>">Eliminar</a></td>
   </tr>
   <?php }?>
   </tbody>
  </table>
   </div>
   </div>
</body>
</html>
