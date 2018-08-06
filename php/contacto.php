<?php include_once "cabecera.html"; ?>

<?php
	error_reporting(0);
	if(isset($_POST['email']) AND ($_POST['enviar'])) {
		session_start();
		$mensaje_error = "";
		include 'config-formulario.php';
	 	require_once('recaptchalib.php');




  		$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

	
	
		if (!$resp->is_valid) {
    	 	$mensaje_error .= "Control Anti SPAM no es válido <br />";
  		}
	
	
		if(!isset($_POST['nombres']) ||
			!isset($_POST['apellidos']) ||
			!isset($_POST['email']) ||
			!isset($_POST['message'])		
			) {
			$mensaje_error .='Al Parecer tiene un problema con el Formulario <br />';		
		}
	
		
		$su_nombre = strip_tags($_POST['nombres']);
		$_SESSION['su_nombre'] = $su_nombre;
		
		$su_apellido = strip_tags($_POST['apellidos']);
		$_SESSION['su_apellido'] = $su_apellido;
		
		$email_de = strip_tags($_POST['email']);
		$_SESSION['email_de'] = $email_de;
		
		$su_comentario = strip_tags( $_POST['message']);
		$_SESSION['su_comentario'] = $su_comentario;
		
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	  if(preg_match($email_exp,$email_de)==0) {
		$mensaje_error .= 'La dirección Email no es válida<br />';
	  }
	  if(strlen($su_nombre) < 2) {
		$mensaje_error .= 'Ingrese su Nombre y Apellido<br />';
	  }
	  if(strlen(su_apellido) < 2) {
		$mensaje_error .= 'Ingrese su Nombre y Apellido<br />';
	  }
	  if(strlen($su_comentario) < 5) {
		$mensaje_error .= 'Su Mensaje no es válido.<br />';
	  }
	  
	  if(strlen($mensaje_error) > 0) {
				echo '
					<div class="alerta"> <b>ERROR AL ENVIAR EL FORMULARIO !</b><br /><br /> '.$mensaje_error.'</div>		
				';
	   }
	  
	  // Si todo está bien, entonces enviamos el mensaje Email

	  if (strlen($mensaje_error) == 0){ 
			 
			  
			$mensaje_email = "MENSAJE DEL FORMULARIO DE CONTACTO. <br /><br />";
			
			function clean_string($string) {
			  $bad = array("content-type","bcc:","to:","cc:");
			  return str_replace($bad,"",$string);
			}
			$su_comentario= nl2br ($su_comentario);
			
			$mensaje_email .= "Nombre: ".clean_string($su_nombre)."<br />";
			$mensaje_email .= "Apellido: ".clean_string($su_apellido)."<br />";
			$mensaje_email .= "Dirección Email: ".clean_string($email_de)."<br />";			
			$mensaje_email .= "Mensaje: ".clean_string($su_comentario)."<br />";

		   $cabeceras = 'From:'.$email_de."\r\n".
				'Reply-To:'. $email_de. "\r\n".
				'X-Mailer: PHP/' . phpversion().
				'Return-Path:' .$email_de."\r\n".
				'MIME-Version: 1.0' . "\r\n".
				'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		mail($enviar_a, $asunto, $mensaje_email, $cabeceras);
		header("Location: $pagina_confirmacion");
		echo "
		 <script>location.replace('".$pagina_confirmacion."')</script>
		";
	}
}
?>

