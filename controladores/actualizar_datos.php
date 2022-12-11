<?php
include("conexion_bd.php");
session_start();
$id= $_SESSION["id"];
$iniciativa = 	$con->real_escape_string($_POST["camp_0"]);
$web = 			$con->real_escape_string($_POST["camp_1"]);
$mail =			$con->real_escape_string($_POST["camp_2"]);
$tel = 			$con->real_escape_string($_POST["camp_3"]);
$cont = 		$con->real_escape_string($_POST["camp_4"]);
$calle =		$con->real_escape_string($_POST["camp_5"]);
$pob= 			$con->real_escape_string($_POST["camp_6"]);
$desc= 			$con->real_escape_string($_POST["camp_d"]);



//si el correo es nuevo ==> nuevo recurso:
$actualizar= "UPDATE recursos SET nom_rec='$iniciativa', 
								web_rec = '$web' , 
								email_rec = '$mail', 
								tel_rec = '$tel', 
								cont_rec = '$cont', 
								desc_rec = '$desc' WHERE id_rec='$id'";
if($con->query($actualizar)){
	echo"
	<script>
		alert('Modificaciones realizadas correctamente.');
		window.location.href = '../vistas/recurso.php?rec=".$id."';
	</script>
	";
}else{
	echo"
	<script>
		alert('Error al modificar los datos. Pongase en contacto con el administrador.');
		window.location.href = '../vistas/recurso.php?rec=".$id."';
	</script>
	";
}

$con->close();




?>