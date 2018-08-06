<?php

   
require('conexion.php');

$idCurso = $_POST['idCurso'];
$session = $_POST['session'];

$consulta = "SELECT asistencia FROM cursos WHERE id = '$idCurso'";
$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$sesionesAnt = $row["asistencia"];
$newSession = "";
if(strlen($sesionesAnt) == 0){
$newSession .= "[".$session."]";
}else{
$long = strlen($sesionesAnt);
$sesionesAnt = substr_replace($sesionesAnt, ",", $long-1, 1);
$newSession .= $sesionesAnt.$session."]";

}

$consulta2 = "INSERT INTO cursos(asistencia) VALUES ('$newSession')";
$consulta2 = "UPDATE cursos SET asistencia='$newSession' WHERE id='$idCurso'";

if(mysqli_query($link,$consulta2))
{
echo "Clase registrada Exitosamente";
}
else{
echo "Error al registrar la clase";
}

mysqli_close($link);

?>