<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Actualizar</title>
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
  <li><a href="Busqueda1.php">Consulta Usuarios</a> <span class="divider">/</span></li>
  <li class="active">Actualiza Usuario</li>
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
                        require('conexion.php');
						$id = $_GET['id'];
                        $consulta = "SELECT * FROM usuarios WHERE id = '$id'";
                        $result = mysqli_query($link, $consulta);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        echo '<label for="requerido">* Requerido</label>
                    <form role="form" action="actualizar3.php" enctype="multipart/form-data" name="registroUsuarios" method="post" onsubmit="return comprobarFormulario()">
                        <input type="hidden" name="usuario" value="'.$id.'">
                        <div class="form-group">
                            <label for="nombres">Nombres *</label>
                            <input type="text" class="form-control" name="nombres" value="' . $row['nombres'] . '"placeholder="Ingrese sus nombres" required>
                        </div>

                        <div class="form-group">
                            <label for="apellidos">Apellidos *</label>
                            <input type="text" class="form-control" name="apellidos" value="' . $row['apellidos'] . '"placeholder="Ingrese sus apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo_genero">Genero</label>
                            <select class="form-control" name="genero">';
                        if ($row['genero'] == 1) {
                            echo '<option value="1" selected>Masculino</option>
                                <option value="2">Femenino</option>';
                        } else if ($row['genero'] == 2) {
                            echo '<option value="1">Masculino</option>
                                <option value="2" selected>Femenino</option>';
                        }



                        echo '</select>
                        </div>
                        <div class="form-group">
                            <label for="Fecha">Fecha de Nacimiento *</label>
                            <input type="date" class="form-control" name="fechaNacimiento" value="' . $row['fecha_nacimiento'] . '" required>
                        </div>
                        <div class="form-group">
                            <label for="acudiente">Acudiente</label>
                            <input type="text" class="form-control" name="acudiente" value="' . $row['acudiente'] . '" placeholder="Ingrese el audiente si es menor de edad">
                        </div>
                        <div class="form-group">
                            <label for="tipo_documento">Tipo de Documento</label>
                            <select class="form-control" name="tipo_documento">';
                        if ($row['tipo_doc'] == 1) {
                            echo '<option value="1" selected>C.C</option>
  <option value="2">T.I</option>
  <option value="3">R.C</option>
  </select>';
                        } else if ($row['tipo_doc'] == 2) {
                            echo '<option value="1">C.C</option>
  <option value="2" selected>T.I</option>
  <option value="3">R.C</option>
  </select>';
                        } else if ($row['tipo_doc'] == 3) {
                            echo '<option value="1">C.C</option>
  <option value="2">T.I</option>
  <option value="3" selected>R.C</option>';
                        }
                        echo '</select>
                        </div>
                        <div class = "form-group">
                        <label for = "numero_documento">No. Documento *</label>
                        <input type = "number" min = "1000000" class = "form-control" name = "no_documento" value="' . $row['no_documento'] . '" placeholder = "Ingrese el No. documento" required>
                        </div>
                        <div class = "form-group">
                        <label for = "telefono">Telefono *</label>
                        <input type = "tel" class = "form-control" name = "telefono" value="' . $row['telefono'] . '" pattern = "[0-9]{7}" placeholder = "Ingrese un telefono fijo" required>
                        </div>
                        <div class = "form-group">
                        <label for = "cel">Celular</label>
                        <input type = "tel" class = "form-control" name = "cel" value="' . $row['celular'] . '" pattern = "[0-9]{10}" placeholder = "Ingrese su celular">
                        </div>
                        <div class = "form-group">
                        <label for = "email">Email</label>
                        <input type = "email" class = "form-control" name = "email" value="' . $row['email'] . '" placeholder = "Ingrese su email">
                        </div>
                        <div class = "form-group">
                        <label for = "Ciudad">Ciudad *</label>
                        <input type = "text" class = "form-control" name = "ciudad" value="' . $row['ciudad'] . '" placeholder = "Ingrese la ciudad" required>
                        </div>
                        <div class = "form-group">
                        <label for = "barrio">Barrio *</label>
                        <input type = "text" class = "form-control" name = "barrio" value="' . $row['barrio'] . '" placeholder = "Barrio donde reside" required>
                        </div>
                        
   <div class="form-group">
    <label for="estrato">Estrato</label>
     <select class="form-control" name="estrato">';
                        if ($row['estrato'] == 1) {
                            echo '
							<option value="none"></option>
  <option value="1" selected>1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  </select>';
                        } else if ($row['estrato'] == 2) {
                            echo '
							<option value="none"></option>
  <option value="1">1</option>
  <option value="2" selected>2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  </select>';
                        } else if ($row['estrato'] == 3) {
                            echo '
							<option value="none"></option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3" selected>3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  </select>';
                        } else if ($row['estrato'] == 4) {
                            echo '
							<option value="none"></option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4" selected>4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  </select>';
                        } else if ($row['estrato'] == 5) {
                            echo '
							<option value="none"></option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5" selected>5</option>
  <option value="6">6</option>
  </select>';
                        } else if ($row['estrato'] == 6) {
                            echo '
							<option value="none"></option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6" selected>6</option>
  </select>';
 }
                        echo
                        '</div>
                        <div class = "form-group">
                        <label for = "comuna">Comuna No. *</label>
                        <input type = "number" min = "1" class = "form-control" name = "comuna" value="'.$row['comuna'].'" placeholder = "Ingrese el No. de la comuna a la que pertenece" required>
                        </div>
                        <div class = "form-group">
                        <label for = "grupo_poblacional">Grupo Poblacional</label>
                        <select class = "form-control" name = "grupo_poblacional">';

                        if ($row['grupo_poblacional'] == 1) {
                            echo '<option value="1" selected>Ninguno</option>
  
  <option value="3">Madre cabeza de familia</option>
  <option value="4">Afrodescendiente</option>
  <option value="5">Discapacitado</option>
  <option value="6">LGBTI</option>
  
  </select>';
                        } else if ($row['grupo_poblacional'] == 3) {
                            echo '<option value="1">Ninguno</option>
  
  <option value="3" selected>Madre cabeza de familia</option>
  <option value="4">Afrodescendiente</option>
  <option value="5">Discapacitado</option>
  <option value="6">LGBTI</option>
  
  </select>';
                        } else if ($row['grupo_poblacional'] == 4) {
                            echo '<option value="1">Ninguno</option>

  <option value="3">Madre cabeza de familia</option>
  <option value="4" selected>Afrodescendiente</option>
  <option value="5">Discapacitado</option>
  <option value="6">LGBTI</option>
  
  </select>';
                        } else if ($row['grupo_poblacional'] == 5) {
                            echo '<option value="1">Ninguno</option>

  <option value="3">Madre cabeza de familia</option>
  <option value="4">Afrodescendiente</option>
  <option value="5" selected>Discapacitado</option>
  <option value="6">LGBTI</option>
  
  </select>';
                        } else if ($row['grupo_poblacional'] == 6) {
                            echo '<option value="1">Ninguno</option>
 
  <option value="3">Madre cabeza de familia</option>
  <option value="4">Afrodescendiente</option>
  <option value="5">Discapacitado</option>
  <option value="6" selected>LGBTI</option>

  </select>';
                        }

                    

                        echo 
                        '<div class="form-group">
                            <label for="imagen">Cargar Foto</label>

                            <div id="botonera">
                                <input type="file" id="archivo" name="imagen" accept="image/*">
                                <input id="cancelar" type="button" value="Cancelar">  
                            </div>
                            <div class="contenedor">

                                <div id="marcoVistaPrevia">
                                    <img id="vistaPrevia" src="'."fotosPerfil/".$row['fileName'].'" alt="" />
                                </div>
							<input type="checkbox" name="consImg" checked="checked">Conservar Imagen Anterior	
                            </div>

                        </div>
                        <button type = "submit" name = "enviar" value = "enviar" class = "btn btn-default">Actualizar</button>
                        
                        </form>';
                    
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