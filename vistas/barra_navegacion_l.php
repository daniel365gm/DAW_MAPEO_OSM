<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top"> 
	<a class="navbar-brand" href="index.php">
		<img id="logo" src="img/logo.png" width="30" height="30">&nbsp;Mapa de Recursos
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbar1"> 
		<span class="navbar-toggler-icon"></span> 
	</button> 
	<div class="collapse navbar-collapse" id="navbar1"> 
		<div class="navbar-nav"> 
			<a class="nav-item nav-link" href="recurso.php">Mi Recurso</a>   <!--  active para mas blanco -->
			<!-- <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#v_reg">Inscribirse</a>  -->
			<a class="nav-item nav-link" href="gestion.php">Gestion</a>  
		</div>
		<div class="navbar-nav ml-auto" id="navbar2">
			<a class="nav-item nav-link fab" href="" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
				  	<path d="M16 8.049c0-180.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
				</svg>
			</a> 
			<a class="nav-item nav-link" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
				  	<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
				</svg>
			</a>
			<li class="nav-item dropleft" href="#" data-toggle="modal">

		        <a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		         				<?php
					echo $_SESSION["id"];
				?>
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item link" href="#" data-toggle="modal" data-target="#x_login">cerrar sesion</a>
		        </div>
		    
			</li> 	
		</div>
	</div>
</nav> 





<div class="modal fade" id="x_login">
	<div class= "modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
        	<div class="modal-body">
				<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
				<!-- <br><br> -->
				<!-- formulario login -->
				<div id="form_log">
					<form method="POST" action="../controladores/salir.php">
						Quiere abandonar la sesion?:<br>
						<button type="button" class="btn btn-primary float-left" data-dismiss="modal">NO</button>
					 	<button id="subm_log" type="submit" class="btn btn-primary float-right">SI</button>
					</form>
				</div>
        	</div>
		</div>
	</div>
</div>