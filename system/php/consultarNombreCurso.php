<?php
	
    require('conexion.php');
$programa = $_POST['programa'];
$consulta = "SELECT id FROM cursos WHERE programa_pertenece = '$programa'";
$result = mysqli_query($link,$consulta);
$num = 0;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$num++;
}
$num++;
$year = date('Y');
echo $year."_".$num;

mysqli_free_result($result); 
mysqli_close($link);

?>
