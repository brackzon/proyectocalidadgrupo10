

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/login.css"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/login.js"></script>
</head>
<body>
    <div class="login_form_container">
        <div class="login_form">
            <h2>Iniciar sesión</h2>
            <form action="procesar_login.php" method="POST">
                <div class="input_group">
                    <i class="fa fa-user"></i>
                        
                        <input type="text" placeholder="Usuario" name="usuario_nombre" class="input_text" autocomplete="off" required><br><br>
                </div>
                <div class="input_group">
                    <i class="fa fa-unlock-alt"></i>
                        
                        <input type="password" placeholder="Contraseña" name="contrasenia" class="input_text" autocomplete="off" required><br><br>
                </div>
                <div class="button_group" id="login_button">
                        <input type="submit" value="Iniciar sesión">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
