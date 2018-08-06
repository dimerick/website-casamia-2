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

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/sl-slide.css">
	<link rel="stylesheet" href="../../css/mystyle.css">
	<link rel="stylesheet" href="../../css/jquery.Jcrop.css">    
	<link href="../../lightbox.css" rel="stylesheet"/>
	<script src="../../js/jquery.Jcrop.min.js"></script>
    <script src="../../js/registroUsuarios.js"></script>
    <script src="../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="../../js/jquery-1.11.0.min.js"></script>
	<script src="../../js/lightbox.min.js"></script>
    <script src="../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <script src="../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head>


<body>

  <!--Header-->
    <header class="navbar navbar-fixed-top">
	<div id="MyHeader">
	<h1>¡Lo Efectivo es lo Afectivo!</h1>
	<div id="logo0">
	<a id="logo" class="pull-left" href="index.html"></a>
	</div>
     </div>   
		<div class="navbar-inner">
		
            <div class="container">			
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <!--Social-->	
                <div class="span6">
                <ul class="social">
                    <li><a href="https://facebook.com/Corp.CasaMia"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://twitter.com/corpcasaMia"><i class="icon-twitter"></i></a></li>                         
                    <li><a href="https://youtube.com/channel/UC2KfvGBcqS02qyf9fSLJc7g"><i class="icon-youtube"></i></a></li>                                      
                </ul>
            </div>
			<!--Social-->
                <!--nav-collapse -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li><a href="../index.html">Inicio</a></li>
                        <li><a href="../quienes-somos.html">Quienes Somos</a></li>
                        <li><a href="../programas.html">Programas</a></li>
                        <li><a href="../index.html">Servicios</a></li>
                        <!--
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="career.html">Career</a></li>
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="registration.html">Registration</a></li>
                                <li class="divider"></li>
                                <li><a href="privacy.html">Privacy Policy</a></li>
                                <li><a href="terms.html">Terms of Use</a></li>
                            </ul>
                        </li>
						-->
                        <li><a href="../blog.html">Blog</a></li> 
                        <li class="active"><a href="contacto.php">Contacto</a></li>
                        <!--
						<li class="login">
                            <a href="admin/services.html"><i class="fa fa-lock"></i></a>
                        </li>
						-->
                    </ul>        
                </div>
				<!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->

    <section id="contact-page" class="container" style="margin-top: 5%;">
	<div class="row-fluid">
		<div class="span8">
		</div>
		<div class="span4">
		<ul class="breadcrumb">
  
  <li><a href="../index.html">Servicios</a> <span class="divider">/</span></li>
  <li><a href="Busqueda1.php">Busqueda</a> <span class="divider">/</span></li>
  <li class="active">Usuario</li>
</ul>
		</div>
		</div>
	<div class="row-fluid" style="background:#fff";>
		<div class="span1">
		</div>
		<div class="span11">
		<div class="row-fluid">
		<div class="span8">
	<form role="form" method="post">
  <div class="form-group">
	<?php

/*FUNCION QUE ME CONVIERTE UNA CONSULTA SQL A FORMATO JSON*/

/*
function connectDB(){
 
   $conexion = mysqli_connect("localhost", "root", "", "casamia");
    if($conexion){
        echo 'La conexión de la base de datos se ha hecho satisfactoriamente';
    }else{
        echo 'Ha sucedido un error inesperado en la conexión de la base de datos';
    }   
    return $conexion;
}

function disconnectDB($conexion){
 
    $close = mysqli_close($conexion);
 
    if($close){
        echo 'La desconexión de la base de datos se ha hecho satisfactoriamente
';
    }else{
        echo 'Ha sucedido un error inesperado en la desconexión de la base de datos
';
    }   
 
    return $close;
}

function getArraySQL($sql){
    //Creamos la conexión con la función anterior
    $conexion = connectDB();
 
    //generamos la consulta
 
        mysqli_set_charset($conexion); //formato de datos utf8
 
    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa
 
    $rawdata = array(); //creamos un array
 
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;
 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $rawdata[$i] = $row;
        $i++;
    }
 
    disconnectDB($conexion); //desconectamos la base de datos
 
    return $rawdata; //devolvemos el array
}
$consulta = "SELECT * FROM cargos";
$myArray = getArraySQL($consulta);
$cargo = json_encode($myArray);
*/
/*FUNCION QUE ME CONVIERTE UNA CONSULTA SQL A FORMATO JSON*/


	
    $link = mysqli_connect("localhost", "root", "", "casamia");

