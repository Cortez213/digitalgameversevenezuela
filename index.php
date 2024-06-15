<?php
   session_start();

    if(isset($_SESSION['nombre'])){
        header("location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sistem-Gestion/vistas/img/plantilla/icono-negro.jpg">
    <link rel="stylesheet" href="registrate1.css">
    <link rel="stylesheet" href="contactanos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Formulario</title>
</head>

<body>

    <header>
    <div class="nav container">
  <a href="index.php" class="logo">VariMarkt</a>
  <div class="right-links">
    <a href="index.php" class="link large">Inicio</a>

       


    </header>




    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido a VariMarkt</h2>
                <p>Si ya tienes una cuenta por favor inicia sesion aqui</p>
                <button class="sign-up-btn">Iniciar Sesion</button>
            </div>
        </div>
        <form  action="registro_usuario.php" method="POST" id="form">
            <h2 class="create-account">Crear una cuenta</h2>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-instagram'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-linkedin' ></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle' ></i>
                </div>
            </div>
            <p class="cuenta-gratis">Crear una cuenta</p>
            <input type="text" name="nombre" placeholder="Usuaurio" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            
            <input type="submit"  value="Registrarse" id="Registrarse">
        </form>



    </div>
    <div class="container-form sign-in">
        <form action="inicio_usuario.php" method="POST" id="loco">
            <h2 class="create-account">Iniciar Sesion</h2>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-instagram'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-linkedin' ></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle' ></i>
                </div>
            </div>
            <p class="cuenta-gratis">¿Aun no tienes una cuenta?</p>
            <i class="fas fa-envelope"></i>
            <input type="text" name="campo" placeholder="Usuario o Email" required>
            
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <div class="olvidaste">
                <a href="recupera.php">¿Olvidaste tu contraseña?</a>
            </div>
            <input type="submit" value="Iniciar Sesion" id="Inicio">
            
        </form>
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido de nuevo</h2>
                <p>Si aun no tienes una cuenta por favor registrese aqui</p>
                <button class="sign-in-btn">Registrarse</button>
            </div>
        </div>
    </div>

    <footer class="pie-pagina">
        <div class="grupo-2">
            <small>&copy; 2023 <b>Anthony Cortez</b> - Todos los Derechos Reservados.</small>
        </div>
      </footer>
    





    <script src="assets/js/script.js"></script>
    <script src="assets/js/contactanos.js"></script>






</body>

</html>