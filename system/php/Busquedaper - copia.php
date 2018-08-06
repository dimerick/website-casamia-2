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

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/sl-slide.css">
	<link rel="stylesheet" href="../../css/mystyle.css">
	<link rel="stylesheet" href="../../css/jquery.Jcrop.css">    
	<link href="../../lightbox.css" rel="stylesheet"/>
	<script src="../../js/jquery.Jcrop.min.js"></script>
    <script src="../../js/registroUsuarios.js"></script>
    <script src="../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="../../js/jquery-1.11.0.min.js"></script>
	<script src="../../js/lightbox.min.js"></script>
    <script src="../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <script src="../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head>


<body>

  <!--Header-->
    <header class="navbar navbar-fixed-top">
	<div id="MyHeader">
	<h1>¡Lo Efectivo es lo Afectivo!</h1>
	<div id="logo0">
	<a id="logo" class="pull-left" href="index.html"></a>
	</div>
     </div>   
		<div class="navbar-inner">
		
            <div class="container">			
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <!--Social-->	
                <div class="span6">
                <ul class="social">
                    <li><a href="https://facebook.com/Corp.CasaMia"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://twitter.com/corpcasaMia"><i class="icon-twitter"></i></a></li>                         
                    <li><a href="https://youtube.com/channel/UC2KfvGBcqS02qyf9fSLJc7g"><i class="icon-youtube"></i></a></li>                                      
                </ul>
            </div>
			<!--Social-->
                <!--nav-collapse -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li><a href="../index.html">Inicio</a></li>
                        <li><a href="../quienes-somos.html">Quienes Somos</a></li>
                        <li><a href="../programas.html">Programas</a></li>
                        <li><a href="../index.html">Servicios</a></li>
                        <!--
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="career.html">Career</a></li>
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="registration.html">Registration</a></li>
                                <li class="divider"></li>
                                <li><a href="privacy.html">Privacy Policy</a></li>
                                <li><a href="terms.html">Terms of Use</a></li>
                            </ul>
                        </li>
						-->
                        <li><a href="../blog.html">Blog</a></li> 
                        <li class="active"><a href="contacto.php">Contacto</a></li>
                        <!--
						<li class="login">
                            <a href="admin/services.html"><i class="fa fa-lock"></i></a>
                        </li>
						-->
                    </ul>        
                </div>
				<!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->

    <section id="contact-page" class="container" style="margin-top: 5%;">
	<div class="row-fluid">
		<div class="span8">
		</div>
		<div class="span4">
		<ul class="breadcrumb">
  
  <li><a href="../index.html">Servicios</a> <span class="divider">/</span></li>
  <li><a href="Busqueda1.php">Busqueda</a> <span class="divider">/</span></li>
  <li class="active">Usuario</li>
