<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Contacto</title>
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
  <li><a href="crearCargo.php">Crear Cargo</a> <span class="divider">/</span></li>
  <li class="active">Estado Creacion Cargo</li>
</ul>
</div>
<div class="row-fluid">
<h3 class="titleServic"></h3>
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

if (isset($_POST['enviar'])){
   
require('conexion.php');
$cargo = $_POST['cargo'];
$id_area = $_POST['area'];
$id_encargado = $_POST['encargado'];
$funciones = $_POST['funciones'];

$consulta = "INSERT INTO cargos(nombre_cargo, id_area, id_encargado, funciones) 
				VALUES ('$cargo', '$id_area', '$id_encargado', '$funciones')";

        if(mysqli_query($link,$consulta))
{
echo "<center>Cargo creado exitosamente</center>";
}
else{
echo "<center>Error en la consulta</center>";
}
  mysqli_close($link);      
} 

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