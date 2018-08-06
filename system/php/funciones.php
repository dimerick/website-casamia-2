<?php
/*funciones PHP*/

/*Script para generar consultas en bases de datos
si $respuesta["success"] == true es porque la consulta se ejecuto con exito y arrojo resultados
si $respuesta["success"] == false indica que hay un error en la consulta o la consulta no arrojo resultados, el error se notificara en $respuesta["error"]
$respuesta["numRows"] me indica cuantas filas fueron afectadas en la consulta
$respuesta["data"] contendra los resultados de la consulta en caso de que sea un select
*/
function ejecutarConsulta($sql, $c){
$respuesta = array();
$respuesta["success"] = false;
$respuesta["numRows"] = 0;
$respuesta["data"] = null;
$respuesta["error"] = "";

$q = ($c === null)?@mysqli_query($sql):@mysqli_query($c,$sql);
if($q) {

if(strpos(strtolower($sql),'select') === 0){
$respuesta["data"] = array();
while($r = mysqli_fetch_assoc($q)) {
$respuesta["data"][] = $r;
$respuesta["numRows"]++;
}
if($respuesta["numRows"] == 0){
$respuesta["error"] = "La consulta no arrojo resultados";
}else{
$respuesta["success"] = true;
}
} else {
$respuesta["numRows"] = ($c === null)?mysqli_affected_rows():mysqli_affected_rows($c);
if($respuesta["numRows"] == 0){
$respuesta["error"] = "La consulta no afecto ninguna fila";
}else{
$respuesta["success"] = true;
}
}
}else{
$respuesta["error"] = mysqli_error($c);
}
return $respuesta;
}
/*Script para generar consultas en bases de datos*/

/*Eliminia espacios al inicio y el final de una cadena*/
function eliminarEspacios($cadena){
$cadena = trim($cadena, " ");
return $cadena;
}

/*Agregar etiquetas articulo a la base de datos*/
function agregarEtiquetas($etiquetas, $link){
$etiquetasArt = explode(" ", $etiquetas);
foreach ($etiquetasArt as $etiqueta){
$consulta = "INSERT INTO etiqueta(nombre) VALUES ('$etiqueta')";
mysqli_query($link, $consulta);
}
return $etiquetasArt;
}
/*Agregar etiqueta articulo a la base de datos*/

/*crear ArticuloXEtiqueta*/
function artxetiq($articulo,$etiquetas, $link){
foreach ($etiquetas as $etiqueta){
$consulta = "INSERT INTO articuloxetiqueta(articulo, etiqueta) VALUES ('$articulo','$etiqueta')";
mysqli_query($link, $consulta);
}
}
/*crear ArticuloXEtiqueta*/


function primeraMayuscula($cadena){
$cadena = strtolower ($cadena);
$cadena = ucwords($cadena);
return $cadena;
}

/*ID ultimo articulo*/
function ultimoArt($link){
$consulta = "SELECT id FROM articulo ORDER BY id DESC";
$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$id= $row["id"];
mysqli_free_result($result);
return $id;
}
/*ID ultimo articulo*/

/*Redimensionar Imagen Articulo*/
function redimensionarImagen($rutaImagenOriginal){
//Creamos una variable imagen a partir de la imagen original
$img_original = imagecreatefromjpeg($rutaImagenOriginal);
//Se define el maximo ancho y alto que tendra la imagen final
$max_ancho = 600;
$max_alto = 400;
//Ancho y alto de la imagen original
list($ancho,$alto)=getimagesize($rutaImagenOriginal);
//Se calcula ancho y alto de la imagen final
$x_ratio = $max_ancho / $ancho;
$y_ratio = $max_alto / $alto;
//Si el ancho y el alto de la imagen no superan los maximos,
//ancho final y alto final son los que tiene actualmente
if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho
$ancho_final = $ancho;
$alto_final = $alto;
}
/*
* si proporcion horizontal*alto mayor que el alto maximo,
* alto final es alto por la proporcion horizontal
* es decir, le quitamos al ancho, la misma proporcion que
* le quitamos al alto
*
*/
elseif (($x_ratio * $alto) < $max_alto){
$alto_final = ceil($x_ratio * $alto);
$ancho_final = $max_ancho;
}
/*
* Igual que antes pero a la inversa
*/
else{
$ancho_final = ceil($y_ratio * $ancho);
$alto_final = $max_alto;
}
//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
$tmp=imagecreatetruecolor($ancho_final,$alto_final);
 
