<?php
    include 'conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conexion->query($query);
    
        if ($result->num_rows > 0) {
            $nuevaContrasena = generarContraseñaAleatoria();
        
            $query = "UPDATE usuarios SET contrasena = '$nuevaContrasena' WHERE email = '$email'";
           $conexion->query($query);
        
           enviarCorreoRecuperacion($email, $nuevaContrasena);
        
           header("Location: formulario-restablecimiento.php?email=$email");
           exit();
        } else {
          echo "El email no existe en la base de datos.";
        }
    }

    function generarContraseñaAleatoria() {
        $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $contrasena = "";
    
        for ($i = 0; $i < 8; $i++) {
            $indice = rand(0, strlen($caracteres) - 1);
            $contrasena .= $caracteres[$indice];
        }
    
        return $contrasena;
    }

    function enviarCorreoRecuperacion($email, $nuevaContrasena) {
        $to = $email;
        $subject = "Recuperación de contraseña";
        $message = "Hemos restablecido tu contraseña. Tu nueva contraseña es: $nuevaContrasena";
        $headers = "From: correo@dominio.com";
    
        mail($to, $subject, $message, $headers);
    }
?>

<style>
    
    #loco {
  width: 500px; /* Ajusta el ancho  */
  height: 500px; /* Ajusta la altura  */
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recupera.css">
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
                <a href="Carrito.php" class="link large">Catalago</a>
                <a href="" class="link large">Contactános</a>
            
            </div>
            

        </div>

       


    </header>


    <form action="recupera.php" method="POST" id="loco" autocomplete="off">
            <h2 class="create-account">Recupera Tu Contraseña</h2>
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
            <p class="cuenta-gratis">¿Perdiste tu contraseña?</p>
            <input type="email" name="email" placeholder="Email" required>
            
            <div class="olvidaste">
                <a href="Registrate.php">Inciar Sesion Aqui</a>
            </div>
            <input type="submit" value="Enviar Solicitud" id="Inicio">
            
        </form>



