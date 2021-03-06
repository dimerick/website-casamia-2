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
  <li><a href="../comprobarUsuario.html">Comprobar Usuario</a> <span class="divider">/</span></li>
  <li class="active">Formulario de Registro</li>
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
                    <form role="form" action="registroUsuarios2.php" enctype="multipart/form-data" name="registroUsuarios" method="post" onsubmit="return comprobarFormulario()">

                        <div class="form-group">
                            <label for="nombres">Nombres *</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Ingrese sus nombres" required>
                        </div>

                        <div class="form-group">
                            <label for="apellidos">Apellidos *</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Ingrese sus apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo_genero">Genero</label>
                            <select class="form-control" name="genero">
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Fecha">Fecha de Nacimiento *</label>
                            <input type="date" class="form-control" name="fechaNacimiento" required>
                        </div>
                        <div class="form-group">
                            <label for="acudiente">Acudiente</label>
                            <input type="text" class="form-control" name="acudiente" placeholder="Ingrese el audiente si es menor de edad">
                        </div>
                        <div class="form-group">
                            <label for="tipo_documento">Tipo de Documento</label>
                            <select class="form-control" name="tipo_documento">
                                <option value="1">C.C</option>
                                <option value="2">T.I</option>
                                <option value="2">R.C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numero_documento">No. Documento *</label>
							<input type="text" min="1000000" class="form-control" <?php $id = $_GET['id']; echo "value=\"$id\""?> placeholder="Ingrese el No. documento" disabled>
							
                            <input type="hidden" min="1000000" class="form-control" <?php $id = $_GET['id']; echo "value=\"$id\""?>name="no_documento" placeholder="Ingrese el No. documento" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono *</label>
                            <input type="tel" class="form-control" name="telefono" pattern="[0-9]{7}" placeholder="Ingrese un telefono fijo" required>
                        </div>
                        <div class="form-group">
                            <label for="cel">Celular</label>
                            <input type="tel" class="form-control" name="cel" pattern="[0-9]{10}" placeholder="Ingrese su celular">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Ingrese su email">
                        </div>
                        <div class="form-group">
                            <label for="Ciudad">Ciudad *</label>
                            <input type="text" class="form-control" name="ciudad" placeholder="Ingrese la ciudad" required>
                        </div>
                        <div class="form-group">
                            <label for="barrio">Barrio *</label>
                            <input type="text" class="form-control" name="barrio" placeholder="Barrio donde reside" required>
                        </div>
                        <div class="form-group">
                            <label for="estrato">Estrato *</label>
                            <select class="form-control" name="estrato" required>
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comuna">Comuna No. *</label>
                            <input type="number" min="1" class="form-control" name="comuna" placeholder="Ingrese el No. de la comuna a la que pertenece" required>
                        </div>
                        <div class="form-group">
                            <label for="grupo_poblacional">Grupo Poblacional</label>
                            <select class="form-control" name="grupo_poblacional">
                                <option value="1" selected>Ninguno</option>
                                <option value="3">Madre cabeza de familia</option>
                                <option value="4">Afrodescendiente</option>
                                <option value="5">Discapacitado</option>
                                <option value="6">LGBTI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Cargar Foto</label>

                            <div id='botonera'>
                                <input type="file" id="archivo" name="imagen" accept="image/*">
                                <input id="cancelar" type="button" value="Cancelar">  
                            </div>
                            <div class="contenedor">

                                <div id="marcoVistaPrevia">
                                    <img id="vistaPrevia" src="" alt="" />
                                </div>
                            </div>

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