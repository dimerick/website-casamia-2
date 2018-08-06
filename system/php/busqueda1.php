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

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">  
	<link rel="stylesheet" href="../css/mystyle.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/busqueda.js"></script>
	
		
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
  <li class="active">Busqueda</li>
</ul>
</div>
<div class="row-fluid">
<h3 class="titleServic">Busqueda</h3>
</div>
		
		</div>
		</div>
		</div>
		
        <div class="row-fluid contServices">
		<div class="span1">
		</div>
		<div class="span10">
		<!--Codigo PHP-->
		 <div class="row-fluid">
		 <div class="span12">
		 <h3>Busqueda Individual</h3>
		 <form role="form" action="busqueda2.php" method="post">
                        <div class="input-group">

                            <?php
                            require('conexion.php');

                            $consulta = "SELECT id, nombres, apellidos FROM usuarios ORDER BY apellidos DESC";
                            $result = mysqli_query($link, $consulta);


                            echo '<select class="form-control" name="usuario">';
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo '<option value="' . $row["id"] . '">' . $row["apellidos"] . " " . $row["nombres"] . '</option>';
                            }

                            echo '</select>';
                            ?>
                            <span class="input-group-btn">
                                <button type="submit" name="enviar" value="enviar" class="btn btn-default">Consultar</button>
                            </span>
                        </div>

                    </form>
					</div>
				</div>
				<hr>
				<div class="row-fluid">
		 <div class="span12">
		  <form role="form" action="busquedaper.php" method="post">
                        <h3>Busqueda Personalizada</h3>
                        <div class="input-group">
                            <div class="input-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="checkEdad" name="checkEdad" value="opcion_1"> Edad
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="checkGrupoP" name="checkGrupoP" value="opcion_2"> Grupo Poblacional
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="checkGenero" name="checkGenero" value="opcion_3"> Genero
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="checkEstrato" name="checkEstrato" value="opcion_3"> Estrato
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="checkBarrio" name="checkBarrio" value="opcion_3"> Barrio
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="checkComuna" name="checkComuna" value="opcion_3"> Comuna
                                </label>

                            </div><!-- /input-group -->
                            
                            <div id="busquedaEdad" class="busqueda">
                                <label class="checkbox-inline">
                                    Desde <input type="number" min="0" id="edad1" name="edad1"> Hasta <input type="number" min="0" id="edad2" name="edad2">
                                </label>
                            </div>


                            <div id="busquedaGrupoP" class="busqueda">
                                <label>Grupo Poblacional</label>
                                <select class="form-control" name="grupo_poblacional">
                                    <option value="3" selected>Madre cabeza de familia</option>
                                    <option value="4">Afrodescendiente</option>
                                    <option value="5">Discapacitado</option>
                                    <option value="6">LGBTI</option>
                                </select>

                            </div>

                            <div id="busquedaGenero" class="busqueda">
                                <label>Genero</label>
                                <select class="form-control" name="genero">
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>

                            </div>

                            <div id="busquedaEstrato" class="busqueda">
                                <label>Estrato</label>
                                <select class="form-control" name="estrato">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>

                                </select>

                            </div>

                            <div id="busquedaBarrio" class="busqueda">
                                <label>Barrio</label>
                                <input type="text" name="barrio" id="barrio" placeholder="Ingrese el barrio">

                            </div>

                            <div id="busquedaComuna" class="busqueda">
                                <label>Comuna</label>
                                <input type="number" min="1" class="form-control" name="comuna" id="comuna" placeholder="Ingrese el No. de la comuna a la que pertenece">

                            </div>
                        </div>
                        <div class="input-group">


                            <span class="input-group-btn">
                                <button type="submit" name="enviar" value="enviar" class="btn btn-default">Consultar</button>
                            </span>
                        </div>

                    </form>
		 </div>
		</div>	
		
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