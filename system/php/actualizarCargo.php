<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Actualizar Cargo</title>
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
  <li class="active">Actualizar Cargo</li>
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
		 <label for="requerido">* Requerido</label>
					</br>
                    <form role="form" action="actualizarCargo2.php" name="actualizarCargo" method="post">
						<?php
									
						require('conexion.php');
						$id = $_GET['id'];
                        $consulta = "SELECT * FROM cargos WHERE id = '$id'";
						echo "<input type=\"hidden\" value=\"$id\" name=\"idCargo\">";
                        $result = mysqli_query($link, $consulta);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$nombreCargo = $row['nombre_cargo'];
						$funciones = $row['funciones'];
						$idEncargado = $row['id_encargado'];
						$idArea= $row['id_area'];
						mysqli_free_result($result);
						$consulta = "SELECT nombres, apellidos FROM usuarios WHERE id = '$idEncargado'";
						$result = mysqli_query($link, $consulta);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$nombre = $row['nombres']." ".$row['apellidos'];
						mysqli_free_result($result);
						$consulta = "SELECT area FROM areas WHERE id = '$idArea'";
						$result = mysqli_query($link, $consulta);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$nomArea = $row['area'];
						
						echo "<div class=\"form-group\">
                            <label for=\"rol\">Cargo *</label>
                            <input type=\"text\" value=\"$nombreCargo\" class=\"form-control\" required=\"required\" name=\"cargo\" required>
                        </div>
						
						<div class=\"input-group\">
						<label for=\"rol\">Area ala que pertenece *</label>
                            
                                                       


                           <select class=\"form-control\" name=\"area\" disabled>
                           <option value=\"\">$nomArea</option>
                            </select>
							
							
							<div class=\"input-group\"><label for=\"rol\">Persona encargada *</label>
							<select class=\"form-control\" name=\"encargado\" disabled>
                           <option value=\"\">$nombre</option>
                            </select></div>                    
                            <div class=\"form-group\">
                            <label for=\"apellidos\">Funciones *</label>
                            <textarea name=\"funciones\"  id=\"funciones\" required=\"required\" class=\"input-block-level\" rows=\"8\">$funciones</textarea>
                        </div>";
						
						
						
						/*
                        <div class="form-group">
                            <label for="rol">Cargo *</label>
                            <input type="text" class="form-control" required="required" name="cargo" required>
                        </div>
						
						<div class="input-group">
						<label for="rol">Area ala que pertenece *</label>
                            
                           

                            


                           <select class="form-control" name="area">
                           <option value=""></option>
                            </select>
							
							
							<div class="input-group"><label for="rol">Persona encargada *</label>
							<select class="form-control" name="encargado">
                           <option value=""></option>
                            </select></div>                    
                            <div class="form-group">
                            <label for="apellidos">Funciones *</label>
                            <textarea name="funciones" id="funciones" required="required" class="input-block-level" rows="8"></textarea>
                        </div>
						*/
                        ?>
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