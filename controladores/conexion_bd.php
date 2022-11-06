<?php 


$con = new mysqli("localhost","spg_usr","1234-qWer.","mapeo_osm");


if ($con -> connect_errno){
    die("Error de conexión: " . $con->mysqli_connect_errno() . ", " . $con->mysqli_connect_error()); 
}
// else{
//     echo "La conexión tuvo éxito";
// }




// mysqli_close($con);
// $con->close();

?>