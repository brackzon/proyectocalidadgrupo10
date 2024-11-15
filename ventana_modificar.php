<?php

require 'conec_gen.php';

$tabla_sql = $mysqli -> real_escape_string($_POST['tabla']);
$sistema = $mysqli -> real_escape_string($_POST['sistem']);

$sql = "SELECT tabla, atributo FROM vista_tabla WHERE tabla = '$tabla_sql';";

$resultado = $mysqli->query($sql);
$resultado2 = $mysqli->query($sql);
$resultado3 = $mysqli->query($sql);


$sql1 = "SELECT DISTINCT tabla FROM vista_tabla WHERE nom_system = '$sistema';";
     $resultado4 = $mysqli->query($sql1);

$archivo = fopen("C:\Users\BRACKZON\Desktop\Modificar_".$tabla_sql.".php","a") or die ("ERROR AL CREAR");

$tab = $_REQUEST['tabla'];
    $con = $_REQUEST['con'];
    $pr = $_REQUEST['proy'];

    $array_atributos = [];

    fwrite($archivo,"<?php"."\n");
    fwrite($archivo,""."\n");
    fwrite($archivo,"require '".$con.".php';"."\n");
    fwrite($archivo,""."\n");
    fwrite($archivo,'$id = '.'$mysqli->real_escape_string($_GET[\'id_'.$tab.'\']);'."\n");

    while($fila = $resultado->fetch_assoc()) {

        array_push($array_atributos,$fila['atributo']);
           
    }

    $string_atributos = "";

     foreach ($array_atributos as $valor) {
        $string_atributos .= $valor . ", ";
    }

    fwrite($archivo,'$sql = "SELECT '.$string_atributos.'FROM '.$tabla_sql.';";'."\n");
    fwrite($archivo,'$resultado = $mysqli->query($sql);'."\n");
    fwrite($archivo,""."\n");
    fwrite($archivo,"?>"."\n");

    

     fwrite($archivo,"<?php"."\n");
     fwrite($archivo,"session_start();"."\n");
    fwrite($archivo,'$usu_sesion = $_SESSION[\'usu\'];'."\n");
    fwrite($archivo,"// Verificar el tipo de usuario"."\n");
    fwrite($archivo,'if ($usu_sesion = \'\' || $usu_sesion == null) {'."\n");
    fwrite($archivo,'header("Location: http://localhost/'.$pr.'/");'."\n");
    fwrite($archivo,"echo '<style>#cerrar_sesion { display: none; }</style>';"."\n");
    fwrite($archivo,"die();"."\n");
    fwrite($archivo,"}"."\n");
    fwrite($archivo,"else {"."\n");
    fwrite($archivo,""."\n");
    fwrite($archivo,"echo '<style>#crear_usuario { display: none; }</style>';"."\n");
     //indicar el tipo de usuario (cliente, empleado,etc)
      //para restringin ventanas o acciones (editar,modificar,ect)
      $tipo_usuario = $_REQUEST['usu'];
  
    fwrite($archivo,'if ($_SESSION[\'pf\'] === '.$tipo_usuario.') {'."\n");

        fwrite($archivo,"echo '<style>.item { display: none; }</style>';"."\n");
      fwrite($archivo,"   }"."\n");
      fwrite($archivo,"}"."\n");
      fwrite($archivo,"?>"."\n");
      //aqui colocar 2 atributos concatendias
      //q sea  nombres u apellidos de preferencia
      // y uno mas para el VALUE del select

      fwrite($archivo,""."\n");
      fwrite($archivo,""."\n");
      fwrite($archivo,"<!doctype html>"."\n");
      fwrite($archivo,"<html lang=\"es\">"."\n");
      fwrite($archivo,"   <head>"."\n");
      fwrite($archivo,"       <meta charset=\"utf-8\">"."\n");
      fwrite($archivo,"       <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">"."\n");
      fwrite($archivo,"       <title>".$pr."</title>"."\n");
      fwrite($archivo,'<link href="css/bootstrap.min.css" rel="stylesheet">'."\n");
      fwrite($archivo,'<link href="css/disenio_vista_principal.css" rel="stylesheet">'."\n");
      fwrite($archivo,'<link rel= "stylesheet" href="css/jquery.dataTables.min.css">'."\n");
      fwrite($archivo,'<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">'."\n");
      fwrite($archivo,""."\n");
      fwrite($archivo,'<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>'."\n");
      fwrite($archivo,'<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>'."\n");
      fwrite($archivo,""."\n");
      fwrite($archivo,"    </head>"."\n");

      fwrite($archivo,"    <body>"."\n");
      fwrite($archivo,""."\n");
      fwrite($archivo,"    <div class=\"container-fluid text-black\" style=\"background-color: #BEE7F4\" id=\"cont_menu\">"."\n");
      fwrite($archivo,""."\n");
      fwrite($archivo,'       <nav class="navbar navbar-expand-md navbar-light border-3 border-button">'."\n");
      fwrite($archivo,'          <div class="container-fluid">'."\n");
      fwrite($archivo,'             <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="100"><strong>'.$pr.'</strong></a>'."\n");
      fwrite($archivo,'             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">'."\n");
      fwrite($archivo,'                <span class="navbar-toggler-icon"></span>'."\n");
      fwrite($archivo,'             </button>'."\n");
      fwrite($archivo,'             <div class="container fluid">'."\n");
      fwrite($archivo,'                <div class="collapse navbar-collapse" id="MenuNavegacion">'."\n");
      fwrite($archivo,'                   <ul class="navbar-nav ml-auto">'."\n");
      while($fila = $resultado4->fetch_assoc()) {
        fwrite($archivo,'                      <li class="nav-item">'."\n");
        //colocar ITEM en la clase para restringir el acceso a esa vista
        fwrite($archivo,'<a class="nav-link" href="'.$fila['tabla'].'.php"><strong>'.$fila['tabla'].'</strong></a>'."\n");
        fwrite($archivo,'                      </li>'."\n");
     }
      fwrite($archivo,''."\n");
      fwrite($archivo,'                      <li class="nav-item">'."\n");
      fwrite($archivo,"                         <a class='nav-link btn btn-danger' id='cerrar_sesion' role='button' href='cerrar_sesion.php'><strong>Cerrar sesion</strong></a>"."\n");
      fwrite($archivo,'                         <a class="nav-link btn btn-success" role="button" href="iniciar_sesion.php" id="crear_usuario"><strong>Iniciar sesion</strong></a>'."\n");
      fwrite($archivo,'                      </li>'."\n");
      fwrite($archivo,'                   </ul>'."\n");
      fwrite($archivo,'                </div>'."\n");
      fwrite($archivo,'             </div>'."\n");
      fwrite($archivo,'          </div>'."\n");
      fwrite($archivo,'       </nav>'."\n");
      fwrite($archivo,'    </div>'."\n");
      fwrite($archivo,''."\n");
      fwrite($archivo,''."\n");
      fwrite($archivo,''."\n");


      fwrite($archivo,'  <div class="container-fluid" id="contenedor_fondo">'."\n");
      fwrite($archivo,'       <form class="row g-3" id="formulario" method="post" name="modificar_'.$tab.'" action=",modificar_'.$tab.'.php">'."\n");
      fwrite($archivo,'<!-- COLOCAMOS POST XQ SE ENVIAN DATOS, EN ACTION VA EL ARCHIVO DONDE ESTA EL CODIGO PARA -->'."\n");
      fwrite($archivo,'<!-- GUARDAR LA INFO   -->'."\n");
      fwrite($archivo,'       <div class="col-12">'."\n");
      fwrite($archivo,'           <h3>Datos del bus</h3>'."\n");
      fwrite($archivo,'       </div>'."\n");
      while($fila = $resultado2->fetch_assoc()) {
        fwrite($archivo,'     <div class="col-md-4">'."\n");
      fwrite($archivo,'         <label for="'.$fila['atributo'].'" class="form-label">'.$fila['atributo'].'</label>'."\n");

      fwrite($archivo,'         <input type="text" class="form-control" 
      name="'.$fila['atributo'].'" id="id_'.$fila['atributo'].'"
      value=  "<?php echo $fila[\''.$fila['atributo'].'\']; ?>" required>  '."\n");

      fwrite($archivo,'       </div>'."\n");
      }
      
      fwrite($archivo,'<input type="hidden" id = "id_co" name = "id_co" value = "<?php echo $id; ?>">'."\n");

      fwrite($archivo,'     <div class="col-md-4">'."\n");
      fwrite($archivo,'           <label for="fab" class="form-label">clabe foranea</label>'."\n");
      fwrite($archivo,'             <select class="form-select" name="lista">'."\n");
      fwrite($archivo,'               <option selected>Seleccione una opcion</option>'."\n");
      fwrite($archivo,'               <?php '."\n");
      fwrite($archivo,''."\n");
      fwrite($archivo,'                 while($fila = $resultado->fetch_assoc()) {'."\n");
      fwrite($archivo,'echo \'<option value="\'.$fila[\'num_licencia\'].\'">\'.$fila[\'nombres\'].\'</option>\';'."\n");

      fwrite($archivo,'   }'."\n");
      fwrite($archivo,' ?>'."\n");
      fwrite($archivo,' </select>'."\n");
      fwrite($archivo,'</div>'."\n");
    

      fwrite($archivo,''."\n");
      fwrite($archivo,'         <div class="col-md-12">'."\n");
      fwrite($archivo,'         <br>'."\n");
      fwrite($archivo,'         <button type="submit" class="btn btn-primary">Modificar</button>'."\n");
      fwrite($archivo,'         <br>'."\n");
      fwrite($archivo,'         <br>'."\n");
      fwrite($archivo,'         </div>'."\n");
      fwrite($archivo,'   </form>'."\n");
      fwrite($archivo,'</div>'."\n");
      fwrite($archivo,''."\n");
      fwrite($archivo,'<script src="js/jquery-3.7.0.min.js"></script>'."\n");
      fwrite($archivo,'<script src="js/bootstrap.min.js"></script>'."\n");
      fwrite($archivo,''."\n");
      
      fwrite($archivo,''."\n");
 