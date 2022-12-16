

<?php

session_start();

include("conexion_bd.php");  

$accion= $_POST["accion"];
$id= $_POST["id"];
$sql="";
$mensage="";
$sql_nombre = "SELECT nom_rec FROM recursos WHERE id_rec='$id'";
$consulta = $con->query($sql_nombre);
$nombre = $consulta->fetch_array();

if ($accion == "gst_del"){
	$sql ="DELETE FROM recursos WHERE id_rec='$id'";
	$mensaje="Borrado del usuario -".$nombre['nom_rec']."-";

	if($con->query($sql)){
		$sql_del_dir ="DELETE FROM direcciones WHERE id_rec='$id'";
		$con->query($sql_del_dir);

		//eliminacion de la carpeta del usuario
		$dir="../usuarios/$id";
		function eliminar_carpeta($dir){
		    foreach(glob($dir . '/*') as $file) {
		        if(is_dir($file))
		            eliminar_carpeta($file);
		        else
		            unlink($file);
		    }
		    rmdir($dir);
		}
		eliminar_carpeta($dir);
		echo $mensaje;
	}else{
		echo"Error en la operacion";
	}
}

if($accion == "gst_act"){
	$sql = "UPDATE recursos SET estado_rec = '1' WHERE id_rec='$id'"; 

	$mensaje="Usuario [".$nombre['nom_rec']."] ha sido activado.";

	if($con->query($sql)){
		echo $mensaje;
		
	}else{
		echo"Error en la operacion";
	}

}




$con->close();


?>