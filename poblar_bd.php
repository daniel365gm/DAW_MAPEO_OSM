<?php

include("controladores/conexion_bd.php");

$nombres= ["Construcciones Salomon", "Techos Solera"];
$mail = ["salomon@correo.es", "solera@correo.es"];
$tel = ["678908978", "678604030"];
$cont =["Maria", "javier"];
$desc="Texto de descripcion de la actividad...";

for($i=0; $i< count($nombres); $i++){
	$sql = "INSERT INTO recursos (nom_rec, web_rec, email_rec, pass_rec, tel_rec, cont_rec, desc_rec ,estado_rec) 
					VALUES ('$nombres[$i]','www.$nombres[$i].com','$mail[$i]','$mail[$i]', '$tel[$i]','$cont[$i]','$desc', 0)";
	$con->query($sql);

	$lat = 42.2 + ($i/10);
	$lon = -7.8 + ($i/10);
	$last_id = $con->insert_id;
	$ins_dir ="INSERT INTO direcciones (id_rec, direccion_dir, num_dir, poblacion_dir, lat_dir, lon_dir) 
									VALUES ('$last_id', 'calle_prueba', '22', 'coruña', '$lat', '$lon')";
	$con->query($ins_dir);							
}
$con->close()

?>