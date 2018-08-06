	<?php	
    require('../system/php/conexion.php');
$consulta = "SELECT ruta_imagen, fecha, titulo, ruta_articulo FROM articulo ORDER BY fecha DESC";
$hoy = getdate();
$mesActual = $hoy["mon"];
$result = mysqli_query($link,$consulta);
$resultado = "[";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$fechaArt = explode("-",$row["fecha"]);
$linkArt = explode("/",$row["ruta_articulo"]);
$mesArt = $fechaArt[1];
if($mesArt < $mesActual-2){
break;
}else{
$resultado .= "{\"titulo\":"."\"".$row["titulo"]."\",";
$resultado .= "\"fecha\":"."\"".$row["fecha"]."\",";
$resultado .= "\"urlImg\":"."\"".$row["ruta_imagen"]."\",";
$resultado .= "\"urlArt\":"."\"".$linkArt[1]."\"},";
}
}
$long = strlen($resultado);
echo substr_replace($resultado, "]", $long-1, 1);
mysqli_close($link);
?>

