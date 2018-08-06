<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualizar</title>

        <!-- CSS de Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/mystyle.css" rel="stylesheet" media="screen">
        <link href="../css/font-awesome.min.css" rel="stylesheet" media="screen">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/busqueda.js"></script>
        <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container fondo">
            <nav class="row menu navbar navbar-fixed-top" role="navigation">
                <div class="col-md-2">
                    <a id="logo" class="pull-right" href="index.html"></a>
                </div>
                <div class="col-md-10 menu">

                    <div class="btn-group">
                        <button type="button" class="btn btn-danger">Inicio</button>
                        <div class="btn-group pull-left">
                            <button type="button" class="btn btn-danger">Menu Principal</button>

                            <button type="button" class="btn btn-danger dropdown-toggle"
                                    data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Desplegar menú</span>
                            </button>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Acción #1</a></li>
                                <li><a href="#">Acción #2</a></li>
                                <li><a href="#">Acción #3</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Acción #4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="row titulo">
                <div class="col-md-12">
                    <h1 class="pull-left">Busqueda Usuarios</h1>
                    <ol class="breadcrumb pull-right padding">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="../index.html">Servicios Administrativos</a></li>
                        <li><a href="../base_de_datos.html">Base de datos</a></li>
                        <li class="active">Busqueda Usuarios</li>
                    </ol>
                </div>
            </div>

            <div class="row separacion">
            </div>
            <div class="row ">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <form role="form" action="Actualizar2.php" method="post">
                        <h3>Seleccione el usuario a actualizar</h3>
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
                                <button type="submit" name="enviar" value="enviar" class="btn btn-default">Enviar</button>
                            </span>
                        </div>

                    </form>
                </div>
                <div class="col-md-4 pull-left">
                </div>


            </div>


            


        </div>
        <!-- Librería jQuery requerida por los plugins de JavaScript -->
        <script src="http://code.jquery.com/jquery.js"></script>

        <!-- Todos los plugins JavaScript de Bootstrap (también puedes
             incluir archivos JavaScript individuales de los únicos
             plugins que utilices) -->
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>