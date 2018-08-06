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
	<script>
	
	</script>
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
  <li class="active">Registro Articulo</li>
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
require('funciones.php');

$autor = $_POST['autor'];
$fecha = $_POST['fecha'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$cuerpo = $_POST['cuerpo'];
$cuerpo = nl2br($cuerpo);
$ultimo = ultimoArt($link);
$proximoId = $ultimo + 1;

//comprobamos si ha ocurrido un error.
if ($_FILES["imagen"]["error"] > 0){
    echo $_FILES["imagen"]["error"];

echo "<center>Error en la consulta</center>";
        
} 
else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 8000;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "fotosArticulos/".$proximoId.$_FILES['imagen']['name'];
                
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		
          
         $rutas = poner_guion($titulo, $proximoId);        
                 
//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$rutaImagen = "../../articulos/".$rutas[1];
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen);
			$nombreAutor = consultarAutor($autor, $link);
			$etiquetas = agregarEtiquetas($_POST['etiquetas'], $link);
			
			//$cuerpo = htmlentities($cuerpo);
			$estado = guardarArticulo($titulo, $descripcion, $autor, $nombreAutor, $fecha, $etiquetas, $cuerpo, $rutas[0], $rutas[1]);						
			if ($estado){
				
				if(mysqli_query($link,"INSERT INTO articulo(autor, fecha, titulo, descripcion, ruta_articulo, ruta_imagen) 
				VALUES ('$autor', '$fecha', '$titulo', '$descripcion', '$rutas[0]','$rutas[1]')")){
							
				$ultimo = ultimoArt($link);
				artxetiq($ultimo, $etiquetas, $link);
				//redimensionarImagen($rutaImagen);
echo "<center>Articulo registrado exitosamente</center>";

/*header('Location: cortarImagen.php');*/
//echo "<script>window.location.href=\"cortarImagen.php\";</script>";
}
else{
printf("Errormessage: %s\n", mysqli_error($link));
}
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		 
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
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