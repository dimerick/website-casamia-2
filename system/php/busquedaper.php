<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Busqueda</title>
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
  <li><a href="busqueda1.php">Busqueda</a> <span class="divider">/</span></li>
  <li class="active">Busqueda Personalizada</li>
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
		 if (isset($_POST['enviar'])) {

                require('conexion.php');

                function calcularEdad($fechaNac) {

                    $nuevaFecha = preg_split("[-]", $fechaNac);
                    //echo $nuevaFecha[2]."-".$nuevaFecha[1]."-".$nuevaFecha[0];
                    $dia = $nuevaFecha[2];
                    $mes = $nuevaFecha[1];
                    $ano = $nuevaFecha[0];

                    $ahora_ano = date("Y");
                    $ahora_mes = date("m");
                    $ahora_dia = date("d");

                    $edad = ($ahora_ano + 1900) - $ano;
                    if ($ahora_mes < ($mes - 1)) {
                        $edad--;
                    }
                    if ((($mes - 1) == $ahora_mes) && ($ahora_dia < $dia)) {
                        $edad--;
                    }
                    if ($edad > 1900) {
                        $edad -= 1900;
                    }
                    return $edad;
                }

                if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad";
                    $consulta = "SELECT * FROM usuarios";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional";
                    $grupoP = $_POST['grupo_poblacional'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por genero";
                    $genero = $_POST['genero'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por estrato";
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por barrio";
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    echo $barrio;
                    $consulta = "SELECT * FROM usuarios WHERE barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por comuna";
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad y grupo poblacional";
                    $grupoP = $_POST['grupo_poblacional'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad y genero";
                    $genero = $_POST['genero'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad y estrato";
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad y barrio";
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad y comuna";
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional y genero";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional y estrato";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional y barrio";
                    $grupoP = $_POST['grupo_poblacional'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por genero y estrato";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por genero y barrio";
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por genero y comuna";
                    $genero = $_POST['genero'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por estrato y barrio";
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por estrato y comuna";
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por barrio y comuna";
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional y genero";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional y estrato";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional y barrio";
                    $grupoP = $_POST['grupo_poblacional'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, genero y estrato";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, genero y barrio";
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, genero y comuna";
                    $genero = $_POST['genero'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, estrato y barrio";
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, estrato y comuna";
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, barrio y comuna";
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, genero y estrato";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, genero y barrio";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, genero y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, estrato y barrio";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, estrato y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, barrio y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por genero, estrato y barrio";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por genero, estrato y comuna";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por genero, barrio y comuna";
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por estrato, barrio y comuna";
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, genero y estrato";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, genero y barrio estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, genero y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, estrato y barrio";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, estrato y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, barrio y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, genero, estrato y barrio";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, genero, estrato y comuna";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, genero, barrio y comuna";
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, estrato, barrio y comuna";
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, genero, estrato y barrio";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, genero, estrato y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, genero, barrio y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, estrato, barrio y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por genero, estrato, barrio y comuna";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, genero, estrato, y barrio";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, genero, estrato, y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, genero, barrio, y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, grupo poblacional, estrato, barrio, y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, genero, estrato, barrio, y comuna";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por grupo poblacional, genero, estrato, barrio, y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Busqueda filtrada por edad, Grupo poblacional, genero, estrato, barrio, y comuna";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "No seleccionaste ningun item de busqueda";
                    //$consulta = "SELECT * FROM usuarios";
                }

                /*
                  Ejemplo clase
                  class Usuario{

                  public $id;
                  public $dia;
                  public $mes;
                  public $year;
                  public $pagadoA;
                  public $noDocumento;
                  public $valor;

                  function __construct($id, $dia, $mes, $year, $pagadoA, $noDocumento, $valor) {
                  $this->id = $id;
                  $this->dia = $dia;
                  $this->mes = $mes;
                  $this->year = $year;
                  $this->pagadoA = $pagadoA;
                  $this->noDocumento = $noDocumento;
                  $this->valor = $valor;
                  }

                  // Ésta es la función de comparación estática:

                  static function cmp_obj($a, $b) {
                  if ($a->dia == $b->dia) {
                  return 0;
                  }
                  return ($a->dia > $b->dia) ? +1 : -1;
                  }

                  }
                 */

				 /*Funcion para calcular la edad en base a la fecha de nacimiento
				 function calcularEdad($fechaNac){ 
    
    $nuevaFecha = preg_split("[-]", $fechaNac);
    //echo $nuevaFecha[2]."-".$nuevaFecha[1]."-".$nuevaFecha[0];
    $dia = $nuevaFecha[2];
    $mes = $nuevaFecha[1];
    $ano = $nuevaFecha[0];
    
    $ahora_ano = date("Y");
    $ahora_mes = date("m");
    $ahora_dia = date("d");
    
    $edad = ($ahora_ano + 1900)- $ano;
    if($ahora_mes < ($mes - 1)){
    $edad--;    
    }
    if((($mes - 1) == $ahora_mes) && ($ahora_dia < $dia)){
     $edad--;   
        
    }
    if($edad > 1900){
      $edad -= 1900;  
    }
    return $edad;

}
*/
echo '</br>';
echo '</br>';
                $result = mysqli_query($link, $consulta);
                $numResult = 0;
				
                if (isset($_POST['checkEdad'])) {
                    $edad1 = $_POST['edad1'];
                    $edad2 = $_POST['edad2'];
					
					

                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            
                          $edadCalculada = calcularEdad($row['fecha_nacimiento']);
                        if (($edadCalculada >= $edad1) && ($edadCalculada <= $edad2)) {
                            $numResult++;
                            echo "
	<table class=\"table table-bordered datUser table-hover table-condensed\">
  <tr>
    <th colspan=\"2\">".'<img src="fotosPerfil/'.$row['fileName'].'"></img>'."</th>
  </tr>
  <tr>
    <th>Nombre</th>
    <td>".$row['nombres']."</td>
  </tr>
  <tr>
    <th>Apellidos</th>
    <td>".$row['apellidos']."</td>
  </tr>
  <tr>
    <th>Genero</th>
    <td>";if($row['genero'] == 1){
	echo "Masculino";
	}
	else if($row['genero'] == 2){
	echo "Femenino";
	}
	echo "</td>
  </tr>
  <tr>
    <th>Fecha.Nac</th>
    <td>";
	$nuevaFecha = preg_split("[-]", $row['fecha_nacimiento']);
	echo $nuevaFecha[2]."-".$nuevaFecha[1]."-".$nuevaFecha[0];
	echo "</td>
  </tr>
  <tr>
    <th>Edad</th>
    <td>";
	$edad = calcularEdad($row['fecha_nacimiento']);
    echo $edad;
	echo "</td>
  </tr>
   <tr>
    <th>Tipo Doc</th>
    <td>";
	if($row['tipo_doc'] == 1){
	echo "C.C";
	}
	else if($row['tipo_doc'] == 2){
	echo "T.I";
	}
	else{
	echo "R.C";
	}
	echo "</td>
  </tr>
  <tr>
    <th>No. Doc</th>
    <td>".$row['no_documento']."</td>
  </tr>
  <tr>
    <th>Telefono</th>
    <td>".$row['telefono']."</td>
  </tr>
  <tr>
    <th>Celular</th>
    <td>".$row['celular']."</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>".$row['email']."</td>
  </tr>
  <tr>
    <th>Ciudad</th>
    <td>".$row['ciudad']."</td>
  </tr>
  <tr>
    <th>Barrio</th>
    <td>".$row['barrio']."</td>
  </tr>
  <tr>
    <th>Estrato</th>
    <td>".$row['estrato']."</td>
  </tr>
  <tr>
    <th>Comuna</th>
    <td>".$row['comuna']."</td>
  </tr>
  <tr>
    <th>Grupo Poblacional</th>
    <td>";
	if($row['grupo_poblacional'] == 1){
	
	echo "Ninguno";
	}
	else if($row['grupo_poblacional'] == 2){
	echo "Desplazado";
	}
	else if($row['grupo_poblacional'] == 3){
	echo "Madre cabeza de familia";
	}
	else if($row['grupo_poblacional'] == 4){
	echo "Afrodescendiente";
	}
	else if($row['grupo_poblacional'] == 5){
	echo "Discapacitado";
	}
	else if($row['grupo_poblacional'] == 6){
	echo "LGBTI";
	}
	else if($row['grupo_poblacional'] == 7){
	echo "Victima del conflicto urbano";
	}
	else if($row['grupo_poblacional'] == 8){
	echo "Adulto Mayor";
	}
	
	echo "</td>
  </tr>
  <tr>
    <th colspan=\"2\">".
	'<a href="eliminar2.php?id='.$row["id"].'">Eliminar | </a><a href="Actualizar2.php?id='.$row["id"].'">Actualizar</a>'.
	"</th>
  </tr>
</table>";
                        }   
                            
                     
                     
                    }
                } else {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $numResult++;
                        
                        echo "
	<table class=\"table table-bordered datUser table-hover table-condensed\">
  <tr>
    <th colspan=\"2\">".'<img src="fotosPerfil/'.$row['fileName'].'"></img>'."</th>
  </tr>
  <tr>
    <th>Nombre</th>
    <td>".$row['nombres']."</td>
  </tr>
  <tr>
    <th>Apellidos</th>
    <td>".$row['apellidos']."</td>
  </tr>
  <tr>
    <th>Genero</th>
    <td>";if($row['genero'] == 1){
	echo "Masculino";
	}
	else if($row['genero'] == 2){
	echo "Femenino";
	}
	echo "</td>
  </tr>
  <tr>
    <th>Fecha.Nac</th>
    <td>";
	$nuevaFecha = preg_split("[-]", $row['fecha_nacimiento']);
	echo $nuevaFecha[2]."-".$nuevaFecha[1]."-".$nuevaFecha[0];
	echo "</td>
  </tr>
  <tr>
    <th>Edad</th>
    <td>";
	$edad = calcularEdad($row['fecha_nacimiento']);
    echo $edad;
	echo "</td>
  </tr>
   <tr>
    <th>Tipo Doc</th>
    <td>";
	if($row['tipo_doc'] == 1){
	echo "C.C";
	}
	else if($row['tipo_doc'] == 2){
	echo "T.I";
	}
	else{
	echo "R.C";
	}
	echo "</td>
  </tr>
  <tr>
    <th>No. Doc</th>
    <td>".$row['no_documento']."</td>
  </tr>
  <tr>
    <th>Telefono</th>
    <td>".$row['telefono']."</td>
  </tr>
  <tr>
    <th>Celular</th>
    <td>".$row['celular']."</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>".$row['email']."</td>
  </tr>
  <tr>
    <th>Ciudad</th>
    <td>".$row['ciudad']."</td>
  </tr>
  <tr>
    <th>Barrio</th>
    <td>".$row['barrio']."</td>
  </tr>
  <tr>
    <th>Estrato</th>
    <td>".$row['estrato']."</td>
  </tr>
  <tr>
    <th>Comuna</th>
    <td>".$row['comuna']."</td>
  </tr>
  <tr>
    <th>Grupo Poblacional</th>
    <td>";
	if($row['grupo_poblacional'] == 1){
	
	echo "Ninguno";
	}
	else if($row['grupo_poblacional'] == 2){
	echo "Desplazado";
	}
	else if($row['grupo_poblacional'] == 3){
	echo "Madre cabeza de familia";
	}
	else if($row['grupo_poblacional'] == 4){
	echo "Afrodescendiente";
	}
	else if($row['grupo_poblacional'] == 5){
	echo "Discapacitado";
	}
	else if($row['grupo_poblacional'] == 6){
	echo "LGBTI";
	}
	else if($row['grupo_poblacional'] == 7){
	echo "Victima del conflicto urbano";
	}
	else if($row['grupo_poblacional'] == 8){
	echo "Adulto Mayor";
	}
	
	echo "</td>
  </tr>
  <tr>
    <th colspan=\"2\">".
	'<a href="eliminar2.php?id='.$row["id"].'">Eliminar | </a><a href="Actualizar2.php?id='.$row["id"].'">Actualizar</a>'.
	"</th>
  </tr>
</table>";   
                        
                    }
                }
                if($numResult == 0){
                    echo '</br><h1>'."La busqueda no arrojo resultados".'</h1>';
                    
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