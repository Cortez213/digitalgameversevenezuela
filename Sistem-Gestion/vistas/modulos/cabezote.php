 <style>
	.logo-mini {
		color: black;
		background-color: white;
	}
	.logo-lg {
		color: black;
		background-color: white;
	}
 </style>
 <header class="main-header">
 	
    <a href="#" class="logo">
	<span class="logo-mini"><b>Vari</b></span>
      <span class="logo-lg"><b>Vari</b>Markt</span>
    </a>

	<nav class="navbar navbar-static-top" role="navigation">
		

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>
		<script>
			$(document).ready(function() {
  var isHovered = false;

  $('.sidebar-toggle, .main-sidebar, .logo').hover(function() {
    isHovered = true;
    $('body').removeClass('sidebar-collapse');
  }, function() {
    isHovered = false;
    setTimeout(function() {
      if (!isHovered) {
        $('body').addClass('sidebar-collapse');
      }
    }, 300); // Ajusta este valor según tus necesidades
  });
});
		</script>
		 
		  
		


		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

					</a>


					<ul class="dropdown-menu">
						
						<li class="user-body">
							
							<div class="pull-right">
								
								<a href="salir" class="btn btn-default btn-flat">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>