/* verificar la conexión */
   if (mysqli_connect_errno()){
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

/*Clase empleado, que me permite almacenar los datos basicos de un empleado de la corporacion casa mia*/
class Empleado{
var $id;
var $nombres;
var $apellidos;
var $genero;
var $edad;
var $acudiente;
var $tipo_doc;
var $no_documento;
var $telefono;
var $celular;
var $email;
var $ciudad;
var $barrio;
var $estrato;
var $comuna;
var $grupo_poblacional;
var $url_foto;
var $fecha_ingreso;
var $cargo;
var $id_area;
var $funciones;

function __construct($id, $nombres, $apellidos, $genero, $edad, $tipo_doc, $no_documento, $telefono, $celular, $email, $ciudad, $barrio, $estrato, $comuna, 
$grupo_poblacional, $url_foto, $fecha_ingreso, $cargo, $id_area, $funciones){
$this->id = $id;
$this->nombres = $nombres;
$this->apellidos = $apellidos;
$this->genero = $genero;
$this->edad = $edad;
$this->tipo_doc = $tipo_doc;
$this->no_documento = $no_documento;
$this->telefono = $telefono;
$this->celular = $celular;
$this->email = $email;
$this->ciudad = $ciudad;
$this->barrio = $barrio;
$this->estrato = $estrato;
$this->comuna = $comuna;
$this->grupo_poblacional = $grupo_poblacional;
$this->url_foto = $url_foto;
$this->fecha_ingreso = $fecha_ingreso;
$this->cargo = $cargo;
$this->id_area = $id_area;
$this->funciones = $funciones;
}
}

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

/*
Completa los campos faltantes del objeto empleado, es decir los datos personales
*/
function completarDatos($link, $empleado, $areas){
$id_empleado = $empleado->id;


$consulta = "SELECT * FROM usuarios WHERE id = '$id_empleado'";
$result = mysqli_query($link,$consulta);

$area = $areas[$empleado->id_area];

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$edad = calcularEdad($row["fecha_nacimiento"]);
$empleado->nombres = $row["nombres"];
$empleado->apellidos = $row["apellidos"];
$empleado->genero = $row["genero"];
$empleado->edad = $edad;
$empleado->acudiente = $row["acudiente"];
if($row["tipo_doc"] == 1){
$empleado->tipo_doc = "C.C";
}
else if($row["tipo_doc"] == 2){
$empleado->tipo_doc = "T.I";
}
else{
$empleado->tipo_doc = "R.C";
}

$empleado->no_documento = $row["no_documento"];
$empleado->telefono = $row["telefono"];
$empleado->celular = $row["celular"];
$empleado->email = $row["email"];
$empleado->ciudad = $row["ciudad"];
$empleado->barrio = $row["barrio"];
$empleado->estrato = $row["estrato"];
$empleado->comuna = $row["comuna"];
$empleado->grupo_poblacional = $row["grupo_poblacional"];
$empleado->url_foto = $row["fileName"];
$empleado->id_area = $area;
return $empleado;
}


/*genero un array con todos los empleados, el objeto solo contiene los datos asociados al cargo*/
$consulta = "SELECT * FROM cargos ORDER BY id_area	";
$result = mysqli_query($link,$consulta);
$empleados = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$empleado = new Empleado($row["id_encargado"], "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", $row["nombre_cargo"], $row["id_area"], $row["funciones"]);
array_push($empleados, $empleado);
}
mysqli_free_result($result);
/*genero un array con todos los empleados*/

/*genero un array con todas las areas de la corporacion*/
$consulta = "SELECT * FROM areas ORDER BY area";
$result = mysqli_query($link,$consulta);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$arrayAreas[$row["id"]] = $row["area"];
}
mysqli_free_result($result);
/*genero un array con todas las areas de la corporacion*/

