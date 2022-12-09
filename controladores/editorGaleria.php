<?php


	// $datos= json_decode($_POST["envio"]);

	// $nombre=	$datos[0];
	// $apellido=	$datos[1];


	// session_start();
	//$id= $_SESSION["id"];
	$id="6";







	$nombre_foto =$_FILES["fichero"]["name"];
	$archi =$_FILES["fichero"]["tmp_name"];

// echo "<img src='$archi'>";



	// $cosa =$_FILES["archivo"]["name"];
	// print_r( $nombre);

	// // $archi =$_FILES["foto"]["tmp_name"];
	// // echo $archi;
	// // echo "<img src='$archi'>";

	if (is_dir("../usuarios/$id/galeria")) {

		
		$destino= "../usuarios/$id/galeria/$nombre_foto";
		@move_uploaded_file($_FILES["fichero"]["tmp_name"], $destino);

		// echo "guardado<br>";
		// echo $archi;
		
	}else{
		mkdir("../usuarios/$id/galeria", 0777,true);
		$destino= "../usuarios/$id/galeria/$nombre_foto";
		@move_uploaded_file($_FILES["fichero"]["tmp_name"], $destino);
		// echo "no guardado<br>";
		// echo $archi;
	}
	
	



	// // echo "guardado";

?>