<?php

include("conexion_bd.php");  

$consultar_cat ="SELECT * from categorias";
$categorias= $con->query($consultar_cat);



 foreach($categorias as $row){
    $cat = stripslashes($row['nom_cat']);
    echo "<label>$cat:</label><br>";

    $id= $row["id_cat"];
    $consultar_subcat ="SELECT * from subcategorias where id_cat='$id'";
	$subcategorias= $con->query($consultar_subcat);

	foreach($subcategorias as $row2){

	   $subcat = stripslashes($row2['nom_subcat']);
	   $subid  = stripslashes($row2['id_subcat']);


		echo'
		<input class="form-check-input" type="checkbox" name="'.$subid.'" value="'.$subcat.'">
		  	<label class="form-check-label">'.$subcat.'</label><br>
		  ';
	}

	echo"<br>";
}


$con->close();
?>