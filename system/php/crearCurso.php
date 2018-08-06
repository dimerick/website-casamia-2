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
	<script src="../js/jquery.min.js"></script>
	<script src="../js/nombrePrograma.js"></script>
		
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
  <li class="active">Registro Curso</li>
</ul>
</div>
<div class="row-fluid">
<h3 class="titleServic">Registro Curso</h3>
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
                    <form role="form" action="crearCurso2.php" name="registroUsuarios" method="post" onsubmit="return comprobarFormulario()">
						
						
                            <?php
                            require('conexion.php');

                            $consulta = "SELECT id, nombre FROM programas ORDER BY nombre DESC";
                            $result = mysqli_query($link, $consulta);


                            echo '<div class=\"form-group\"><select class="form-control" id="programa" name="programa" required>';
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo '<option value="' . $row["id"] . '">' . $row["nombre"].'</option>';
                            }
							echo '</select></div>';
							mysqli_free_result($result);
							
							$consulta = "SELECT year FROM cursos ORDER BY year DESC";
                            $result = mysqli_query($link, $consulta);
							$num = 0;
							$year = date('Y');
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){							       							 
							if(strcmp($year, $row["year"]) == 0 ){								
									$num++;
								}
							}
							$num++;
							$nomCurso = $year."_".$num;
							echo "<div class=\"form-group\">
<label>Nombre  *</label>
<input type=\"text\" class=\"form-control\" id=\"nomCurso\" name=\"curso\" placeholder=\"Ingrese el nombre del curso\" disabled required>
</div>
<input type=\"hidden\" name=\"nomCurso\" value=\"$nomCurso\">
<input type=\"hidden\" name=\"year\" value=\"$year\">
<div class=\"form-group\">
<label>Docente *</label>
<input type=\"text\" class=\"form-control\" name=\"docente\" placeholder=\"Nombre docente\" required>
</div>
<div class=\"form-group\">
<label>Fecha Inicio *</label>
<input type=\"date\" class=\"form-control\" name=\"fecha_inicio\" placeholder=\"Dia en el que inicia el curso\" required>
</div>";
							
                            
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