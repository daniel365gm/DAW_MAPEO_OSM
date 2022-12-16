<?php

session_start();
include("conexion_bd.php");

$nombre = $_POST["nombre"];
$mail	= $_POST["mail"];
$comentario	= $_POST["comentario"];

$sql_com ="INSERT INTO comunicaciones (nombre_com, email_com, texto_com) VALUES ('$nombre','$mail','$comentario')";

$con->query($sql_com);


echo"
	<script>
		alert('Gracias por su comentario. Responderemos en la maxima brevedad.');
		window.location.href = '../vistas/index.php';
	</script>
	";

$con->close();

?>