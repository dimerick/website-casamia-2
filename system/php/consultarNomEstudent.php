	<?php
	
    require('conexion.php');
$idUser = $_POST['idUser'];
$consulta = "SELECT id, nombres, apellidos FROM usuarios WHERE id = '$idUser'";
$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$nombre = $row["nombres"].$row["apellidos"];
echo $nombre;

mysqli_close($link);

?>
