<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Actualizar Programa</title>
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
  <li class="active">Actualizar Programa</li>
</ul>
</div>
<div class="row-fluid">
<h3 class="titleServic">Actualizar Programa</h3>
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
                        require('conexion.php');
						$id = $_GET['id'];
                        $consulta = "SELECT * FROM programas WHERE id = '$id'";
                        $result = mysqli_query($link, $consulta);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        
						
$nombre = $row['nombre'];
$duracion = $row['duracion'];
$descripcion = $row['descripcion'];

						echo "   
                    <label for=\"requerido\">* Requerido</label>		
					<form role=\"form\" action=\"actualizarPrograma2.php\" name=\"registroprograma\" method=\"post\">	
					

                      <div class=\"form-group\">
                            <label for=\"nombreprograma\">Nombre del Programa *</label>
                            <input type=\"text\" class=\"form-control\" value=\"$nombre\" name=\"programa\" placeholder=\"Ingrese nombre del programa\" required>
                        </div>					
						
						<div class=\"form-group\">
                            <label for=\"numero_documento\">Duracion *</label>
                            <input type=\"number\" min=\"1\" max=\"200\" class=\"form-control\" value=\"$duracion\" name=\"duracion\" placeholder=\"Duracion en horas\" required>
                        </div>
	
						 <div class=\"form-group\">
						   <label for=\"descripcion\">Descripción del Programa *</label>
                             <textarea name=\"descripcion\" class=\"input-block-level\"  rows=\"4\" >$descripcion</textarea>
                                
						</div>
						<input type=\"hidden\" name=\"id\" value=\"$id\">
					<button  type=\"submit\" name=\"enviar\" value=\"enviar\" class=\"btn btn-default\">Enviar</button>";
                    
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