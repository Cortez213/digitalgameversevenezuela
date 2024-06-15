<?php
include 'conexion/conexion-carrito.php';

?>
<?php
session_start();
include 'conexion/conexion.php';

if(!isset($_SESSION['nombre'])){ 
    echo '
         <script>
            alert("Por favor debes iniciar sesión");
            window.location = "index.php";
         </script>
    ';
    session_destroy();
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ola.css">
    
    <link rel="stylesheet" href="categoria.css">
    <link rel="stylesheet" href="Carrito.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Catalgo</title>
    <link rel="icon" href="vistas/img/plantilla/icono-negro.jpg">
</head>
<body>
<header>

<div class="nav container">
    <a href="../nuevo.php" class="logo">VariMarkt</a>

    <div class="input-container">
        <input type="text" name="buscador" class="input" id="buscador" placeholder="Buscar...">
        <span class="icon"> 
          <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        </span>
      </div>
      <div id="menu">
        <div class="usuario">
        <a href="#" onclick="toggleMenu()">
            <i class="fa-solid fa-user fa-beat-fade" style="color: #ffff; margin-left: 5px; vertical-align: middle; margin-right: 10px;"></i>
          </a>
          <span style="line-height: 16px; vertical-align: middle;"><?php echo $_SESSION['nombre']; ?></span>
          
        </div>
        <ul id="submenu">
          <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
      </div>
      <script>
        function toggleMenu() {
          var submenu = document.getElementById("submenu");
          if (submenu.style.display === "none") {
            submenu.style.display = "block";
          } else {
            submenu.style.display = "none";
             }
         }
      </script>
      </header>
<section class="container top-categories">
  <h1 class="heading-1">Marcas</h1>
  <div class="container-categories">
    <div class="card-category category-Maquillaje">
      <p>Ushas</p>
      <span onclick="openModal('ushas')">Ver más</span>
    </div>
    <div class="card-category category-Labial">
      <p>Lancóme</p>
      <span onclick="openModal('Kit beauty')">Ver más</span>
    </div>
    <div class="card-category category-Termo">
      <p>Chanel</p>
      <span onclick="openModal('Chanel')">Ver más</span>
    </div>
  </div>
</section>

<!-- Modals -->
<div id="ushas" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('ushas')">&times;</span>
    <h2>Ushas</h2>
    <p>Categoría</p>
    <ul>
      <li><a href="Labial-Ushas.php">Labial</a></li>
      <li><a href="Base-Ushas.php">Base</a></li>
      <li><a href="Delineador-Ushas.php">Delineador</a></li>
      <li><a href="Sombra-Ushas.php">Sombras</a></li>
      <li><a href="Mascara-Ushas.php">Mascara</a></li>
      <li><a href="Polvo-Ushas.php">Polvos</a></li>
    </ul>
  </div>
</div>

<div id="Kit beauty" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('Kit beauty')">&times;</span>
    <h2>Lancóme</h2>
    <p>Categoría</p>
    <ul>
    <li><a href="Labial-Lancóme.php">Labial</a></li>
      <li><a href="Base-Lancóme.php">Base</a></li>
      <li><a href="Corrector-Lancóme.php">Corrector</a></li>
      <li><a href="Sombra-Lancóme.php">Sombras</a></li>
      <li><a href="Iluminador-Lancóme.php">Iluminador</a></li>
      <li><a href="Brochas-Lancome.php">Brochas</a></li>
      <li><a href="Polvo-Lancóme.php">Polvos</a></li>
    </ul>
  </div>
</div>

<div id="Chanel" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('Chanel')">&times;</span>
    <h2>Chanel</h2>
    <p>Categoría</p>
    <ul>
      <li><a href="url_para_labial">Labial</a></li>
      <li><a href="url_para_base">Base</a></li>
      <li><a href="url_para_cejas">Cejas</a></li>
      <li><a href="url_para_rubor">Rubor</a></li>
      <li><a href="url_para_uñas">Uñas</a></li>
      <li><a href="url_para_crema">Crema</a></li>
    </ul>
  </div>
</div>

<footer class="pie-pagina">
        <div class="grupo-2">
            <small>&copy; 2023 <b>Anthony Cortez</b> - Todos los Derechos Reservados.</small>
        </div>
      </footer>
            <script src="Assets/js/main.js"></script>
<script src="assets/js/categoria.js"></script>
<script src="assets/js/icono.js"></script>
<script
			src="https://kit.fontawesome.com/81581fb069.js"crossorigin="anonymous">
	    </script>
</body>
</html>