		  <?php
                            require('conexion.php');
							
							$doc = $_POST['doc'];
                            $consulta = "SELECT id FROM usuarios WHERE no_documento = '$doc'";
                            $result = mysqli_query($link, $consulta);
							
							$row_cnt = mysqli_num_rows($result);
							if($row_cnt > 0){
							echo 1;
							}else{
							echo 0;						
							}
                            ?>
