	<?php
	
    require('conexion.php');

$consulta = "SELECT id, nombre_curso, programa_pertenece FROM cursos WHERE activo=1";

$result = mysqli_query($link,$consulta);

$resultado = "[";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$programa = $row["programa_pertenece"];
$consulta2 = "SELECT nombre FROM programas WHERE id='$programa'";
$result2 = mysqli_query($link,$consulta2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$nomcurso = $row2["nombre"]." ".$row["nombre_curso"];
$resultado .= "{\"id\"".":"."\"".$row["id"]."\",";
$resultado .= "\"nomCurso\"".":"."\"".$nomcurso."\"},";
}
$long = strlen($resultado);
echo substr_replace($resultado, "]", $long-1, 1);
mysqli_close($link);
?>

