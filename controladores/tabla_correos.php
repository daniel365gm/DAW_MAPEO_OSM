
<?php

include("conexion_bd.php");
$lista = $con->query("SELECT * FROM comunicaciones");

while($row= $lista->fetch_array()){


	echo'

	<tr>
		<td><label>'.$row["nombre_com"].'</label></td>
		<td><label>'.$row["email_com"].'</label></td>
		<td><textarea style="resize:none;border:none" disabled>'.$row["texto_com"].'</textarea></td>
		<td>
			<a href=""><button id="btn_eliminar" class="btn-danger" onclick="eliminar_com('.$row["id_com"].')">eliminar</button></a>
		</td>
	</tr>


	';
}




$con->close();

?>