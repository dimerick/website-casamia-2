<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Confirmar Eliminar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
  
	<link rel="stylesheet" href="../css/mystyle.css">
	
		
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head>


<body>
    <section id="main">
		<div class="row-fluid">
		<div class="span2">
		</div>
		<div class="span8 contPrincipal">
		<div class="row-fluid">
		<div class="span2">
		<img src="../img/logo2.png">
		</div>
		<div class="span10" style="margin:0%;">
		<div class="row-fluid">
		<div class="span12 contbread">
		<ul class="breadcrumb pull-right">
  <!--
  <li><a href="#">Home</a> <span class="divider">/</span></li>-->
  <li><a href="../index.html">Servicios</a> <span class="divider">/</span></li>
  <li class="active">Eliminar Cargo</li>
</ul>
</div>
<div class="row-fluid">
<h3 class="titleServic">Eliminar Cargo</h3>
</div>
		
		</div>
		</div>
		</div>
			
        <div class="row-fluid contServices">
		<div class="span1">
		</div>
		<div class="span10">
		<!--Codigo PHP-->
		 <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('conexion.php');
$id = $_GET['id'];
$consulta = "SELECT * FROM cargos WHERE id = '$id'";

$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$fechaInicio = $row['fecha'];
$nombreCargo = $row['nombre_cargo'];
$id_area = $row['id_area'];
$id_encargado = $row['id_encargado'];
$funciones = $row['funciones'];
$id = $_GET['id'];
echo "<input type=\"hidden\" value=\"$id\" name=\"id\">";
echo "<input type=\"hidden\" value=\"$fechaInicio\" name=\"fechaInicio\">";
echo "<input type=\"hidden\" value=\"$nombreCargo\" name=\"nombreCargo\">";
echo "<input type=\"hidden\" value=\"$id_area\" name=\"id_area\">";
echo "<input type=\"hidden\" value=\"$id_encargado\" name=\"id_encargado\">";
echo "<input type=\"hidden\" value=\"$funciones\" name=\"funciones\">";
mysqli_free_result($result);

$consulta = "SELECT nombres, apellidos FROM usuarios WHERE id = '$id_encargado'";
$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nombres = $row["nombres"];
$apellidos = $row["apellidos"];
echo "<form action=\"eliminarCargo.php\" method=\"post\">";
echo "<input type=\"hidden\" value=\"$id\" name=\"id\">";
echo "<input type=\"hidden\" value=\"$fechaInicio\" name=\"fechaInicio\">";
echo "<input type=\"hidden\" value=\"$nombreCargo\" name=\"nombreCargo\">";
echo "<input type=\"hidden\" value=\"$id_area\" name=\"id_area\">";
echo "<input type=\"hidden\" value=\"$id_encargado\" name=\"id_encargado\">";
echo "<input type=\"hidden\" value=\"$funciones\" name=\"funciones\">";

echo "Realmente desea retirar del cargo a ".$nombres." ".$apellidos."</br>";
echo "</br><input type=\"submit\" value=\"Aceptar\">			
</form>
<form action=\"../index.html\" method=\"post\">
<input type=\"submit\" value=\"Cancelar\">			
</form>";
?>
		
		<!--Codigo PHP-->
		
</div>
<div class="span1">
		</div>	
	 </div>

               
  </div>
  <div class="span2">
  </div>
  </div>
</section>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>   

</body>
</html>