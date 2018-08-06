<?php
	
    require('conexion.php');
$idCurso = $_POST["idCurso"];

$consulta = "SELECT docente, fecha_inicio, asistencia FROM cursos WHERE id='$idCurso'";

$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$asistencia = $row["asistencia"];
$docente = $row["docente"];
$fechaInicio = $row["fecha_inicio"];

$numApariciones = substr_count($asistencia, "\"fecha\"");



$resultado = "{\"docente\":"."\"".$docente."\",";
$resultado .= "\"fechaInicio\":"."\"".$fechaInicio."\",";
$resultado .= "\"numSessions\":"."\"".$numApariciones."\"}";

echo $resultado;
mysqli_close($link);
?>

