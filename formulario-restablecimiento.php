<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $nuevaContrasena = $_POST["nuevaContrasena"];
    
    $nuevaContrasenaEncriptada = hash('sha512', $nuevaContrasena);
    
    $query = "UPDATE usuarios SET contrasena = '$nuevaContrasenaEncriptada' WHERE email = '$email'";
    $conexion->query($query);
    
    echo '
            <script>
             alert("Se cambio la contraseña correctamente");
             window.location = "ingreso.php";
            </script>
        ';
        exit();
}

?>
<style>
    #loco {
  width: 500px; /* Ajusta el ancho según tus necesidades */
  height: 500px; /* Ajusta la altura según tus necesidades */
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recupera.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Restblacer Contraseña</title>
</head>
<body>
<header>
        <div class="nav container">
            <a href="index.php" class="logo">VariMarkt</a>
            <div class="right-links">
                <a href="index.php" class="link large">Inicio</a>
                <a href="Carrito.php" class="link large">Catalago</a>
                <a href="index.php#inicio" class="link large">Contactános</a>
            
            </div>
            

        </div>

       


    </header>
    <form action="formulario-restablecimiento.php" method="POST" id="loco">
            <h2 class="create-account">Restablecer contraseña</h2>
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
            <p class="cuenta-gratis">Restablece la contraseña y gracias por preferirnos</p>
            <input type="email" name="email" value="<?php echo $_GET['email']; ?>">
            <input type="password" name="nuevaContrasena" placeholder="Nueva contraseña" required>
            <input type="submit" value="Restablecer contraseña">
            
        </form>





    
</body>
</html>