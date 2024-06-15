<?php
session_start();
include 'conexion/conexion.php';

if(!isset($_SESSION['nombre'])) { 
    echo '
         <script>
            alert("Por favor debes iniciar sesión");
            window.location = "index.php";
         </script>
    ';
    session_destroy();
    die();
}

if($_SESSION["perfil"] == "Adminstrador"){
    header('Location: Sistem-Gestion/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
		<link rel="icon" href="sistem-Gestion/vistas/img/plantilla/icono-negro.jpg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-xxxxxxxxxxxxxx" crossorigin="anonymous" />
		<link rel="stylesheet" href="kilo.css"/>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="categoria.css">
		<link rel="stylesheet" href="slider.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="script.js" defer></script>
    <title>VariMarkt</title>
</head>
<body>
		<style>
			.menu a {
				color: #ffffff;
			}
		</style>
		<style>
			.wrapper i{
				color: #ffffff;
			}
		</style>
	<header>
			<div class="container-hero">
				<div class="container hero">
					<div class="customer-support">
						
							
						<div class="content-customer-support">
						</div>
					</div>

					<div class="container-logo">
						<i class="fa-solid fa-mug-ho"></i>
						<h1 class="logo"><a href="#">VariMarkt</a></h1>
					</div>
					
					<div class="container-user">
						
					<div id="menui">
                <div class="usuariop">
                <a href="#" onclick="toggleMenui()">
				<i class="fa-solid fa-user fa-beat-fade" style="color: black; margin-left: 5px; vertical-align: middle; margin-right: 10px;"></i>
                  </a>
                  <span style="line-height: 20px; vertical-align: middle;"><?php echo $_SESSION['nombre']; ?></span>
                  
                </div>
                <ul id="submenu">
                  <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
                </ul>
              </div>
              <script>
                    function toggleMenui() {
                        var submenu = document.getElementById("submenu");
                        if (submenu.style.display === "none") {
                           submenu.style.display = "block";
                        } else {
                            submenu.style.display = "none";
                        }
                    }
              </script>

                    </div>	
					</div>	

					<div class="container-navbar">
    <nav class="navbar container">
        <i class="fa-solid fa-bars"></i>
        <ul class="menu">
            <li><a href="nuevo.php">Inicio</a></li>
            <li><a href="Sistem-Gestion/catalago.php">Catalago</a></li>
        </ul>

        <div class="input-container">
            <input type="text" name="buscador" class="input" id="buscador" placeholder="Buscar...">
            <span class="icon">
              <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </span>
        </div>
    </nav>
</div>
		</header>

		<section class="banner">
			<div class="content-banner">
				<p>Productos de tus sueños</p>
				<h2>100% confiables <br />Buscanos</h2>
				<a href="#">Comprar ahora</a>
			</div>
		</section>

		<main class="main-content">
			<section class="container container-features">
				<div class="card-feature">
					<i class="fa-solid fa-plane-up"></i>
					<div class="feature-content">
						<span>Envío gratuito a nivel mundial</span>
						
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-wallet"></i>
					<div class="feature-content">
						<span>Contrareembolso</span>
						<p>100% garantía de devolución de dinero</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-gift"></i>
					<div class="feature-content">
						<span>Tarjeta regalo especial</span>
						<p>Ofrece bonos especiales con regalo</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-headset"></i>
					<div class="feature-content">
						<span>Servicio al cliente 24/7</span>
						<p>LLámenos 24/7 al 041234567</p>
					</div>
				</div>
			</section>

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
      <li><a href="Sistem-Gestion/Labial-Ushas.php">Labial</a></li>
	  <li><a href="Sistem-Gestion/Base-Ushas.php">Base</a></li>
      <li><a href="Sistem-Gestion/Delineador-Ushas.php">Delineador</a></li>
      <li><a href="Sistem-Gestion/Sombra-Ushas.php">Sombra</a></li>
      <li><a href="Sistem-Gestion/Mascara-Ushas.php">Mascara</a></li>
      <li><a href="Sistem-Gestion/Polvo-Ushas.php">Polvo</a></li>
    </ul>
  </div>
</div>

<div id="Kit beauty" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('Kit beauty')">&times;</span>
    <h2>Lancóme</h2>
    <p>Categoría</p>
    <ul>
	<li><a href="Sistem-Gestion/Labial-Lancóme.php">Labial</a></li>
	  <li><a href="Sistem-Gestion/Base-Lancóme.php">Base</a></li>
      <li><a href="Sistem-Gestion/Corrector-Lancóme.php">Corrector</a></li>
      <li><a href="Sistem-Gestion/Sombra-Lancóme.php">Sombra</a></li>
      <li><a href="Sistem-Gestion/Iluminador-Lancóme.php">Iluminador</a></li>
	  <li><a href="Sistem-Gestion/Brochas-Lancome.php">Brochas</a></li>
      <li><a href="Sistem-Gestion/Polvo-Lancóme.php">Polvo</a></li>
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
	  <li><a href="url_para_labial">Base</a></li>
      <li><a href="url_para_base">Delineador</a></li>
      <li><a href="url_para_cejas">Esmalte</a></li>
      <li><a href="url_para_rubor">Rubor</a></li>
      <li><a href="url_para_uñas">Mascaras</a></li>
      <li><a href="url_para_crema">Sombras</a></li>
    </ul>
  </div>
</div>
<section class="container top-products">
    <h1 class="heading-1">Mejores Productos</h1>

    <div class="container-options">
        <span class="active">Destacados</span>
    </div>

    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left" style="background-color: black;"></i>
      <div class="carousel">
        <img src="img/POLVO PRESSED PODWDER USHAS.png" alt="img" draggable="false">
        <img src="img/ILUMINADOR CONTORNO DE OJOS.jpg" alt="img" draggable="false">
        <img src="img/LABIAL ROUGE IN LOVE.jpg" alt="img" draggable="false">
        <img src="img/CORRECTOR PRO AND OTHER.jpg" alt="img" draggable="false">
        <img src="img/POLVO SUELTO LONG TIME NO SHINE.jpg" alt="img" draggable="false">
        <img src="img/CORRECTOR FACIAL.jpeg" alt="img" draggable="false">
        <img src="img/DELINEADOR PLUMN.jpg" alt="img" draggable="false">
        <img src="img/BASE EN STICK TEINT IDOLE ULTRA WEAR.jpg" alt="img" draggable="false">
      </div>
      <i id="right" class="fa-solid fa-angle-right" style="background-color: black;"></i>
    </div>
</section>
    
			<section class="gallery">
				<img
					src="img/ILUMINADOR DUAL FINISH.jpg"
					alt="Gallery Img1"
					class="gallery-img-1"
				/><img
					src="img/BASE DE MAQUILLAJE EN POLVO.jpg"
					alt="Gallery Img2"
					class="gallery-img-2"
				/><img
					src="img/SOMBRA DE OJOS SEPHORA.jpg"
					alt="Gallery Img3"
					class="gallery-img-3"
				/><img
					src="img/ILUMINADOR DOUBLE ENDED.jpg"
					alt="Gallery Img4"
					class="gallery-img-4"
				/><img
					src="img/SOMBRA DE OJOS HYPNOSE.jpg"
					alt="Gallery Img5"
					class="gallery-img-5"
				/>
			</section>
			
		</main>

		<footer id="inicio"  class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							<li>
								Dirección: Maracay
							</li>
							<li>Teléfono: 041228171</li>
							<li>EmaiL: AnthonyCortez.com</li>
						</ul>
						<div class="social-icons">
							<span class="facebook">
								<i class="fa-brands fa-facebook-f"></i>
							</span>
							<span class="twitter">
								<i class="fa-brands fa-twitter"></i>
							</span>
							<span class="youtube">
								<i class="fa-brands fa-youtube"></i>
							</span>
							<span class="pinterest">
								<i class="fa-brands fa-pinterest-p"></i>
							</span>
							<span class="instagram">
								<i class="fa-brands fa-instagram"></i>
							</span>
						</div>
					</div>

					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li><a href="#">Acerca de Nosotros</a></li>
							<li><a href="#">Información Delivery</a></li>
							<li><a href="#">Politicas de Privacidad</a></li>
							<li><a href="#">Términos y condiciones</a></li>
							<li><a href="#">Contactános</a></li>
						</ul>
					</div>

					<div class="my-account">
						<p class="title-footer">Mi cuenta</p>

						<ul>
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="#">Historial de ordenes</a></li>
							<li><a href="#">Lista de deseos</a></li>
							<li><a href="#">Boletín</a></li>
							<li><a href="#">Reembolsos</a></li>
						</ul>
					</div>

					<div class="newsletter">
						<p class="title-footer">Boletín informativo</p>

						<div class="content">
							<p>
								Suscríbete y recibe ofertas
							</p>
							<input type="email" placeholder="Ingresa el correo aquí...">
							<button>Suscríbete</button>
						</div>
					</div>
				</div>

				<div class="copyright">
					<p>
						Por @anthonycortez 2023
					</p>

					<img src="img/payment.png" alt="Pagos">
				</div>
			</div>
		</footer>
		<script src="slider.js"></script>
		<script src="assets/js/icono.js"></script>
		<script src="assets/js/categoria.js"></script>

		<script
			src="https://kit.fontawesome.com/81581fb069.js"crossorigin="anonymous">
	    </script>
	</body>
</php>