/* Añadir caracteres de escape al codigo*/
$tabla = addslashes('<table>
  <tr>
    <th colspan="2"><img src="fotosPerfil/$empleado->url_foto"></img></th>
  </tr>
  <tr>
    <td>Nombres</td>
    <td>$empleado->nombres</td>
  </tr>
  <tr>
    <td>Apellidos</td>
    <td>$empleado->apellidos</td>
  </tr>
  <tr>
    <td>Genero</td>
    <td>$empleado->genero</td>
  </tr>
  <tr>
    <td>Edad</td>
    <td>$empleado->edad</td>
  </tr>
  <tr>
    <td>Tipo Doc</td>
    <td>$empleado->tipo_doc</td>
  </tr>
  <tr>
    <td>No. Doc</td>
    <td>$empleado->no_documento</td>
  </tr>
  <tr>
    <td>Telefono</td>
    <td>$empleado->telefono</td>
  </tr>
  <tr>
    <td>Celular</td>
    <td>$empleado->celular</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>$empleado->email</td>
  </tr>
  <tr>
    <td>Fecha Ingreso</td>
    <td>$empleado->fecha_ingreso</td>
  </tr>
  <tr>
    <td>Cargo</td>
    <td>$empleado->cargo</td>
  </tr>
  <tr>
    <td colspan="2">Funciones</td>
  </tr>
  <tr>
    <td colspan="2">$empleado->funciones</td>
  </tr>
</table>');
/* Añadir caracteres de escape al codigo*/

//echo "<xmp>".$tabla."</xmp>"; //linea que me permite mostrar codigo html sin ejecutarlo


$area = "";
$num_emp = count($empleados);
for($i=0;$i < $num_emp;$i++){
$empleado = completarDatos($link, $empleados[$i], $arrayAreas);
$empleados[$i] = $empleado;
if($area != $empleados[$i]->id_area){
echo "</br><hr><h3>".$empleados[$i]->id_area."</h3>"."<hr></br>";
$area = $empleados[$i]->id_area;
}
 echo "<table class=\"table table-bordered table-hover table-condensed\">
  <tr>
    <th colspan=\"2\"><img src=\"fotosPerfil/$empleado->url_foto\"></img></th>
  </tr>
  <tr>
    <th>Nombres</th>
    <td>$empleado->nombres</td>
  </tr>
  <tr>
    <th>Apellidos</th>
    <td>$empleado->apellidos</td>
  </tr>
  <tr>
    <th>Genero</th>
    <td>$empleado->genero</td>
  </tr>
  <tr>
    <th>Edad</th>
    <td>$empleado->edad</td>
  </tr>
  <tr>
    <th>Tipo Doc</th>
    <td>$empleado->tipo_doc</td>
  </tr>
  <tr>
    <th>No. Doc</th>
    <td>$empleado->no_documento</td>
  </tr>
  <tr>
    <th>Telefono</th>
    <td>$empleado->telefono</td>
  </tr>
  <tr>
    <th>Celular</th>
    <td>$empleado->celular</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>$empleado->email</td>
  </tr>
  <tr>
    <th>Fecha Ingreso</th>
    <td>$empleado->fecha_ingreso</td>
  </tr>
  <tr>
    <th>Cargo</th>
    <td>$empleado->cargo</td>
  </tr>
  <tr>
    <th colspan=\"2\">Funciones</th>
  </tr>
  <tr>
    <td colspan=\"2\">$empleado->funciones</td>
  </tr>
</table>";
}
//echo "Id: ".$empleados[$i]->id."</br>"."Cargo: ".$empleados[$i]->cargo."</br>"."Area: ".$empleados[$i]->id_area."</br></br>";



/*

echo ' <table class="table table-bordered table-hover table-condensed">
  
  <tr>
    <th>Nombre</th>
    <td>'.$row['nombres'].'</td>
    <th>Celular</th>
    <td>'.$row['celular'].'</td>
    
  </tr>
  <tr>
    <th>Apellidos</th>
    <td>'.$row['apellidos'].'</td>
    <th>Email</th>
    <td>'.$row['email'].'</td>
    
  </tr>
  <tr>
    <th>Genero</th>
    <td>';
	
	if($row['genero'] == 1){
	echo "Masculino";
	}
	else if($row['genero'] == 2){
	echo "Femenino";
	}
	
	echo '</td>
    <th>Ciudad</th>
    <td>'.$row['ciudad'].'</td>
    
  </tr>
  <tr>
    <th>Fecha Nacimiento (DD-MM-AAAA)</th>
    <td>';
	
	$nuevaFecha = preg_split("[-]", $row['fecha_nacimiento']);
	echo $nuevaFecha[2]."-".$nuevaFecha[1]."-".$nuevaFecha[0];
	
	echo '</td>
    <th>Barrio</th>
    <td>'.$row['barrio'].'</td>
    
  </tr>
  <tr>
    <th>Acudiente</th>
    <td>'.$row['acudiente'].'</td>
    <th>Estrato</th>
    <td>'.$row['estrato'].'</td>
    
  </tr>
  <tr>
    <th>Tipo Documento</th>
    <td>';
	
	if($row['tipo_doc'] == 1){
	echo "C.C";
	}
	else if($row['tipo_doc'] == 2){
	echo "T.I";
	}
	else{
	echo "R.C";
	}

	echo'</td>
    <th>Comuna</th>
    <td>'.$row['comuna'].'</td>
   
  </tr>
  <tr>
    <th>No documento</th>
    <td>'.$row['no_documento'].'</td>
    <th>Grupo Poblacional</th>
    <td>';
	
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
	echo '</td>
    
  </tr>
   <tr>
    <th>Telefono</th>
    <td>'.$row['telefono'].'</td>
    <th>Edad</th>
    <td>';
    $edad = calcularEdad($row['fecha_nacimiento']);
    echo $edad;    
    echo '</td>
    
  </tr>
  <tr>
<td colspan="4"><a href="eliminar2.php?id='.$row["id"].'">Eliminar | </a><a href="Actualizar2.php?id='.$row["id"].'">Actualizar</a></td>
 
</tr>
</table>


	</div>
	 </form>
	</div>
	
	<div class="span4">';
	echo '<div class="img-thumbnail">';
	echo '<img src="fotosPerfil/'.$row['fileName'].'"></img>';
	echo '</div>
	</div>
	
	</div>
	</div>
	
	
	';



	*/
	mysqli_close($link);
	?>

	 </div>
               
            </div>
</section>

<!--Bottom-->
<section id="bottom" class="main">
    <!--Container-->
    <div class="container">

        <!--row-fluids-->
        <div class="row-fluid">

            <!--Contact Form-->
            <div class="span3">
                <h4>Direccion</h4>
                <ul class="unstyled address">
                    <li>
                        <i class="icon-home"></i><strong>Direccion:</strong> Cra 76b # 108-52<br>Medellin, Colombia
                    </li>
                    <li>
                        <i class="icon-envelope"></i>
                        <strong>Email: </strong> casamiavidaycultura@gmail.com
                    </li>
                    <li>
                        <i class="icon-globe"></i>
                        <strong>Website:</strong> www.corpcasamia.org
                    </li>
                    <li>
                        <i class="icon-phone"></i>
                        <strong>Telefono:</strong> +57 (4) 273 79 97
                    </li>
                </ul>
            </div>
            <!--End Contact Form-->

             <!--Important Links-->
			<!--
            <div id="tweets" class="span3">
                <h4>OUR COMPANY</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Copyright</a></li>
                        <li><a href="#">We are hiring</a></li>
                        <li><a href="#">Clients</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>  
            </div>
            <!--Important Links-->

            <!--Archives-->
			<!--
            <div id="archives" class="span3">
                <h4>ARCHIVES</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="#">December 2012 (1)</a></li>
                        <li><a href="#">November 2012 (5)</a></li>
                        <li><a href="#">October 2012 (8)</a></li>
                        <li><a href="#">September 2012 (10)</a></li>
                        <li><a href="#">August 2012 (29)</a></li>
                        <li><a href="#">July 2012 (1)</a></li>
                        <li><a href="#">June 2012 (31)</a></li>
                    </ul>
                </div>
            </div>
            <!--End Archives-->
			<!--flickr
            <div class="span3 pull-right flickr">
                <h4>FLICKR GALLERY</h4>
                <div class="row-fluid first">
                    <ul class="thumbnails">
                      <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829540293/" title="01 (254) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75" height="75" alt="01 (254)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829537417/" title="01 (196) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75" height="75" alt="01 (196)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829527437/" title="01 (65) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75" height="75" alt="01 (65)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829524451/" title="01 (6) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75" height="75" alt="01 (6)"></a>
                    </li>
                </ul>
            </div>
            <div class="row-fluid">
                <ul class="thumbnails">
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829524451/" title="01 (6) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75" height="75" alt="01 (6)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829540293/" title="01 (254) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75" height="75" alt="01 (254)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829537417/" title="01 (196) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75" height="75" alt="01 (196)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829527437/" title="01 (65) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75" height="75" alt="01 (65)"></a>
                    </li>
                </ul>
            </div>

        </div>
	<!--flickr-->
    </div>
    <!--/row-fluid-->
</div>
<!--/container-->

</section>
<!--/bottom-->

<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span5 cp">
                &copy; 2014 <a target="_blank" href="www.corpcasamia.org">Corporacion Casa Mia</a>. Todos los derechos reservados.
				Desarrollado por <a href="https://www.facebook.com/esaenz2010">Erick Saenz</a>
            </div>
            <!--/Copyright-->
<!--
            <div class="span6">
                <ul class="social pull-right">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-google-plus"></i></a></li>                       
                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                    <li><a href="#"><i class="icon-tumblr"></i></a></li>                        
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    <li><a href="#"><i class="icon-rss"></i></a></li>
                    <li><a href="#"><i class="icon-github-alt"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>                   
                </ul>
            </div>
-->
            <div class="span1 pull-right">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->

<!--  Login form -->
<div class="modal hide fade in" id="loginForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Login Form</h4>
    </div>
    <!--Modal Body-->
    <div class="modal-body">
        <form class="form-inline" action="index.html" method="post" id="form-login">
            <input type="text" class="input-small" placeholder="Email">
            <input type="password" class="input-small" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox"> Remember me
            </label>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        <a href="#">Forgot your password?</a>
    </div>
    <!--/Modal Body-->
</div>
<!--  /Login form -->

<script src="../../js/vendor/jquery-1.9.1.min.js"></script>
<script src="../../js/vendor/bootstrap.min.js"></script>
<script src="../../js/main.js"></script>   

</body>
</html>