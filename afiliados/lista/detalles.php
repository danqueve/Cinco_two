<?php
  require_once 'db_con.php';
  

  if (isset($_POST['submit'])) {
    $documento = $_POST['buscar'];

    $sql = 'SELECT * FROM empleados WHERE dirigente = :dirigente';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['dirigente' => $dirigente]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }

?>
<style>
div.card-header {
  color: black;
  background-color: lightblue;
  text-align: center;
  border-style: ridge;
} 

div.card-body {
  color:black;
  background-color:#96c8a2;
  border-style: ridge;}
}

input.form-control {
  color:white;
  background-color:white;
}

</style>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Detalles</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  
  
</head>

<body>
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-5 mx-auto">
        <div class="card shadow">
           
          <div class="card-header">
            <h2><?= $row['dirigente'] ?></h2>
            
          </div>
          <div class="card-body">
            
            DNI:
            <input class="form-control" type="text" placeholder="<?= $row['dni'] ?>" readonly>
            Apellido:
            <input class="form-control" type="text" placeholder="<?= $row['apellido'] ?>" readonly>
            Nombre:
            <input class="form-control" type="text" placeholder="<?= $row['nombre'] ?>" readonly>
            Direccion:
            <input class="form-control" type="text" placeholder="<?= $row['direccion'] ?>" readonly>
            Circuito:
            <input class="form-control" type="text" placeholder="<?= $row['circuito'] ?>" readonly>
            Escuela:
            <input class="form-control" type="text" placeholder="<?= $row['escuela'] ?>" readonly>
           

            
            
          </div>
        </div>
        <div class="container-fluid">
    <button type="button" class="btn btn-primary btn-lg">Guardar</button>
    <br>
    <a href="index.php"> <button  type="button" class="btn btn-danger">Inicio</button>
    </div>
     </div>
    </div>
    
  </div>
</body>

</html>