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
  <li class="active">Usuario Eliminado</li>
</ul>
		</div>
		</div>
	<div class="row-fluid" style="background:#fff";>
		<div class="span1">
		</div>
		<div class="span11">
		<div class="row-fluid">
		<div class="span8">

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('conexion.php');
$idCargo = $_POST["id"];
$fechaInicio = $_POST["$fechaInicio"];

$consulta = "INSERT usuarios_eliminados SELECT * FROM usuarios WHERE id = '$id';";
$consulta .= "DELETE FROM usuarios WHERE id = '$id'";
if($result = mysqli_multi_query($link,$consulta)){
echo "<h3>Eliminacion Exitosa</h3>";
}
else{
echo "<h3>Error al eliminar</h3>";
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