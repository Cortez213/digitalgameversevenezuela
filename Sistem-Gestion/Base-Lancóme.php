<?php
include 'conexion/conexion-base-lancome.php';

?>
<?php
session_start();
include 'conexion/conexion.php';

if(!isset($_SESSION['nombre'])) { 
    echo '
         <script>
            alert("Por favor debes iniciar sesión");
            window.location = "ingreso.php";
         </script>
    ';
    session_destroy();
    die();
}
?>

<style>
  #submenu {
    position: absolute;
    top: 60px; /* ajusta esta propiedad según sea necesario para alinear el submenú al icono */
    left: 1050px; /* ajusta esta propiedad según sea necesario para alinear el submenú al icono */
    background-color: #ffffff;
    padding: 8px 16px;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: none;
  }
  
  .menu:hover #submenu {
    display: block;
    
  }
  .section-title{
  margin-top: -10px;
}
.producto {
   width: 300px;
   display: inline-block;
   text-align: center;
   margin: 10px;
   border: 1px solid black;
   padding: 10px;
  }

  .producto img {
   width: 200px;
   height: 200px;
  }

  .producto p {
   margin: 0;
  }

</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Carrito.css">
    <link rel="stylesheet" href="header.css">
    <link rel="icon" href="vistas/img/plantilla/icono-negro.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    
</head>


<body>
    <header id="main-header">

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
              
              <i class='bx bx-shopping-bag' id="cart-icon"></i>
              

             <div class="cart">
                <h2 class="cart-title">Carrito</h2>

                <div class="cart-content">

</div>
                <div class="total">
    <div class="total-title">Total</div>
    <div class="total-price">$0</div>
</div>
<form action="nuevafactura.php" method="POST" id="comprarForm">
    <input type="hidden" name="productos_seleccionados" id="productosSeleccionados">
    
    <button type="submit" class="btn-buy">Comprar</button>
</form>

<i class='bx bx-x' id="cart-close"></i>
<button id="empty-cart" class="btn-buy">Vaciar Carrito</button>

</div>  

</div>

</div>
<div id="category-header">
    <div class="nav container">
        <a href="todas-lancome.php" class="category-link">Todas</a>
        <a href="Labial-Lancóme.php" class="category-link ">Labial</a>
        <a href="Base-Lancóme.php" class="category-link active">Base</a>
        <a href="Corrector-Lancóme.php" class="category-link ">Corrector</a>
        <a href="Sombra-Lancóme.php" class="category-link">Sombra</a>
        <a href="Iluminador-Lancóme.php" class="category-link ">Iluminador</a>
        <a href="Brochas-Lancome.php" class="category-link ">Brochas</a>
        <a href="Polvo-Lancóme.php" class="category-link" id="polvo-link">Polvo</a>
    </div>
</div>
<script>
  document.getElementById('cart-icon').addEventListener('click', function() {
    document.getElementById('polvo-link').style.visibility = 'hidden';
});

document.getElementById('cart-close').addEventListener('click', function() {
    document.getElementById('polvo-link').style.visibility = 'visible';
});
</script>
<!-- Aquí está el espacio entre los encabezados y la sección de productos -->
<div style="height: -20px;"></div>
</header>

<?php

if ($result->num_rows > 0) {
  echo '<section class="shop container" style="margin-top: 130px;">';
  echo '<h2 class="section-title">Productos</h2>';
  echo '<div class="shop-content">';

  while ($row = $result->fetch_assoc()) {
      echo '<div class="product-box">';
      echo '<img src="' . $row['imagen'] . '" alt="" class="product-img">';
      echo '<h2 class="product-title">' . $row['descripcion'] . '</h2>';
      echo '<p class="product-stock">Stock: ' . $row['stock'] . '</p>'; // línea agregada
      echo '<span class="product-price">$' . $row['precio_compra'] . '</span>';
      echo '<i class="bx bx-shopping-bag add-cart"></i>';

      echo '</div>';
  }

  echo '</div>';
  echo '</section>';
} else {
  echo "No se encontraron productos en la base de datos.";
}

$conn->close();

?>


<footer class="footer">
        <div class="container">
          <div class="col1">
            <a href="#" class="brand">VariMarkt</a>
            <ul class="media-icons">
              <li>
                <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa-brands fa-discord"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa-brands fa-github"></i></a>
              </li>
            </ul>
          </div>
          <div class="col2">
            <ul class="menu">
              <li><a href="index.php">Inicio</a></li>
              <li><a href="Registrate.php">Registrate</a></li>
              <li><a href="index.php#inicio">Contactanos</a></li>
              <p>Esta es una empresa Recien inventada dirigida al excito, asi que buscanos y a los mejores productos.</p>
            </ul>
          </div>
          <div class="col3">
            <p>Suscribete</p>
            <form>
              <div class="input-wrap">
                <input type="email" placeholder="ex@gmail.com" /><button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
              </div>
            </form>
            <ul class="services-icons">
              <li>
                <a href="#"><i class="fa-brands fa-cc-paypal"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa-brands fa-cc-apple-pay"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa-brands fa-google-pay"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa-brands fa-cc-amazon-pay"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="mekk">
            <p>@Anthony Cortez 2023</p>
          </div>
        </div>
      </footer>
      



      <script src="assets/js/header.js"></script>
      <script src="assets/js/jsa.js"></script>
    <script src="Assets/js/Buscador.js"></script>