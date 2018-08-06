
	<?php
	
    require('conexion.php');
$curso = $_POST['idCurso'];
$consulta = "SELECT est_desertores FROM cursos WHERE id = '$curso'";
$result = mysqli_query($link,$consulta);
$resultado = "[";
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$estRetirados = json_decode($row["est_desertores"]);

foreach($estRetirados as $estudent){
		$idEst = $estudent->id;
		$consulta2 = "SELECT nombres, apellidos FROM usuarios WHERE id = '$idEst'";
		$result2 = mysqli_query($link,$consulta2);
		$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$resultado .= "{\"id\"".":"."\"".$idEst."\",";
		$resultado .= "\"nombre\"".":"."\"".$row2["nombres"]." ".$row2["apellidos"]."\"},";
		}
		$long = strlen($resultado);
		echo substr_replace($resultado, "]", $long-1, 1);

mysqli_close($link);
?>