</ul>
		</div>
		</div>
	<div class="row-fluid" style="background:#fff";>
		<div class="span1">
		</div>
		<div class="span11">
		



            <?php
            if (isset($_POST['enviar'])) {

                $link = mysqli_connect("localhost", "root", "", "casamia");

                /* verificar la conexión */
                if (mysqli_connect_errno()) {
                    printf("Conexión fallida: %s\n", mysqli_connect_error());
                    exit();
                }

                function calcularEdad($fechaNac) {

                    $nuevaFecha = preg_split("[-]", $fechaNac);
                    //echo $nuevaFecha[2]."-".$nuevaFecha[1]."-".$nuevaFecha[0];
                    $dia = $nuevaFecha[2];
                    $mes = $nuevaFecha[1];
                    $ano = $nuevaFecha[0];

                    $ahora_ano = date("Y");
                    $ahora_mes = date("m");
                    $ahora_dia = date("d");

                    $edad = ($ahora_ano + 1900) - $ano;
                    if ($ahora_mes < ($mes - 1)) {
                        $edad--;
                    }
                    if ((($mes - 1) == $ahora_mes) && ($ahora_dia < $dia)) {
                        $edad--;
                    }
                    if ($edad > 1900) {
                        $edad -= 1900;
                    }
                    return $edad;
                }

                if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Solo edad esta seleccionado";
                    $consulta = "SELECT * FROM usuarios";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Solo grupo poblacional esta seleccionado";
                    $grupoP = $_POST['grupo_poblacional'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Solo genero esta seleccionado";
                    $genero = $_POST['genero'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Solo estrato esta seleccionado";
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Solo barrio esta seleccionado";
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    echo $barrio;
                    $consulta = "SELECT * FROM usuarios WHERE barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Solo comuna esta seleccionado";
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad y grupo poblacional estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad y genero estan seleccionados";
                    $genero = $_POST['genero'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad y estrato estan seleccionados";
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad y barrio estan seleccionados";
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad y comuna estan seleccionados";
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional y genero estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional y estrato estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional y barrio estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Genero y estrato estan seleccionados";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Genero y barrio estan seleccionados";
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Genero y comuna estan seleccionados";
                    $genero = $_POST['genero'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Estrato y barrio estan seleccionados";
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Estrato y comuna estan seleccionados";
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Barrio y comuna estan seleccionados";
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional y genero estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional y estrato estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional y barrio estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, genero y estrato estan seleccionados";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, genero y barrio estan seleccionados";
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, genero y comuna estan seleccionados";
                    $genero = $_POST['genero'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, estrato y barrio estan seleccionados";
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, estrato y comuna estan seleccionados";
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, barrio y comuna estan seleccionados";
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, genero y estrato estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, genero y barrio estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, genero y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, estrato y barrio estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, estrato y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, barrio y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Genero, estrato y barrio estan seleccionados";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Genero, estrato y comuna estan seleccionados";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Genero, barrio y comuna estan seleccionados";
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Estrato, barrio y comuna estan seleccionados";
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, genero y estrato estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, genero y barrio estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, genero y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, estrato y barrio estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, estrato y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, barrio y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, genero, estrato y barrio estan seleccionados";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, genero, estrato y comuna estan seleccionados";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, genero, barrio y comuna estan seleccionados";
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, estrato, barrio y comuna estan seleccionados";
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, genero, estrato y barrio estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, genero, estrato y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, genero, barrio y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, estrato, barrio y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Genero, estrato, barrio y comuna estan seleccionados";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, genero, estrato, y barrio estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, genero, estrato, y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, genero, barrio, y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, grupo poblacional, estrato, barrio, y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, genero, estrato, barrio, y comuna estan seleccionados";
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Grupo poblacional, genero, estrato, barrio, y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if ((isset($_POST['checkEdad'])) && (isset($_POST['checkGrupoP'])) && (isset($_POST['checkGenero'])) && (isset($_POST['checkEstrato'])) && (isset($_POST['checkBarrio'])) && (isset($_POST['checkComuna']))
                ) {
                    echo "Edad, Grupo poblacional, genero, estrato, barrio, y comuna estan seleccionados";
                    $grupoP = $_POST['grupo_poblacional'];
                    $genero = $_POST['genero'];
                    $estrato = $_POST['estrato'];
                    $barrio = $_POST['barrio'];
                    $barrio = strtolower($barrio);
                    $barrio = ucfirst($barrio);
                    $comuna = $_POST['comuna'];
                    $consulta = "SELECT * FROM usuarios WHERE grupo_poblacional = '$grupoP' AND genero = '$genero' AND estrato = '$estrato' AND barrio = '$barrio' AND comuna = '$comuna'";
                } else if (!(isset($_POST['checkEdad'])) && !(isset($_POST['checkGrupoP'])) && !(isset($_POST['checkGenero'])) && !(isset($_POST['checkEstrato'])) && !(isset($_POST['checkBarrio'])) && !(isset($_POST['checkComuna']))
                ) {
                    echo "No seleccionaste ningun item de busqueda";
                    //$consulta = "SELECT * FROM usuarios";
                }

                /*
                  Ejemplo clase
                  class Usuario{

                  public $id;
                  public $dia;
                  public $mes;
                  public $year;
                  public $pagadoA;
                  public $noDocumento;
                  public $valor;

                  function __construct($id, $dia, $mes, $year, $pagadoA, $noDocumento, $valor) {
                  $this->id = $id;
                  $this->dia = $dia;
                  $this->mes = $mes;
                  $this->year = $year;
                  $this->pagadoA = $pagadoA;
                  $this->noDocumento = $noDocumento;
                  $this->valor = $valor;
                  }

                  // Ésta es la función de comparación estática:

                  static function cmp_obj($a, $b) {
                  if ($a->dia == $b->dia) {
                  return 0;
                  }
                  return ($a->dia > $b->dia) ? +1 : -1;
                  }

                  }
                 */

                $result = mysqli_query($link, $consulta);
                $numResult = 0;
                if (isset($_POST['checkEdad'])) {
                    $edadCalculada;
                    $edad1 = $_POST['edad1'];
                    $edad2 = $_POST['edad2'];
					
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

                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            
                          $edadCalculada = calcularEdad($row['fecha_nacimiento']);
                        if (($edadCalculada >= $edad1) && ($edadCalculada <= $edad2)) {
                            $numResult++;
                            echo '<div class="row-fluid">
		<div class="span8"><table class="table table-bordered table-hover table-condensed">
  
  <tr>
    <th>Nombre</th>
    <td>' . $row['nombres'] . '</td>
    <th>Celular</th>
    <td>' . $row['celular'] . '</td>
    
  </tr>
  <tr>
    <th>Apellidos</th>
    <td>' . $row['apellidos'] . '</td>
    <th>Email</th>
    <td>' . $row['email'] . '</td>
    
  </tr>
  <tr>
    <th>Genero</th>
    <td>';

                            if ($row['genero'] == 1) {
                                echo "Masculino";
                            } else if ($row['genero'] == 2) {
                                echo "Femenino";
                            }

                            echo '</td>
    <th>Ciudad</th>
    <td>' . $row['ciudad'] . '</td>
    
  </tr>
  <tr>
    <th>Fecha Nacimiento (DD-MM-AAAA)</th>
    <td>';

                            $nuevaFecha = preg_split("[-]", $row['fecha_nacimiento']);
                            echo $nuevaFecha[2] . "-" . $nuevaFecha[1] . "-" . $nuevaFecha[0];

                            echo '</td>
    <th>Barrio</th>
    <td>' . $row['barrio'] . '</td>
    
  </tr>
  <tr>
    <th>Acudiente</th>
    <td>' . $row['acudiente'] . '</td>
    <th>Estrato</th>
    <td>' . $row['estrato'] . '</td>
    
  </tr>
  <tr>
    <th>Tipo Documento</th>
    <td>';

                            if ($row['tipo_doc'] == 1) {
                                echo "C.C";
                            } else if ($row['tipo_doc'] == 2) {
                                echo "T.I";
                            } else {
                                echo "R.C";
                            }

                            echo'</td>
    <th>Comuna</th>
    <td>' . $row['comuna'] . '</td>
   
  </tr>
  <tr>
    <th>No documento</th>
    <td>' . $row['no_documento'] . '</td>
    <th>Grupo Poblacional</th>
    <td>';

                            if ($row['grupo_poblacional'] == 1) {

                                echo "Ninguno";
                            } else if ($row['grupo_poblacional'] == 2) {
                                echo "Desplazado";
                            } else if ($row['grupo_poblacional'] == 3) {
                                echo "Madre cabeza de familia";
                            } else if ($row['grupo_poblacional'] == 4) {
                                echo "Afrodescendiente";
                            } else if ($row['grupo_poblacional'] == 5) {
                                echo "Discapacitado";
                            } else if ($row['grupo_poblacional'] == 6) {
                                echo "LGBTI";
                            } else if ($row['grupo_poblacional'] == 7) {
                                echo "Victima del conflicto urbano";
                            } else if ($row['grupo_poblacional'] == 8) {
                                echo "Adulto Mayor";
                            }
                            echo '</td>
    
  </tr>
   <tr>
    <th>Telefono</th>
    <td>' . $row['telefono'] . '</td>
    <th>Edad</th>
    <td>';
                            $edad = calcularEdad($row['fecha_nacimiento']);
                            echo $edad;
                            echo '</td>
    
  </tr>
</table>
</div>
<div class="span4">';
                            echo '<div class="img-thumbnail">';
                            echo '<img src="fotosPerfil/' . $row['fileName'] . '"></img>';
                            echo '</div>
	</div></div><div class="separacion"></div>
';
                        }   
                            
                     
                     
                    }
                } else {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $numResult++;
                        
                        echo '<div class="row-fluid"><div class="span8"> <table class="table table-bordered table-hover table-condensed">
  
  <tr>
    <th>Nombre</th>
    <td>' . $row['nombres'] . '</td>
    <th>Celular</th>
    <td>' . $row['celular'] . '</td>
    
  </tr>
  <tr>
    <th>Apellidos</th>
    <td>' . $row['apellidos'] . '</td>
    <th>Email</th>
    <td>' . $row['email'] . '</td>
    
  </tr>
  <tr>
    <th>Genero</th>
    <td>';

                        if ($row['genero'] == 1) {
                            echo "Masculino";
                        } else if ($row['genero'] == 2) {
                            echo "Femenino";
                        }

                        echo '</td>
    <th>Ciudad</th>
    <td>' . $row['ciudad'] . '</td>
    
  </tr>
  <tr>
    <th>Fecha Nacimiento (DD-MM-AAAA)</th>
    <td>';

                        $nuevaFecha = preg_split("[-]", $row['fecha_nacimiento']);
                        echo $nuevaFecha[2] . "-" . $nuevaFecha[1] . "-" . $nuevaFecha[0];

                        echo '</td>
    <th>Barrio</th>
    <td>' . $row['barrio'] . '</td>
    
  </tr>
  <tr>
    <th>Acudiente</th>
    <td>' . $row['acudiente'] . '</td>
    <th>Estrato</th>
    <td>' . $row['estrato'] . '</td>
    
  </tr>
  <tr>
    <th>Tipo Documento</th>
    <td>';

                        if ($row['tipo_doc'] == 1) {
                            echo "C.C";
                        } else if ($row['tipo_doc'] == 2) {
                            echo "T.I";
                        } else {
                            echo "R.C";
                        }

                        echo'</td>
    <th>Comuna</th>
    <td>' . $row['comuna'] . '</td>
   
  </tr>
  <tr>
    <th>No documento</th>
    <td>' . $row['no_documento'] . '</td>
    <th>Grupo Poblacional</th>
    <td>';

                        if ($row['grupo_poblacional'] == 1) {

                            echo "Ninguno";
                        } else if ($row['grupo_poblacional'] == 2) {
                            echo "Desplazado";
                        } else if ($row['grupo_poblacional'] == 3) {
                            echo "Madre cabeza de familia";
                        } else if ($row['grupo_poblacional'] == 4) {
                            echo "Afrodescendiente";
                        } else if ($row['grupo_poblacional'] == 5) {
                            echo "Discapacitado";
                        } else if ($row['grupo_poblacional'] == 6) {
                            echo "LGBTI";
                        } else if ($row['grupo_poblacional'] == 7) {
                            echo "Victima del conflicto urbano";
                        } else if ($row['grupo_poblacional'] == 8) {
                            echo "Adulto Mayor";
                        }
                        echo '</td>
    
  </tr>
   <tr>
    <th>Telefono</th>
    <td>' . $row['telefono'] . '</td>
    <th>Edad</th>
    <td>';
                        $edad = calcularEdad($row['fecha_nacimiento']);
                        echo $edad;
                        echo '</td>
    
  </tr>
</table>
</div>

<div class="span4">';
                        echo '<div class="img-thumbnail">';
                        echo '<img src="fotosPerfil/' . $row['fileName'] . '"></img>';
                        echo '</div>
	</div></div><div class="separacion"></div>
';      
                        
                    }
                }
                if($numResult == 0){
                    echo '</br><h1>'."La busqueda no arrojo resultados".'</h1>';
                    
                }


                mysqli_close($link);
            }
            ?>
        
    </div>
               
    </div>
</section>

<!--Bottom-->
<section id="bottom" class="main">
    <!--Container-->
    <div class="container">

        <!--row-fluids-->
        <div class="row-fluid">

            <!--Contact Form-->
            <div class="span3">
                <h4>Direccion</h4>
                <ul class="unstyled address">
                    <li>
                        <i class="icon-home"></i><strong>Direccion:</strong> Cra 76b # 108-52<br>Medellin, Colombia
                    </li>
                    <li>
                        <i class="icon-envelope"></i>
                        <strong>Email: </strong> casamiavidaycultura@gmail.com
                    </li>
                    <li>
                        <i class="icon-globe"></i>
                        <strong>Website:</strong> www.corpcasamia.org
                    </li>
                    <li>
                        <i class="icon-phone"></i>
                        <strong>Telefono:</strong> +57 (4) 273 79 97
                    </li>
                </ul>
            </div>
            <!--End Contact Form-->

             <!--Important Links-->
			<!--
            <div id="tweets" class="span3">
                <h4>OUR COMPANY</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Copyright</a></li>
                        <li><a href="#">We are hiring</a></li>
                        <li><a href="#">Clients</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>  
            </div>
            <!--Important Links-->

            <!--Archives-->
			<!--
            <div id="archives" class="span3">
                <h4>ARCHIVES</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="#">December 2012 (1)</a></li>
                        <li><a href="#">November 2012 (5)</a></li>
                        <li><a href="#">October 2012 (8)</a></li>
                        <li><a href="#">September 2012 (10)</a></li>
                        <li><a href="#">August 2012 (29)</a></li>
                        <li><a href="#">July 2012 (1)</a></li>
                        <li><a href="#">June 2012 (31)</a></li>
                    </ul>
                </div>
            </div>
            <!--End Archives-->
			<!--flickr
            <div class="span3 pull-right flickr">
                <h4>FLICKR GALLERY</h4>
                <div class="row-fluid first">
                    <ul class="thumbnails">
                      <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829540293/" title="01 (254) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75" height="75" alt="01 (254)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829537417/" title="01 (196) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75" height="75" alt="01 (196)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829527437/" title="01 (65) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75" height="75" alt="01 (65)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829524451/" title="01 (6) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75" height="75" alt="01 (6)"></a>
                    </li>
                </ul>
            </div>
            <div class="row-fluid">
                <ul class="thumbnails">
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829524451/" title="01 (6) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75" height="75" alt="01 (6)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829540293/" title="01 (254) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75" height="75" alt="01 (254)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829537417/" title="01 (196) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75" height="75" alt="01 (196)"></a>
                    </li>
                    <li class="span3">
                        <a href="http://www.flickr.com/photos/76029035@N02/6829527437/" title="01 (65) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75" height="75" alt="01 (65)"></a>
                    </li>
                </ul>
            </div>

        </div>
	<!--flickr-->
    </div>
    <!--/row-fluid-->
</div>
<!--/container-->

</section>
<!--/bottom-->

<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span5 cp">
                &copy; 2014 <a target="_blank" href="www.corpcasamia.org">Corporacion Casa Mia</a>. Todos los derechos reservados.
				Desarrollado por <a href="https://www.facebook.com/esaenz2010">Erick Saenz</a>
            </div>
            <!--/Copyright-->
<!--
            <div class="span6">
                <ul class="social pull-right">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-google-plus"></i></a></li>                       
                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                    <li><a href="#"><i class="icon-tumblr"></i></a></li>                        
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    <li><a href="#"><i class="icon-rss"></i></a></li>
                    <li><a href="#"><i class="icon-github-alt"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>                   
                </ul>
            </div>
-->
            <div class="span1 pull-right">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->

<!--  Login form -->
<div class="modal hide fade in" id="loginForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Login Form</h4>
    </div>
    <!--Modal Body-->
    <div class="modal-body">
        <form class="form-inline" action="index.html" method="post" id="form-login">
            <input type="text" class="input-small" placeholder="Email">
            <input type="password" class="input-small" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox"> Remember me
            </label>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        <a href="#">Forgot your password?</a>
    </div>
    <!--/Modal Body-->
</div>
<!--  /Login form -->

<script src="../../js/vendor/jquery-1.9.1.min.js"></script>
<script src="../../js/vendor/bootstrap.min.js"></script>
<script src="../../js/main.js"></script>   

</body>
</html>