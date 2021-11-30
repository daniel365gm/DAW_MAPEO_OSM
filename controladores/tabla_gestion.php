<?php

include("conexion_bd.php");
$lista = $con->query("SELECT * FROM recursos");

while($row= $lista->fetch_array()){


	echo'

	<tr>
		<td><img height="50vh" width="50px" src="../usuarios/'.$row["id_rec"].'/logo.png" id="'.$row["id_rec"].'" onclick="mostrar_recurso(this.id)" value="'.$row["nom_rec"].'" ></img>
		</td>
		<td><label>'.$row["tipo_rec"].'</label></td>
		<td><label>'.$row["estado_rec"].'</label></td>
	</tr>


	';
}




$con->close();

?>