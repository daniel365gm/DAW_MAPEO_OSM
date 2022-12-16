<!doctype html>
<html lang="es">
<head>
<?php
	include("head.html");
?>
<!-- llamadas a estilos o js epecificos de la ventana en el head -->
	<link rel="stylesheet" type="text/css" href="./css/contacto.css">
	<!-- <script src="../controladores/control_mapa_class.js"></script> -->

	
</head>
<!--  -->
<?php
	include("barra_navegacion.php");
?>

<div class="container box">

	<h5>Si tienes alguna duda, sugerencia o has encontrado algún error rellena el siguiente formulario:</h5>
	<form action="../controladores/insertar_comunicacion.php" method="POST">
	<div class="form-group">
	    <input type="text" 
    		class="form-control" 
    		id="" 
    		name="nombre"
    		placeholder="nombre" required>
	    <input type="text" 
    		class="form-control" 	    		
    		id="inputEmail" 
    		name="mail"
    		aria-describedby="emailHelp" 
    		pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"
    		title="Correo con formato xxxx@xxxxx.xxx"
    		placeholder="Correo electronico" required><br>
    	<textarea id="idesc" name ="comentario" class="form-control" placeholder="comentario/sugerencia"></textarea>
	</div>
	<center><input type="submit" value="enviar"></center>
	</form>
</div>





<?php
include("end_body.html");
?>



</html>