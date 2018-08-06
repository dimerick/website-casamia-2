	<?php
	
    require('conexion.php');

$consulta = "SELECT id, nombres, apellidos FROM usuarios";

$result = mysqli_query($link,$consulta);

$resultado = "[";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$resultado .= "{\"id\":"."\"".$row["id"]."\",";
$resultado .= "\"nombre\":"."\"".$row["apellidos"]." ".$row["nombres"]."\"},";
}
$long = strlen($resultado);
echo substr_replace($resultado, "]", $long-1, 1);
mysqli_close($link);
?>

