
	<?php
	
    require('conexion.php');
$numSession = $_POST['idSession'];
$programa = $_POST['idCurso'];
$consulta = "SELECT asistencia FROM cursos WHERE id = $programa";
$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$asistencia = $row["asistencia"];
$asistencia = json_decode($asistencia);
$resultado = "{\"fecha\":";
$num = 0;
foreach($asistencia as $session){
if($num == $numSession-1){
$resultado .= "\"".$session->fecha."\",\"estudiantes\":[";
$estudiantes = $session->estudiantes;
$size = count($estudiantes);
if($size == 0){
$resultado .= ",";
}
for($j=0;$j<$size;$j++){
$idEst = $estudiantes[$j]->id;
$consulta2 = "SELECT nombres, apellidos FROM usuarios WHERE id = '$idEst'";
$result2 = mysqli_query($link,$consulta2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

$resultado .= "{\"id\":\"".$idEst."\",";
$resultado .= "\"nombre\":\"".$row2["nombres"].$row2["apellidos"]."\"},";
}
}
$num++;
}
$long = strlen($resultado);
$resultado = substr_replace($resultado, "]", $long-1, 1);
$resultado .=",\"numSession\":\"".$num++."\"";
$resultado .= "}";
echo $resultado;
mysqli_free_result($result); 
mysqli_close($link);


	?>