//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
 
//Se destruye variable $img_original para liberar memoria
imagedestroy($img_original);
//Definimos la calidad de la imagen final
$calidad=100;
//Se crea la imagen final en el directorio indicado
imagejpeg($tmp,$rutaImagenOriginal,$calidad);
}
/*Redimensionar Imagen Articulo*/

/*Generar ruta para articulo e imagen*/
function generarRutas($titulo, $ultimo, $link){
$titulo = strtolower($titulo);
$titulo = htmlentities($titulo);
$rutaArt = "articulos/";
$rutaArt .= str_replace(" ","-",$titulo);
$rutaImg = str_replace(" ","-",$titulo);
$rutaArt .= $ultimo;
$rutaImg .= $ultimo;
$rutaArt .= ".html";
$rutaImg .= ".jpg";
$rutas = array($rutaArt,$rutaImg);
return $rutas;
}

function poner_guion($titulo, $ultimo){
 $url = strtolower($titulo);
 //Reemplazamos caracteres especiales latinos
 $find = array('á','é','í','ó','ú','â','ê','î','ô','û','ã','õ','ç','ñ');
 $repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n');
 $url = str_replace($find, $repl, $url);
 //Añadimos los guiones
 $find = array(' ', '&amp;', '\r\n', '\n','+');
 $url = str_replace($find, '-', $url);
 //Eliminamos y Reemplazamos los demas caracteres especiales
 $find = array('/[^a-z0-9\-&lt;&gt;]/', '/[\-]+/', '/&lt;{^&gt;*&gt;/');
 $repl = array('', '-', '');
 $url = preg_replace($find, $repl, $url);
 $rutaArt = "articulos/";
 $rutaArt .=  $url;
 $rutaArt .= $ultimo;
 $rutaImg = $url;
 $rutaImg .= $ultimo;
 $rutaArt .= ".html";
$rutaImg .= ".jpg";
$rutas = array($rutaArt,$rutaImg);
return $rutas;
}

/*Generar ruta para articulo e imagen*/

/*Consultar nombre autor*/
function consultarAutor($id, $link){
$consulta = "SELECT  nombre, apellido FROM autor WHERE cedula = '$id'";
$result = mysqli_query($link, $consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nombreCompleto = $row["nombre"];
$nombreCompleto .= " ".$row["apellido"];
return $nombreCompleto;
}
/*Consultar nombre autor*/

/*Convertir Tildes a HTML*/
function tildesAHtml($cadena){ 
        return str_replace(array("á","é","í","ó","ú","ñ","Á","É","Í","Ó","Ú","Ñ"),
                                         array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;",
                                                    "&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Ntilde;"), $cadena);     
    }
/*Convertir Tildes a HTML*/

