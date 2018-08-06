<?php
require('conexion.php');

$idUser	 = $_POST["idUser"];
$idCurso = $_POST["idCurso"];

$consulta = "SELECT est_matriculados FROM cursos WHERE id = '$idCurso'";
$consulta2 = "SELECT est_desertores FROM cursos WHERE id = '$idCurso'";
$result = mysqli_query($link,$consulta);
$result2 = mysqli_query($link,$consulta2);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$retirados = $row2["est_desertores"];
if(strlen($retirados) == 0){
$retirados = "[";
}else{
$long = strlen($retirados);
$retirados = substr_replace($retirados, ",", $long-1, 1);
}
$matriculados = "[";
$estudiantes = json_decode($row["est_matriculados"]);

foreach($estudiantes as $est){
if($est->id != $idUser){
$matriculados .= "{\"id\"".":"."\"".$est->id."\"},";
}else{
$retirados .= "{\"id\"".":"."\"".$idUser."\"},";
}
}
$long = strlen($matriculados);
$matriculados = substr_replace($matriculados, "]", $long-1, 1);
$long = strlen($retirados);
$retirados = substr_replace($retirados, "]", $long-1, 1);

$consulta3 = "UPDATE cursos SET est_matriculados='$matriculados' WHERE id='$idCurso'";
$consulta4 = "UPDATE cursos SET est_desertores='$retirados' WHERE id='$idCurso'";

if(mysqli_query($link,$consulta3) && mysqli_query($link,$consulta4))
{
echo "Estudiante retirado Exitosamente";
}
else{
echo "Error al retirar el usuario";
}
mysqli_close($link);

?>