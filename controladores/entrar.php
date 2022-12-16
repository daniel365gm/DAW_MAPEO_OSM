<?php

include("conexion_bd.php");  

$mail = $con->real_escape_string($_POST["imail"]);
$pass = $con->real_escape_string($_POST["ipass"]);


$consulta_usu = $con->query("SELECT * from recursos  WHERE email_rec='$mail'");
$usuario=$consulta_usu->fetch_array();

$usu_mail = $usuario["email_rec"];
$usu_pass = $usuario["pass_rec"];


if( $mail != $usu_mail ) {
	$consulta_admin = $con->query("SELECT * from administradores  WHERE email_admin='$mail'");
	$admin = $consulta_admin->fetch_array();
	$adm_mail = $admin["email_admin"];
	$adm_pass = $admin["password_admin"];
	
	if( $mail != $adm_mail ) {
		echo "
			<script>
			alert('Ese usuario no existe');
			window.location.href='../vistas/index.php';
			</script>
		";
	}else{
		if( $pass == $adm_pass ){
			session_start();
			$_SESSION["id_adm"] = $admin["id_admin"];
			$_SESSION["nombre_adm"] = $admin["nombre_admin"];

			echo "
				<script>
				alert('Bienvenido administrador: ".$admin['nombre_admin']."');
				window.location.href='../vistas/index.php?';
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

}else{

	if( $pass == $usu_pass ){

		session_start();
		$_SESSION["id"] = $usuario["id_rec"];
		$_SESSION["nombre"] = $usuario["nom_rec"];

	echo "
		<script>
		alert('Bienvenido: ".$usuario['nom_rec']."');
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