/*Guardar articulo*/
function guardarArticulo($titulo, $descripcion, $idAutor, $autor, $fecha, $etiquetas, $cuerpo, $rutaArt, $rutaImg){


$pagina = "
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\"> <!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <title>$titulo</title>
    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width\">
	
	<!-- share facebook-->
	<meta property=\"og:site_name\" content=\"Corporacion Casa Mia\" />
	<meta property=\"og:title\" content=\"$titulo\" />
	<meta property=\"og:type\" content=\"website\" />
	<meta property=\"og:image\" content=\"$rutaImg\" />
	<meta property=\"og:description\" content=\"$descripcion\" />
	<!-- share facebook-->

    <link rel=\"stylesheet\" href=\"../css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"../css/bootstrap-responsive.min.css\">
    <link rel=\"stylesheet\" href=\"../css/font-awesome.css\">
    <link rel=\"stylesheet\" href=\"../css/font-awesome.min.css\">
	<link rel=\"stylesheet\" href=\"../css/main.css\">
    <link rel=\"stylesheet\" href=\"../css/sl-slide.css\">
	<link rel=\"stylesheet\" href=\"../css/mystyle.css\">

    <script src=\"../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js\"></script>	
    <!-- Le fav and touch icons -->
    <link rel=\"shortcut icon\" href=\"../images/ico/favicon.png\">
    <link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"../images/ico/apple-touch-icon-144-precomposed.png\">
    <link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"../images/ico/apple-touch-icon-114-precomposed.png\">
    <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"../images/ico/apple-touch-icon-72-precomposed.png\">
    <link rel=\"apple-touch-icon-precomposed\" href=\"../images/ico/apple-touch-icon-57-precomposed.png\">
</head>

<body class=\"bodyBlog\">

    <!--Social Plugin-->
<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src =\"//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--Social Plugin-->

    <!--Header-->
    <header class=\"navbar\">
	<div id=\"MyHeader\">
	<!--<div id=\"logo0\">
	<a id=\"logo\" class=\"pull-left\" href=\"index.html\"></a>
	</div>
	-->
     </div>   
		<div class=\"navbar-inner\">
		
            <div class=\"container\">			
                <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </a>
               <!--Social-->	
                <div class=\"span6\">
                <ul class=\"social\">
                    <li><a href=\"https://facebook.com/Corp.CasaMia\"><i class=\"icon-facebook\"></i></a></li>
                    <li><a href=\"https://twitter.com/corpcasaMia\"><i class=\"icon-twitter\"></i></a></li>                         
                    <li><a href=\"https://youtube.com/channel/UC2KfvGBcqS02qyf9fSLJc7g\"><i class=\"icon-youtube\"></i></a></li>                                      
                </ul>
            </div>
			<!--Social-->
                <!--nav-collapse -->
                <div class=\"nav-collapse collapse pull-right navBlog\">
                    <ul class=\"nav\">
                        <li><a href=\"../index.html\">Inicio</a></li>
                        <li><a href=\"../quienes-somos.html\">Quienes Somos</a></li>
                        <li><a href=\"../programas.html\">Programas</a></li>
                        <li><a href=\"../servicios.html\">Servicios</a></li>
                        <!--
						<li class=\"dropdown\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Pages <i class=\"icon-angle-down\"></i></a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"career.html\">Career</a></li>
                                <li><a href=\"blog-item.html\">Blog Single</a></li>
                                <li><a href=\"faq.html\">FAQ</a></li>
                                <li><a href=\"pricing.html\">Pricing</a></li>
                                <li><a href=\"404.html\">404</a></li>
                                <li><a href=\"typography.html\">Typography</a></li>
                                <li><a href=\"registration.html\">Registration</a></li>
                                <li class=\"divider\"></li>
                                <li><a href=\"privacy.html\">Privacy Policy</a></li>
                                <li><a href=\"terms.html\">Terms of Use</a></li>
                            </ul>
                        </li>
						-->
                        <li class=\"active\"><a href=\"blog.html\">Blog</a></li> 
                        <li><a href=\"../php/contacto.php\">Contacto</a></li>
                        <!--
						<li class=\"login\">
                            <a href=\"admin/services.html\"><i class=\"fa fa-lock\"></i></a>
                        </li>
						-->
                    </ul>        
                </div>
				<!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->

<!--
    <section class=\"title\">
        <div class=\"container\">
            <div class=\"row-fluid\">
                <div class=\"span6\">
                    <h1>Blog</h1>
                </div>
                <div class=\"span6\">
                    <ul class=\"breadcrumb pull-right\">
                        <li><a href=\"index.html\">Home</a> <span class=\"divider\">/</span></li>
                        <li class=\"active\">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->         
    <section id=\"blog\" class=\"container main\">
    <div class=\"row-fluid\">
	<div class=\"span2\">
	
	</div>
	<div class=\"span6\">
	<div class=\"row-fluid\">
	<div class=\"span12\">
	<h2 class=\"titleArt\">$titulo</h2>
	<i class=\"icon-user\"></i> Por <a href=\"php/consultarAutor.php?id=$idAutor\" id=\"autor\">$autor</a> | <i class=\"icon-calendar\" id=\"fecha\"> $fecha</i>
	<img id=\"imgArt\" src=\"$rutaImg\"></img>
	</div>
	</div>
	<div class=\"row-fluid contEtique\">
	<div class=\"span12\">
	<ul id=\"etiquetas\">";
	
	for($i=0;$i<count($etiquetas);$i++){
	$pagina .= "<li><a href=\"buscarEtiqueta.php?id=$etiquetas[$i]\">$etiquetas[$i]</a></li>";
	}
		
	$pagina .= "</ul>
	</div>
	</div>
	<hr>
	<div class=\"row-fluid textArt\">
	<div class=\"span12\">
	$cuerpo
	</div>
	</div>
	<hr>
	<div class=\"row-fluid\">
	<div class=\"span12\" id=\"like-share\">
	<ul id=\"\">
	<li><div class=\"fb-like\" data-href=\"corpcasamia.org/$rutaArt\" data-layout=\"button_count\" data-action=\"like\" data-show-faces=\"true\" data-share=\"false\"></div>
	</li>
	<li>
	<div class=\"fb-share-button\" data-href=\"corpcasamia.org/$rutaArt\" data-layout=\"button_count\"></div>
	</li>
	</ul>
	</div>
	</div>
	<div class=\"row-fluid\">
	<div class=\"span12\" id=\"comentarios\">
	<div id=\"comments\" class=\"comments\">
	<div class=\"fb-comments\" data-href=\"corpcasamia.org/$rutaArt\" data-numposts=\"10\" data-colorscheme=\"light\"></div>

    </div>
	</div>
	</div>
	
	</div>
	<div class=\"span1\">
	</div>
	<div class=\"span2 columPost\">
	<h3>Post Recientes</h3>
	<div class=\"row-fluid\">	
	<div class=\"span12\">
	<ul class=\"thumbnails\" id=\"postRecent\">  
</ul>
	</div>
	</div>
	</div>
	<div class=\"span1\">
	</div>
	</div>

</section>

<!--Bottom-->
<section id=\"bottom\" class=\"main\">
    <!--Container-->
    <div class=\"container\">

        <!--row-fluids-->
        <div class=\"row-fluid\">

            <!--Contact Form-->
            <div class=\"span4\">
                <h4>Contacto</h4>
                <ul class=\"unstyled address\">
                    <li>
                        <i class=\"icon-home\"></i><strong>Direccion:</strong> Cra 76b # 108-52 - Medellin, Colombia
                    </li>
                    <li>
                        <i class=\"icon-envelope\"></i>
                        <strong>Email: </strong> direccion@corpcasamia.org
                    </li>
                    <li>
                        <i class=\"icon-globe\"></i>
                        <strong>Website:</strong> www.corpcasamia.org
                    </li>
                    <li>
                        <i class=\"icon-phone\"></i>
                        <strong>Telefono:</strong> +57 (4) 273 79 97
                    </li>
                </ul>
            </div>
            <!--End Contact Form-->
		
            <!--Important Links-->
			<!--
            <div id=\"tweets\" class=\"span3\">
                <h4>OUR COMPANY</h4>
                <div>
                    <ul class=\"arrow\">
                        <li><a href=\"#\">About Us</a></li>
                        <li><a href=\"#\">Support</a></li>
                        <li><a href=\"#\">Terms of Use</a></li>
                        <li><a href=\"#\">Privacy Policy</a></li>
                        <li><a href=\"#\">Copyright</a></li>
                        <li><a href=\"#\">We are hiring</a></li>
                        <li><a href=\"#\">Clients</a></li>
                        <li><a href=\"#\">Blog</a></li>
                    </ul>
                </div>  
            </div>
            <!--Important Links-->

            <!--Archives-->
			<!--
            <div id=\"archives\" class=\"span3\">
                <h4>ARCHIVES</h4>
                <div>
                    <ul class=\"arrow\">
                        <li><a href=\"#\">December 2012 (1)</a></li>
                        <li><a href=\"#\">November 2012 (5)</a></li>
                        <li><a href=\"#\">October 2012 (8)</a></li>
                        <li><a href=\"#\">September 2012 (10)</a></li>
                        <li><a href=\"#\">August 2012 (29)</a></li>
                        <li><a href=\"#\">July 2012 (1)</a></li>
                        <li><a href=\"#\">June 2012 (31)</a></li>
                    </ul>
                </div>
            </div>
            <!--End Archives-->

			<!-- flickr
            <div class=\"span3 pull-right flickr\">
                <h4>FLICKR GALLERY</h4>
                <div class=\"row-fluid first\">
                    <ul class=\"thumbnails\">
                      <li class=\"span3\">
                        <a href=\"http://www.flickr.com/photos/76029035@N02/6829540293/\" title=\"01 (254) by Victor1558, on Flickr\"><img src=\"http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg\" width=\"75\" height=\"75\" alt=\"01 (254)\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"http://www.flickr.com/photos/76029035@N02/6829537417/\" title=\"01 (196) by Victor1558, on Flickr\"><img src=\"http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg\" width=\"75\" height=\"75\" alt=\"01 (196)\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"http://www.flickr.com/photos/76029035@N02/6829527437/\" title=\"01 (65) by Victor1558, on Flickr\"><img src=\"http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg\" width=\"75\" height=\"75\" alt=\"01 (65)\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"http://www.flickr.com/photos/76029035@N02/6829524451/\" title=\"01 (6) by Victor1558, on Flickr\"><img src=\"http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg\" width=\"75\" height=\"75\" alt=\"01 (6)\"></a>
                    </li>
                </ul>
            </div>
            <div class=\"row-fluid\">
                <ul class=\"thumbnails\">
                    <li class=\"span3\">
                        <a href=\"http://www.flickr.com/photos/76029035@N02/6829524451/\" title=\"01 (6) by Victor1558, on Flickr\"><img src=\"http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg\" width=\"75\" height=\"75\" alt=\"01 (6)\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"http://www.flickr.com/photos/76029035@N02/6829540293/\" title=\"01 (254) by Victor1558, on Flickr\"><img src=\"http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg\" width=\"75\" height=\"75\" alt=\"01 (254)\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"http://www.flickr.com/photos/76029035@N02/6829537417/\" title=\"01 (196) by Victor1558, on Flickr\"><img src=\"http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg\" width=\"75\" height=\"75\" alt=\"01 (196)\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"http://www.flickr.com/photos/76029035@N02/6829527437/\" title=\"01 (65) by Victor1558, on Flickr\"><img src=\"http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg\" width=\"75\" height=\"75\" alt=\"01 (65)\"></a>
                    </li>
                </ul>
            </div>

        </div>
		Flickr -->
		
		<!--Usuarios Casa Mia
		
		<div class=\"span3 pull-right flickr\">
                <h4>NUESTROS USUARIOS</h4>
                <div class=\"row-fluid first\">
                    <ul class=\"thumbnails\">
                      <li class=\"span3\">
                        <a href=\"\" title=\"Erick Saenz\"><img src=\"images/usuarios/erick.jpg\" width=\"100\" height=\"100\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"\" title=\"01 (196) by Victor1558, on Flickr\"><img src=\"\" width=\"75\" height=\"75\" ></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"\" title=\"01 (65) by Victor1558, on Flickr\"><img src=\"\" width=\"75\" height=\"75\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"\" title=\"01 (6) by Victor1558, on Flickr\"><img src=\"\" width=\"75\" height=\"75\"></a>
                    </li>
                </ul>
            </div>
            <div class=\"row-fluid\">
                <ul class=\"thumbnails\">
                    <li class=\"span3\">
                        <a href=\"\" title=\"01 (6) by Victor1558, on Flickr\"><img src=\"\" width=\"75\" height=\"75\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"\" title=\"01 (254) by Victor1558, on Flickr\"><img src=\"\" width=\"75\" height=\"75\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"\" title=\"01 (196) by Victor1558, on Flickr\"><img src=\"\" width=\"75\" height=\"75\"></a>
                    </li>
                    <li class=\"span3\">
                        <a href=\"\" title=\"01 (65) by Victor1558, on Flickr\"><img src=\"\" width=\"75\" height=\"75\"></a>
                    </li>
                </ul>
            </div>

        </div>
		
		<!--Usuarios Casa Mia-->
		
    </div>
    <!--/row-fluid-->
</div>
<!--/container-->

</section>
<!--/bottom-->

<!--Footer-->
<footer id=\"footer\">
    <div class=\"container\">
        <div class=\"row-fluid\">
            <div class=\"span6 cp\">
                &copy; 2015 <a target=\"_blank\" href=\"www.corpcasamia.org\">Corporacion Casa Mia</a>. Todos los derechos reservados.
				Desarrollado por <a href=\"https://www.facebook.com/esaenz2010\">Erick Saenz</a>
            </div>
            <!--/Copyright-->
<!--
            <div class=\"span6\">
                <ul class=\"social pull-right\">
                    <li><a href=\"#\"><i class=\"icon-facebook\"></i></a></li>
                    <li><a href=\"#\"><i class=\"icon-twitter\"></i></a></li>
                    <li><a href=\"#\"><i class=\"icon-pinterest\"></i></a></li>
                    <li><a href=\"#\"><i class=\"icon-linkedin\"></i></a></li>
                    <li><a href=\"#\"><i class=\"icon-google-plus\"></i></a></li>                       
                    <li><a href=\"#\"><i class=\"icon-youtube\"></i></a></li>
                    <li><a href=\"#\"><i class=\"icon-tumblr\"></i></a></li>                        
                    <li><a href=\"#\"><i class=\"icon-dribbble\"></i></a></li>
                    <li><a href=\"#\"><i class=\"icon-rss\"></i></a></li>
                    <li><a href=\"#\"><i class=\"icon-github-alt\"></i></a></li>
                    <li><a href=\"#\"><i class=\"icon-instagram\"></i></a></li>                   
                </ul>
            </div>
-->
			<div class=\"span5\">
			</div>
            <div class=\"span1 pull-right\">
                <a id=\"gototop\" class=\"gototop pull-right\" href=\"#\"><i class=\"icon-angle-up\"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->

<!--  Login form -->
<div class=\"modal hide fade in\" id=\"loginForm\" aria-hidden=\"false\">
    <div class=\"modal-header\">
        <i class=\"icon-remove\" data-dismiss=\"modal\" aria-hidden=\"true\"></i>
        <h4>Login Form</h4>
    </div>
    <!--Modal Body-->
    <div class=\"modal-body\">
        <form class=\"form-inline\" action=\"index.html\" method=\"post\" id=\"form-login\">
            <input type=\"text\" class=\"input-small\" placeholder=\"Email\">
            <input type=\"password\" class=\"input-small\" placeholder=\"Password\">
            <label class=\"checkbox\">
                <input type=\"checkbox\"> Remember me
            </label>
            <button type=\"submit\" class=\"btn btn-primary\">Sign in</button>
        </form>
        <a href=\"#\">Forgot your password?</a>
    </div>
    <!--/Modal Body-->
</div>
<!--  /Login form -->


<script src=\"../js/vendor/bootstrap.min.js\"></script>
<script src=\"../js/main.js\"></script>
<script src=\"../js/jquery.min.js\"></script>
<script src=\"../js/postRecientes.js\"></script>

</body>
</html>";
$fichero_salida = "../../$rutaArt";
$fp=fopen($fichero_salida,"w");
fwrite($fp,$pagina);
fclose($fp);
if(file_exists($fichero_salida)){
return true;
}else{
return false;
}
}
/*Guardar articulo*/
?>