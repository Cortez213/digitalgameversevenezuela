<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box; /* Agregado para asegurar que el ancho y la altura incluyan el padding y el borde */
        }
        body, html {
            height: 100%; /* Asegúrate de que el cuerpo y el html tengan altura completa */
            overflow-y: hidden; /* Para eliminar el desplazamiento vertical */
        }
        #particles-js{
            width: 100vw; /* Ajustado para llenar todo el ancho de la ventana */
            height: 100vh; /* Ajustado para llenar toda la altura de la ventana */
            background-color: black;
            position: relative; /* Asegúrate de que este div sea posicionado */
        }
        
          #principal{
          color: wheat;
          position: absolute;
          z-index: 1;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          height: 100%;
          left: 50%; /* Para centrar horizontalmente */
          top: 40%; /* Ajustado para mover hacia arriba */
          transform: translate(-50%, -50%); /* Ajustado para mover hacia arriba */
        }
        /* ... tus otros estilos ... */
        .pie-pagina{
            position: fixed; /* Cambiado a fijo para pegarlo en la parte inferior */
            bottom: -50px; /* Ajustado para pegar el pie de página al borde inferior */
            right: 0; /* Ajusta este valor para mover el pie de página hacia la izquierda o la derecha */
            color: transparent;
            width: 100%; /* Asegúrate de que cubra toda la anchura */
            background-color: transparent;
            padding: 1px 3px;
            text-align: center;
            color: #ffffff;
        }
        
    </style>
    
    <style>
    .loco{
            font-size: 1.1rem;
            
            font-weight: 600;
            color: var(--sec-color);
            text-transform: uppercase;
            color: aliceblue;
            }
            .loco {
    font-size: 30px; 
    position: absolute; 
    right: 400px;
}
</style>
  
    <style>
      .nav{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
        }
      .logo{
            font-size: 1.1rem;
            
            font-weight: 600;
            color: var(--sec-color);
            text-transform: uppercase;
            color: aliceblue;
        }
        .logo span{
            color: var(--main-color);
            font-weight: 700;
        }
.nav a {
    color: #ffffff;
    transition: color 0.3s ease-in-out;
}
.nav a:hover{
    color: #4a4aee;
}

.right-links{
    display: flex;
    gap: 10px;
}
.link{
    margin-left: 16px;
    font-size: 16px;
    font-weight: 600;
}
.large{
    font-size: 18px;
    
}
.olvidaste a {
    color: #ffffff;

}

.logo {
    font-size: 30px; 
    position: absolute; 
    right: 60%;
}
.pie-pagina .grupo-2{
    background-color: transparent;
    padding: 1px 3px;
    text-align: center;
    color: #ffffff;
}

.pie-pagina .grupo-2 small{
    font-size: 18px;
}
@media screen and (max-width:800px){
    .pie-pagina .grupo-1{
        width: 90%;
        grid-template-columns: repeat(1, 1fr);
        grid-gap:30px;
        padding: 35px 0px;
    }
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
</style>
</head>
<body>
<style>
.nav .right-links {
    display: flex;
    justify-content: flex-end;
}
.nav .right-links .link {
    font-size: 35px;
    margin-left: 0;
}


</style>

<div id="particles-js">
    <main id="principal">
        <div class="nav container">
            <div class="right-links">
           
            </div>
        </div>
            <div class="login-box">
                <div class="login-logo">
                    <!-- ... tu logo ... -->
                    <img src="vistas/img/plantilla/logo-blanco-bloque.jpg" class="img-responsive">
                </div>

                <div class="login-box-body">
                    <p class="login-box-msg">Ingresar al sistema</p>
                    <form method="post">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                            </div>
                        </div>
                        <?php
                            $login = new ControladorUsuarios();
                            $login -> ctrIngresoUsuario();
                        ?>
                    </form>
                </div>
                <footer class="pie-pagina">
        <div class="grupo-2">
            <small>&copy; 2023 <b>Anthony Cortez</b> - Todos los Derechos Reservados.</small>
        </div>
      </footer>
            </div>
            <!-- ... el resto de tu código ... -->
        </main>
        <style>
            .icono {
    position: fixed; /* Cambiado a fijo para mover el icono independientemente */
    top: 120px; /* Aumenta este valor para mover el icono hacia abajo */
    right: 1000px; /* Aumenta este valor para mover el icono a la derecha */
}
        </style>
        <a href="cerrar_sesion.php" class="link large">
    <i class="fas fa-times" style="color:red;"></i> <!-- Icono de cierre -->
</a>
    </div>
    <script src="js/particles.min.js"></script>
    <script src="js/particlesjs-config.json"></script>
</body>
</html>