<body>

    <!--Header-->
    <header class="navbar navbar-fixed-top">
	<div id="MyHeader">
	<!--<div id="logo0">	<a id="logo" class="pull-left" href="index.html"></a>	</div>	-->
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
                        <li><a href="../servicios.html">Servicios</a></li>
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

    <section class="no-margin" style="margin-top:6%;">
        <iframe src="https://www.google.com/maps/d/embed?mid=zAxbWBVIwvn0.ksq_Z5YVTy0Q" width="100%" height="480"></iframe>
    </section>

    <section id="contact-page" class="container">
        <div class="row-fluid">
		<div class="span8">
                       
                  <div class="row-fluid" style="background:#fff;">
                    <div class="span1">
					</div>
					<div class="span5">
					<h3>Formulario de Contacto</h3>
                <div class="status alert alert-success" style="display: none"></div>
				<p>Campo Requerido *</p>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="contacto.php">
                        <label for="nombres">Nombres *</label>
                        <input name="nombres" id="nombres" type="text" class="input-block-level" required="required" placeholder="Ingrese sus nombres">
                        <label for="apellidos">Apellidos *</label>
                        <input name="apellidos" id="apellidos" type="text" class="input-block-level" required="required" placeholder="Ingrese sus apellidos">
                        <label for="email">Email *</label>
                        <input name="email" id="email" type="email" class="input-block-level" required="required" placeholder="Ingrese su email">
                    
					<span>
				<?php
				include 'config-formulario.php';
				require_once('recaptchalib.php');          
				echo recaptcha_get_html($publickey);
				?>
				</span>
				</br>
				<input type="submit" style="float:left;" class="btn btn-primary btn-large" name="enviar" value="Enviar">
					</br>
					</br>
					</div>
					
					<div class="span5">
					</br>
					</br>
					</br>
					</br>
					
					
					<label>Mensaje *</label>
                        <textarea name="message" id="message" required="required" class="input-block-level" rows="8"></textarea>
                    
					
					</div>
					
					</form>
					<div class="span1">
					</div>
					</div>
                    
				
        </div>

<div class="span3">
  <h3>Donaciones</h3>
             <p>
			 <b>BANCO BENEFICIARIO:</b>Bancolombia
            </p>
            <p>
            <b>CUENTA No: </b>10362989253
            </p>
            <p>
             <b>BENEFICIARIO:</b> Corporacion Casa Mia   
            </p>
            <p>
            <b>DIRECCIÓN:</b> Cra 76b # 108 - 52  
            </p>
			<p>
            <b>CIUDAD:</b> Medellin 
            </p>
			<p>
            <b>PAIS:</b> Colombia  
            </p>            
        </div>
		
		<div class="span1">
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
            <div class="span4">                <h4>Contacto</h4>                <ul class="unstyled address">                    <li>                        <i class="icon-home"></i><strong>Direccion:</strong> Cra 76b # 108-52 - Medellin, Colombia                    </li>                    <li>                        <i class="icon-envelope"></i>                        <strong>Email: </strong> direccion@corpcasamia.org                    </li>                    <li>                        <i class="icon-globe"></i>                        <strong>Website:</strong> www.corpcasamia.org                    </li>                    <li>                        <i class="icon-phone"></i>                        <strong>Telefono:</strong> +57 (4) 273 79 97                    </li>                </ul>            </div>
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
            <div class="span6 cp">                &copy; 2015 <a target="_blank" href="www.corpcasamia.org">Corporacion Casa Mia</a>. Todos los derechos reservados.				Desarrollado por <a href="https://www.facebook.com/esaenz2010">Erick Saenz</a>            </div>            <!--/Copyright--><!--            <div class="span6">                <ul class="social pull-right">                    <li><a href="#"><i class="icon-facebook"></i></a></li>                    <li><a href="#"><i class="icon-twitter"></i></a></li>                    <li><a href="#"><i class="icon-pinterest"></i></a></li>                    <li><a href="#"><i class="icon-linkedin"></i></a></li>                    <li><a href="#"><i class="icon-google-plus"></i></a></li>                                           <li><a href="#"><i class="icon-youtube"></i></a></li>                    <li><a href="#"><i class="icon-tumblr"></i></a></li>                                            <li><a href="#"><i class="icon-dribbble"></i></a></li>                    <li><a href="#"><i class="icon-rss"></i></a></li>                    <li><a href="#"><i class="icon-github-alt"></i></a></li>                    <li><a href="#"><i class="icon-instagram"></i></a></li>                                   </ul>            </div>-->			<div class="span5">			</div>
            <div class="span1 pull-right">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->

<!--  Login form 
<div class="modal hide fade in" id="loginForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Login Form</h4>
    </div>
    <!--Modal Body--
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

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>   

</body>
</html>
