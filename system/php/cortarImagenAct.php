<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" />
    <script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Por favor, seleccione una region a recortar');
    return false;
  };

</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }


</style>
    
    </head>
    <body>
        <div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box">

<div class="page-header">

<h1>Reescalar Imagen Perfil</h1>
</div>

    
		<!-- This is the image we're attaching Jcrop to -->

                

		<!-- This is the form that our event handler fills -->
                <?php 
                
                require('conexion.php');	
                
$file = fopen("fotosPerfil/actualizado.txt", "r") or exit("Unable to open file!");
$id = fgets($file);
fclose($file);
$consulta = "SELECT fileName FROM usuarios WHERE id = '$id'";
$result = mysqli_query($link,$consulta);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$dir = "fotosPerfil/";
$fileName = $row["fileName"];
$dir .= $fileName;
//echo $dir;
echo '<img src="'.$dir.'" id="cropbox" />';

		echo '<form action="cortarImagenAct2.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
                        <input type="hidden" id="urlImage" name="urlImage" value="'.$dir.'"/>
			<input type="submit" value="enviar" class="btn btn-large btn-inverse" />
		</form>';

	?>	

	</div>
	</div>
	</div>
	</div>
        
    </body>
</html>

