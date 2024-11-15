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
                height: 30%;
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
                bottom: 0;
                left: 0;
                
            }

            .form__vista-4 {
                position: absolute;
                bottom: 0;
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
            <form action="guarda_tablas.php" method="POST" 
            class="form__vista">
                <h3>SISTEMA</h3>
                <input type="text" class="entrada" name="sistem">
                <h3>TABLA</h3>
                <input type="text" class="entrada" name="tabla">
                <h3>ATRIBUTO</h3>
                <input type="text" class="entrada" name="atributo">
         
                <button type="submit">guardar</button>
            </form>
            <form action="crear_html.php" method="POST" class="form__vista-2">
            <h3>NOMBRE DEL PROYECTO</h3>    
            <input type="text" class="entrada" name="proy">
            <h3>NOMBRE DEL SISTEMA</h3>    
                <input type="text" class="entrada" name="sistem">
            <h4>TIPO DE VISTA (PRINCIPAL,TABLA,REGISTRO,MODIFICAR)</h4>    
            <input type="text" class="entrada" name="tipo">
            <h3>NOMBRE DE CONEXION</h3>    
            <input type="text" class="entrada" name="con">
            <h3>NOMBRE DEL USUARIO RESTRINGIDO (cliente,proveedor,etc)</h3>
                <input type="text" class="entrada" name="usu">
            <h3>TABLA</h1>
                <input type="text" class="entrada" name="tabla">
                <button type="submit">crear HTML</button>
            </form>

            <form action="ventana_registro.php"  method="POST" class="form__vista-3">
                <h2>CREAR VENTANA DE REGISTRO</h2>
                <h3>NOMBRE DEL PROYECTO</h3>    
                <input type="text" class="entrada" name="proy">
                <h3>NOMBRE DEL SISTEMA</h3>    
                <input type="text" class="entrada" name="sistem">
                <h3>NOMBRE DE CONEXION</h3>    
                <input type="text" class="entrada" name="con">
                <h3>NOMBRE DEL USUARIO RESTRINGIDO (cliente,proveedor,etc)</h3>
                <input type="text" class="entrada" name="usu">
                <h3>NOMBRE DEL SISTEMA</h3>    
                <input type="text" class="entrada" name="sistem">
                <h3>TABLA</h1>
                <input type="text" class="entrada" name="tabla">
                <button type="submit">crear HTML</button>
            </form>

            <form action="ventana_modificar.php" method="POST" class="form__vista-4">
                <h2>CREAR VENTANA DE MODIFICAR</h2>
                <h3>NOMBRE DEL PROYECTO</h3>    
                <input type="text" class="entrada" name="proy">
                <h3>NOMBRE DE CONEXION</h3>    
                <input type="text" class="entrada" name="con">
                <h3>NOMBRE DEL USUARIO RESTRINGIDO (cliente,proveedor,etc)</h3>
                <input type="text" class="entrada" name="usu">
                <h3>NOMBRE DEL SISTEMA</h3>    
                <input type="text" class="entrada" name="sistem">
                <h3>TABLA</h1>
                <input type="text" class="entrada" name="tabla">
                <button type="submit">crear HTML</button>
            </form>
    </div>

  </body>