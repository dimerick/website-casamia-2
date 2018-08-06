	<?php
	require('conexion.php');

$consulta = "SELECT cedula, nombre, apellido FROM autor";
$result = mysqli_query($link,$consulta);


$resultado = "[";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$nombreCompl = $row["nombre"] ." ".$row["apellido"];
$resultado .= "{\"id\"".":"."\"".$row["cedula"]."\",";
$resultado .= "\"nombre\"".":"."\"".$nombreCompl."\"},";
}
$long = strlen($resultado);
echo substr_replace($resultado, "]", $long-1, 1);
mysqli_close($link);
?>

