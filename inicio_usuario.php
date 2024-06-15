<?php
session_start();
include 'conexion/conexion.php';

$campo = filter_input(INPUT_POST, 'campo'); 
$contrasena = $_POST['contrasena'];
$contrasenaEncriptada = hash('sha512', $contrasena);


$validar_inicio = mysqli_query($conexion, "SELECT * FROM usuarios WHERE (nombre='$campo' OR email='$campo') AND contrasena='$contrasenaEncriptada'");

if(mysqli_num_rows($validar_inicio) > 0){ 
    $usuario = mysqli_fetch_assoc($validar_inicio);
    $_SESSION['nombre'] = $usuario['nombre']; 
    $_SESSION['perfil'] = $usuario['perfil']; 
    header("Location: nuevo.php"); 
    exit;
}else{
    echo '
        <script>
             alert("Usuario no existe, por favor verifique los datos introducidos");
             window.location = "index.php";
        </script>
    ';
    exit;
}
?>