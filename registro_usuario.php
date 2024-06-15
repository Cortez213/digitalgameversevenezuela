<?php

    include 'conexion.php';

    $nombre = $_POST['nombre'];
   
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];


    $contrasena = hash('sha512', $contrasena);
  

    $query = "INSERT INTO usuarios (nombre, email, contrasena)
         Values('$nombre','$email','$contrasena')";

    //vw
    $verificar_nombre = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre='$nombre' ");



    if(mysqli_num_rows($verificar_nombre) > 0){
        echo '
            <script>
             alert("Este nombre ya esta registrado, intenta de nuevo");
             window.location = "index.php";
            </script>
        ';
        exit();
    }

    

    
    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo '
             <script>
             alert("Usuario registrado exitosamente");
             window.location = "index.php";
             </script>
        
        ';
    }else{
        echo'
        <script>
             alert("Intentelo de nuevo");
             window.location = "index.php";
             </script>

         ';    

    }
    
    mysqli_close($conexion);
?>