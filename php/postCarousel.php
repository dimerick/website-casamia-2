	<?php	
    require('../system/php/conexion.php');
$consulta = "SELECT ruta_imagen, fecha, titulo, descripcion, ruta_articulo FROM articulo ORDER BY fecha DESC";
$hoy = getdate();
$mesActual = $hoy["mon"];
$result = mysqli_query($link,$consulta);
$resultado = "[";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$fechaArt = explode("-",$row["fecha"]);
$rutaImg = "articulos/".$row["ruta_imagen"];
$mesArt = $fechaArt[1];
if($mesArt < $mesActual-1){
break;
}else{
$resultado .= "{\"titulo\":"."\"".$row["titulo"]."\",";
$resultado .= "\"descripcion\":"."\"".$row["descripcion"]."\",";
$resultado .= "\"fecha\":"."\"".$row["fecha"]."\",";
$resultado .= "\"urlImg\":"."\"".$rutaImg."\",";
$resultado .= "\"urlArt\":"."\"".$row["ruta_articulo"]."\"},";
}
}
$long = strlen($resultado);
echo substr_replace($resultado, "]", $long-1, 1);
mysqli_close($link);
?>

