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
    
    <link rel="stylesheet" href="../css/main.css">
 
	<link rel="stylesheet" href="../css/mystyle.css">
	<link rel="stylesheet" href="../css/jquery.Jcrop.css">    
	<link href="../css/lightbox.css" rel="stylesheet"/>
	<script src="../js/jquery.Jcrop.min.js"></script>
    <script src="../js/registroUsuarios.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/lightbox.min.js"></script>
    

		
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
  
  <li><a href="../index.html">Servicios</a> <span class="divider">/</span></li>
  <li class="active">Registro Autor</li>
</ul>
</div>
<div class="row-fluid">
<h3 class="titleServic">Formulario de Registro</h3>
</div>
		
		</div>
		</div>
		</div>
			
        <div class="row-fluid contServices">
		<div class="span1">
		</div>
		<div class="span10">
		<!--Codigo PHP-->
		<label for="requerido">* Requerido</label>
                    <form role="form" action="registroAutor2.php" enctype="multipart/form-data" name="registroUsuarios" method="post" onsubmit="return comprobarFormulario()">

                        <div class="form-group">
                            <label for="nombres">Nombres *</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Ingrese sus nombres" required>
                        </div>

                        <div class="form-group">
                            <label for="apellidos">Apellidos *</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Ingrese sus apellidos" required>
                        </div>
						
						<div class="form-group">
                            <label for="apellidos">Cedula *</label>
                            <input type="number" class="form-control" name="cedula" placeholder="Ingrese su cedula" required>
                        </div>
						
						<div class="form-group">
                            <label for="apellidos">Facebook *</label>
                            <input type="text" class="form-control" name="facebook" placeholder="Link Facebook" required>
                        </div>
						
						<div class="form-group">
                            <label for="apellidos">Twiter *</label>
                            <input type="text" class="form-control" name="twiter" placeholder="Link Twiter" required>
                        </div>
						
                        
                        <button type="submit" name="enviar" value="enviar" class="btn btn-default">Enviar</button>
                    </form>
		
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