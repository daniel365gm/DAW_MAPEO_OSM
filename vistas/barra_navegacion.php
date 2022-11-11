</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top"> 
	<a class="navbar-brand" href="index.php">
		<img id="logo" src="img/logo.jpg">&nbsp;Mapa de Recursos
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbar1"> 
		<span class="navbar-toggler-icon"></span> 
	</button> 
	<div class="collapse navbar-collapse" id="navbar1"> 
		<div class="navbar-nav"> 
			<a class="nav-item nav-link" href="recurso.php">Recursos</a>   <!--  active para mas blanco -->
			<a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#v_reg">Inscribirse</a> 
			<a class="nav-item nav-link" href="about.php">Espiga</a>  
			<a class="nav-item nav-link" href="gestion.php">Gestion</a>  
		</div>
		<div class="navbar-nav ml-auto" id="navbar2">
			<a class="nav-item nav-link fab" href="https://www.facebook.com/espigabioconstrucion" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
				  	<path d="M16 8.049c0-180.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
				</svg>
			</a> 
			<a class="nav-item nav-link" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
				  	<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
				</svg>
			</a>
			<a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#v_login">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
				  	<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
				  	<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
				</svg>
			</a> 	
		</div>
	</div>
</nav> 








<!-- REGISTRO -->
<div class="modal fade" id="v_reg">
	<div class= "modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
        	<div class="modal-body">
        		<label>INSCRIPCION</label>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<br><br>
				<!-- formulario registro -->
				<form id="form_insc" method="POST" action="../controlador/guardarDatos.php">
					<div class="row">
						<div id="form_reg" class="col-sm-6">
						  	<div class="form-group">			
							    <input type="text" 
							    		class="form-control" 
							    		id="iIniciativa" 
							    		name="inic"
							    		placeholder="Empresa / Recurso" required
							    		value="inic1">
							    </div>
							    <div class="form-group">	
							    <input type="text" 
							    		class="form-control" 
							    		id="iNombre" 
							    		name="nombre" 
							    		placeholder="Nombre persona de contacto" required
							    		value="paco">
							    <input type="text" 
							    		class="form-control" 
							    		id="iTelefono" 
							    		name="tel" 
							    		pattern="[0-9]{9}" 
							    		title="Telefono de 9 cifras"
							    		placeholder="Telefono de contacto" required
							    		value="989898989">
							    <input type="text" 
							    		class="form-control" 
							    		id="iWeb" 
							    		name="web" 
							    		placeholder="Pagina web">						    		
							</div>
							<div class="form-group">
							    <input type="text" 
							    		class="form-control" 
							    		id="iCalle" 
							    		name="calle"
							    		placeholder="Calle" required
							    		value="casa2">
							    <input type="text" 
							    		id="iNumero" 
							    		name="num"
							    		placeholder="Num"
							    		style="width: 52px">	
							    <input type="text" 
							    		id="iPoblacion" 
							    		name="pob"
							    		placeholder="Poblacion" required
							    		value="madrid">
							</div>

						  	<div class="form-group">	
						 		 <small id="emailHelp" class="form-text text-muted">No se compartirá su correo con terceros.</small>		
							    <input type="text" 
							    		class="form-control" 	    		
							    		id="inputEmail" 
							    		name="mail"
							    		aria-describedby="emailHelp" 
							    		pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"
							    		title="Correo con formato xxxx@xxxxx.xxx"
							    		placeholder="Correo electronico" required
							    		value="xsadasda@ss.xx">

						    	<input type="text" 
						    		minlength="8"
						    		class="form-control" 
						    		id="iPassword"
						    		name="pass" 
						    		placeholder="Contraseña para esta web" required
						    		value="ñkjñfalkjdsfñsa">
						  	</div>


	<!--  -->

			<script type="text/javascript">
				
			let peticion;
			const buscar_calle = (dir) => {
				peticion = new XMLHttpRequest();
				// let URL_s= "https://nominatim.openstreetmap.org/search?q=29+general+sanjurjo+coru%C3%B1a&format=json";
				
				let URL_s= dir;
				// let URL_s="https://nominatim.openstreetmap.org/search?q="+num+"+"+calle+"+"+ciudad+"&format=json";
				// alert(URL_s);
				peticion.open('GET', URL_s); 
				peticion.send();
				peticion.addEventListener("load", cargada);
			}
		

			const cargada = () => {

				let datos = JSON.parse(peticion.responseText);
				
				let calle = datos[0].display_name;
				let lat = datos[0].lat;
				let lon = datos[0].lon;

				// let resultados =calle+" - "+lat+"::"+lon;
				//let resultados = `Direccion: ${calle} - [${lat}]:[${lon}]`;

				document.getElementById("ilat").value = lat;
				document.getElementById("ilon").value = lon;
				// document.getElementById("gogo").click();

			}

			let var1 = document.getElementById("iPoblacion");
			var1.addEventListener("focusout", function() {
			    if(var1.value != ""){
			    	let num = document.getElementById("iNumero").value;
			    	let calle = document.getElementById("iCalle").value;
			    	let ciudad= document.getElementById("iPoblacion").value;
			    	let direccion = "https://nominatim.openstreetmap.org/search?q="+num+"+"+calle+"+"+ciudad+"&format=json";
			        buscar_calle(direccion);
			    }
			});



			</script>

			<input type="text" id="ilat" name="lat" hidden>

			<input type="text" id="ilon" name="lon" hidden>
	<!--  -->
							<label>Descripcion:</label>
							<textarea id="idesc" name ="desc" class="form-control"></textarea>
						
						</div> <!-- end div form-reg -->
						<div class="col-6">
							<div class="form-group" style="margin-left: 10%;">
							<?php
								include("../controlador/consulta_categoria.php");
							?>
							</div>
							<button id="enviar_inscripcion" type="submit" class="btn btn-primary float-right">
								Inscribirse
							</button>
						</div>
						
					</div> <!-- end row -->
				</form>
        	</div>
		</div>
	</div>
</div>