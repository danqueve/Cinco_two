<?php

include ('conexiondb.php');

$sqldirigente = 'SELECT * FROM dirigente';
$resultadodirigente = $conexion->query($sqldirigente);

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
 <div class="container">
     <h1 align="center">Reportes de Dirigentes</h1>
       <br>
   <form action="#" method="POST" class="form-inline">
   <label for="" class="my-1 mr-2">Catergorias</label>
   <select name="cat" class="custom-select my-1 mr-sm-2" required>
   <option value="">Seleccionar</option>

   <?php foreach ($resultadodirigente as $apellidodirigente):?>
            
   <option value="<?php echo $apellidodirigente ['apellido'];?>"><?php echo $apellidodirigente['apellido'];?></option>
     
   <?php endforeach; ?>     
        
    </select>
    <button type="submit" name="mostrar" class="btn btn-primary my-1"> Mostrar </button>
    </form>
    <?php

        if (isset($_POST['mostrar'])) {
        $dirigenteseleccionado = $_POST['cat'];

        $sqldirigente ='SELECT SELECT empleados.dni, empleados.apellido, empleados.nombre, empleados.direccion, empleados.circuito, empleados.escuela, empleados.dirigente
        FROM empleados INNER JOIN dirigente  ON  empleados.dirigente=dirigente.apellido
        WHERE dirigente.dirigente = $dirigenteseleccionado ';

        $resultadodirigente = $conexion->query($sqldirigente);

    
     ?>
    
    <h4 align="center"> Lista de afiliados </h4>

    <table>
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Circuito</th>
                    <th>Escuela</th>
                    <th>Dirigente</th>

                </tr>
            </thead>
            <tbody>
               <?php
                    while ($registro =$resultadodirigente->fetch_array(MYSQLI_BOTH)){
                        echo "<tr>
                                <td>".$registro['dni']."</td>
                                <td>".$registro['apellido']."</td>
                                <td>".$registro['nombre']."</td>
                                <td>".$registro['direccion']."</td>
                                <td>".$registro['circuito']."</td>
                                <td>".$registro['escuela']."</td>
                                <td>".$registro['dirigente']."</td>
                                </tr>";
                    }
                    $conexion->close();
               ?>
    </tbody>
        </table>

        <?php
        }else{ 
            ?>
<?php            
        }
        ?>
 </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
  </html>