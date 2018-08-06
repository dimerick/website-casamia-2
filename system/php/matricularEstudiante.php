<?php

   
require('conexion.php');

$idCurso = $_POST['idCurso'];
$usuario = $_POST['usuario'];

//$idCurso = 11;
//$usuario = 5;

$consulta = "SELECT est_matriculados, est_desertores FROM cursos WHERE id = '$idCurso'";
$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$estudianteAnt = $row["est_matriculados"];
$desertores = $row["est_desertores"];
$cadena = "\"id\":\"".$usuario."\"";
$numApariciones = substr_count($estudianteAnt, $cadena);
$numApariciones2 = substr_count($desertores, $cadena);
if($numApariciones == 0 && $numApariciones2 == 0){
if(strlen($estudianteAnt) == 0){
$estudianteAnt = "[{\"id\":\"".$usuario."\"}]";
}else{
$long = strlen($estudianteAnt);
$estudianteAnt = substr_replace($estudianteAnt, ",", $long-1, 1);
$estudianteAnt .= "{\"id\":\"".$usuario."\"}]";
}

$consulta2 = "UPDATE cursos SET est_matriculados = '$estudianteAnt' WHERE id = '$idCurso'";
if(mysqli_query($link,$consulta2))
{
echo "Estudiante registrado exitosamente";
}
else{
echo "Error al matricular estudiante";
}
}else if($numApariciones > 0 && $numApariciones2 == 0){
echo "El estudiante ya se encuentra matriculado";
}else if($numApariciones == 0 && $numApariciones2 > 0){
echo "El estudiante ya fue retirado del curso y no se permite su reingreso";
}

mysqli_close($link);

?>