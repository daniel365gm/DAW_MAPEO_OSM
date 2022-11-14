
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-repeat: no-repeat;
			background-image: url("../vista/img/espiga_fondo1.jpg");
			background-size:100% 100vh;
		}
	</style>
</head>
<body>



<?php


include("conexion_bd.php");  

$iniciativa = 	$con->real_escape_string($_POST["inic"]);
$web = 			$con->real_escape_string($_POST["web"]);
$mail =			$con->real_escape_string($_POST["mail"]);
$pass =			$con->real_escape_string($_POST["pass"]);
$tel = 			$con->real_escape_string($_POST["tel"]);
$cont = 		$con->real_escape_string($_POST["nombre"]);
$calle =		$con->real_escape_string($_POST["calle"]);
$num =			$con->real_escape_string($_POST["num"]);
$pob= 			$con->real_escape_string($_POST["pob"]);
$desc= 			$con->real_escape_string($_POST["desc"]);

$lat= $_POST["lat"];
$lon= $_POST["lon"];


$consultar_email ="SELECT email_rec from recursos where email_rec='$mail'";
$email_existe= $con->query($consultar_email);


echo" $pass"; 

if($email_existe->fetch_array()){
	echo"
	<script>
		alert('Ese correo ya existe');
		history.back();
	</script>
	";
}else{



	$insert= "INSERT INTO recursos (tipo_rec, web_rec, email_rec, pass_rec, tel_rec, cont_rec, desc_rec ) 
					VALUES ('$iniciativa','$web','$mail','$pass', '$tel','$cont','$desc')";
	

	if($con->query($insert)){
		echo "insertado1";
		$last_id = $con->insert_id;


		// insertar categorias
		for($i=0; $i<20 ; $i++){
			if( isset($_POST["$i"])){
				// echo $_POST["$i"];
				$ins_cat ="INSERT INTO detalle_recursos (id_rec,id_subcat) VALUES ('$last_id','$i')";
				$con->query($ins_cat);
			}
		}


		
		//fin categorias

		$ins_dir ="INSERT INTO direcciones (id_rec, direccion_dir, num_dir, poblacion_dir, lat_dir, lon_dir) 
									VALUES ('$last_id', '$calle', '$num', '$pob', '$lat', '$lon')";
		
		if($con->query($ins_dir)){
			echo"insertado2";
			echo"
				<script>
					alert('Usuario registrado! Ya puedes acceder a tu cuenta desde el icono de la esquina superior derecha. La cuenta debera ser validada por un administrador.');
					window.location.href = '../vistas/index.php';
				</script>
			";




		}else{
			echo"error2";
		}

	}else{
		echo "<br>erorr1";
	}
}


$con->close();

			// header("location: ../vista/index.php");


?>







</body>
</html>

