
<?php

session_start();

include("conexion_bd.php");  

$id_com= $_POST["id"];

$sql_del ="DELETE FROM comunicaciones WHERE id_com='$id_com'";

$con->query($sql_del);


$con->close();

?>