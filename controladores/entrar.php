<?php

// $con = new mysqli("localhost","spg_usr","1234-qWer.","espiga2");
include("conexion_bd.php");  

$mail = $con->real_escape_string($_POST["imail"]);
$pass = $con->real_escape_string($_POST["ipass"]);


$sql_comprobar = "SELECT * from recursos  WHERE email_rec='$mail'";

$existe = $con->query($sql_comprobar);

$datos=$existe->fetch_array();

// print_r($datos);
// echo"<br><br>";

$bd_mail = $datos["email_rec"];
$bd_pass = $datos["pass_rec"];

// echo"
// 	$mail<br>
// 	$pass<br>
// 	$bd_mail<br>
// 	$bd_pass<br>
// 	<br><br>
// ";



if( $mail != $bd_mail   ) {

	echo "
		<script>
		alert('Ese correo no existe');
		window.location.href='../vistas/index.php';
		</script>
	";



}else{


	if( $pass == $bd_pass ){


		session_start();
		$_SESSION["id"] = $datos["id_rec"];
		$_SESSION["nombre"] = $datos["nom_rec"];

	echo "
		<script>
		alert('Bienvenido: ".$datos['nom_rec']."');
		window.location.href='../vistas/index.php?rec=".$_SESSION['id']."';
		</script>
	";

	}else{
	echo "
		<script>
		alert('Correo o contraseña incorrecta');
		window.location.href='../vistas/index.php';
		</script>
	";

	}

}	



$con->close();
?>