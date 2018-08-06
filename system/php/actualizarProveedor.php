<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Actualizar Proveedor</title>
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
  <li><a href="busquedaProveedor.php">Proveedores</a> <span class="divider">/</span></li>
  <li class="active">Actualizar proveedor</li>
</ul>
</div>
<div class="row-fluid">
<h3 class="titleServic">Actualizar proveedor</h3>
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
                        $consulta = "SELECT * FROM proveedores WHERE id = '$id'";
                        $result = mysqli_query($link, $consulta);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        
						$empresa = $row['empresa'];
$contacto = $row['contacto'];
$telefono = $row['telefono'];
$cel = $row['celular'];
$direccion = $row['direccion'];
$email = $row['email'];
$descripcion = $row['descripcion'];
						
						echo "                
                        <label for=\"requerido\">* Requerido</label>
                    <form role=\"form\" action=\"actualizarProveedor1.php\" name=\"actualizarProveedor\" method=\"post\">

                        <div class=\"form-group\">
                            <label for=\"empresa\">Empresa *</label>
                            <input type=\"text\" class=\"form-control\" name=\"empresa\" value=\"$empresa \" placeholder=\"Ingrese el nombre de la empresa\" required>
                        </div>

                        <div class=\"form-group\">
                            <label for=\"contacto\">Contacto *</label>
                            <input type=\"text\" class=\"form-control\" name=\"contacto\" value=\"$contacto\" placeholder=\"Nombre contacto\" required>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"telefono\">Telefono *</label>
                            <input type=\"tel\" class=\"form-control\" name=\"telefono\" value=\"$telefono\" pattern=\"[0-9]{7}\" placeholder=\"Telefono fijo\" required>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"cel\">Celular *</label>
                            <input type=\"tel\" class=\"form-control\" name=\"cel\" value=\"$cel\" pattern=\"[0-9]{10}\" placeholder=\"Celular\" required>
                        </div>
						<div class=\"form-group\">
                            <label for=\"direccion\">Direccion </label>
                            <input type=\"text\" class=\"form-control\" name=\"direccion\" value=\"$direccion\" placeholder=\"Ingrese la ciudad\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"email\">Email</label>
                            <input type=\"email\" class=\"form-control\" name=\"email\" value=\"$email\" placeholder=\"Email Contacto\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"descripcion\">Descripcion *</label>
                            <textarea name=\"descripcion\" id=\"descripcion\" required=\"required\" class=\"input-block-level\" rows=\"8\">$descripcion</textarea>
                        </div>
						
						<input type=\"hidden\" name=\"id\" value=\"$id\">
                       <button type=\"submit\" name=\"enviar\" value=\"enviar\" class=\"btn btn-default\">Enviar</button>
					   
					   
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