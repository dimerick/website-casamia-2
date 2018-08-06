
	<?php
	
    require('conexion.php');
$curso = $_POST['idCurso'];
$consulta = "SELECT est_matriculados, asistencia FROM cursos WHERE id = $curso";
$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$asistencia = $row["asistencia"];
$numSession = json_decode($asistencia);
$numSession = count($numSession);
$resultado = "[";
$estMatric = json_decode($row["est_matriculados"]);

foreach($estMatric as $estudent){
		$idEst = $estudent->id;
		$cadena = "{\"id\":\"".$idEst."\"}";
		$numAsistencias = substr_count($asistencia, $cadena);
		$faltas = $numSession-$numAsistencias;
		$numAsistencias;
		$porcPart = 0;
		if($numSession != 0){
		$porcPart = ($numAsistencias*100)/$numSession;
		}
		$porcPart = round($porcPart, 2, PHP_ROUND_HALF_UP);
		$consulta2 = "SELECT nombres, apellidos FROM usuarios WHERE id = '$idEst'";
		$result2 = mysqli_query($link,$consulta2);
		$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$resultado .= "{\"id\"".":"."\"".$idEst."\",";
		$resultado .= "\"nombre\"".":"."\"".$row2["nombres"]." ".$row2["apellidos"]."\",";
		$resultado .= "\"asistencia\"".":"."\"".$numAsistencias."\",";
		$resultado .= "\"faltas\"".":"."\"".$faltas."\",";
		$resultado .= "\"porcenPart\"".":"."\"".$porcPart."%\"},";
		}
		$long = strlen($resultado);
		echo substr_replace($resultado, "]", $long-1, 1);
		
mysqli_close($link);
?>

