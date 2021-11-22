<?php

// $con = new mysqli("localhost","spg_usr","1234-qWer.","espiga2");
include("conexion_bd.php");  

$mail = $con->real_escape_string($_POST["imail"]);
$pass = $con->real_escape_string($_POST["ipass"]);


$sql_comprobar = "SELECT email_rec, pass_rec, id_rec from recursos  WHERE email_rec='$mail'";

$existe = $con->query($sql_comprobar);

$datos=$existe->fetch_array();

print_r($datos);
echo"<br><br>";

$bd_mail = $datos[0];
$bd_pass = $datos[1];

echo"
	$mail<br>
	$pass<br>
	$bd_mail<br>
	$bd_pass<br>
	<br><br>
";



if( $mail != $bd_mail   ) {
	// $hash = md5( rand(0,10000) );
	// $insert="INSERT INTO recursos(email_rec,pass_rec,estado_rec, hash_rec) VALUES('$mail','$pass',1, '$hash')";




	echo "
		<script>
		alert('Ese correo no existe');
		window.location.href='../vistas/index.php';
		</script>
	";



	// if($con->query($insert)){
	// 	echo "insertado";
	// 	$last_id = $con->insert_id;
	// }else{
	// 	echo "<br>erorr";
	// }


	// //---------------------mandar correo
	// $para = $mail;
	// $motivo = "Espiga | correo de verificacion";
	// $mensaje= "		
	// ----------------------
	// Bienvenido a espiga
	// ---------------------

	// Pincha en el siguiente enlace 
	// para activar tu cuenta:

	// -------------------------
	// 	<a link='http://www.espiga.com/validar.php?hash=".$hash."'>VALIDAR</a>
	// --------------------------------------

	// ";
	// $cabeceras = 'From:noreply@yespiga.com' . "\r\n";

	// mail($para, $motivo, $mensaje, $cabeceras);
	//revisar y configurar gestor correo!!

	//---------------------mandar correo

}else{


	if( $pass == $bd_pass ){


		session_start();
		$_SESSION["id"] = $datos[2];

	echo "
		<script>
		alert('Bienvenido ".$_SESSION['id']."');
		window.location.href='../vistas/index.php';
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