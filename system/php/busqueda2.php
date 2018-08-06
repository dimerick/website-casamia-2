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
  <li><a href="busqueda1.php">Usuarios</a> <span class="divider">/</span></li>
  <li class="active">Datos Usuario</li>
</ul>
</div>
<div class="row-fluid">
<h3 class="titleServic">Busqueda Individual</h3>
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

	$id = $_POST['usuario'];
	$consulta = "SELECT * FROM usuarios WHERE id = '$id'";
	$result = mysqli_query($link,$consulta);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
	echo "
	<table class=\"table table-bordered table-hover table-condensed\">
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
	'<a href="eliminar2.php?id='.$row["id"].'">Eliminar | </a><a href="actualizar2.php?id='.$row["id"].'">Actualizar</a>'.
	"</th>
  </tr>
</table>";
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