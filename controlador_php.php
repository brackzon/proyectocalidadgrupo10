<!doctype html>
<html lang="es">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generador de codigo</title>
        <style>
            *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {background-color: yellow}
            .encabezado {height: 23vh;
                width: 100vw;
                background-color: blue;
                position: relative;}
            .contenido {height: 77vh; 
                width: 100vw;
                background-color: red;
                position: relative;}
            .menu {
                background-color: orange;
                min-width: 200px;
                width: 50vw;
                display: flex;
                justify-content: space-evenly;
                position: absolute;
                bottom: 0;
                right: 0.1px;
                top: 60px;
                flex-wrap: wrap;
                align-items: flex-start;
            }
           
            .item {
                background-color: yellow;
                font-size: 25px;
                text-align: center;
                text-decoration: none;
                color:black;
            }
            .form__vista {
                height: 40%;
                width: 30%;
                position: absolute;
                top: 0;
                left: 0;
                background-color: aqua;
               
            }

            h3,input, button {font-size: 20px; 
                text-align: center;
                display: inline-block;
                width: 40%;
            }

            .form__vista-2 {
                height: 40%;
                width: 60%;
                position: absolute;
                left: 500px;
                top: 0;
                background-color: aqua;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }

            .form__vista-2 * {
                width: 50%;
                
            }

            .form__vista-3 {
                background-color: aqua;
                width: 50%;
                position: absolute;
                bottom: 50px;
                left: 0;
                
            }

            .form__vista-4 {
                position: absolute;
                bottom: 50px;
                right: 0;
                background-color: aqua;
                width: 50%;
            }
        </style>
  </head>
  <body>
    <nav class="encabezado">
        <div class="menu">
            <a href="generador_php.php" class="item">VISTA</a>
            <a href="controlador_php.php" class="item">CONTROLADOR</a>
            <a href="" class="item">CONEXION</a>
        </div>
    </nav>
    <div class="contenido">
            <form action="control_registrar.php" method="POST" 
            class="form__vista">
                <h3 style="display: block; width: 100%">CONTROL REGISTRAR</h3>
                <h3>CONEXION</h3>
                <input type="text" class="entrada" name="conexion">

                <h3>TABLA</h3>
                <input type="text" class="entrada" name="tabla">
            
         
                <button type="submit">crear html</button>
            </form>
            <form action="control_modificar.php" method="POST" class="form__vista-2">
            <h3>CONTROL MODIFICAR</h3>
                <h3>CONEXION</h3>
                <input type="text" class="entrada" name="conexion">
               
                <h3>TABLA</h3>
                <input type="text" class="entrada" name="tabla">
            
                <button type="submit">crear html</button>
            </form>

            <form action="control_eliminar.php"  method="POST" class="form__vista-3">
            <h3>CONEXION</h3>
                <input type="text" class="entrada" name="conexion">
               <h3>nombre PROYECTO</h3>
               <input type="text" class="entrada" name="proy">
                <h3>TABLA</h3>
                <input type="text" class="entrada" name="tabla">
               
                <button type="submit">crear html</button>
            </form>

            
    </div>

  </body>