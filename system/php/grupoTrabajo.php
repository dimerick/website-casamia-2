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
  <li class="active">Grupo de Trabajo</li>
</ul>
</div>
<div class="row-fluid">
<h3 class="titleServic">Grupo de Trabajo</h3>
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


	
    require('conexion.php');

/*Clase empleado, que me permite almacenar los datos basicos de un empleado de la corporacion casa mia*/
class Empleado{
var $id_cargo;
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

function __construct($id_cargo, $id, $nombres, $apellidos, $genero, $edad, $tipo_doc, $no_documento, $telefono, $celular, $email, $ciudad, $barrio, $estrato, $comuna, 
$grupo_poblacional, $url_foto, $fecha_ingreso, $cargo, $id_area, $funciones){
$this->id_cargo = $id_cargo;
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
$empleado = new Empleado($row["id"], $row["id_encargado"], "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", $row["fecha"], $row["nombre_cargo"], $row["id_area"], $row["funciones"]);
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
  <tr>
    <td colspan="2"></td>
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
echo "</br><hr><h3 class=\"titleServic\">".$empleados[$i]->id_area."</h3>"."<hr></br>";
$area = $empleados[$i]->id_area;
}
 echo "<table class=\"table table-bordered datUser table-hover table-condensed\">
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
  <tr>
    <td colspan=\"2\">";
	
	echo '<a href="eliminarCargo2.php?id='.$empleado->id_cargo.'">Retirar del Cargo | </a><a href="actualizarCargo.php?id='.$empleado->id_cargo.'">Actualizar</a>';
	
	echo "</td>
  </tr>
</table>";
}

	mysqli_close($link);
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