<?php
  require_once 'db_con.php';
  

  if (isset($_POST['submit'])) {
    $dni = $_POST['buscar'];

    $sql = 'SELECT * FROM votos WHERE dni = :dni';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['dni' => $dni]);
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  
  
</head>

<body>
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-5 mx-auto">
        <div class="card shadow">
           
          <div class="card-header">
            <h2><?= $row['dni'] ?></h2>
            
          </div>
          <div class="card-body">
            
            DNI:
            <input class="form-control" type="text" value="<?= $row['dni'] ?>" readonly>
            Apellido:
            <input class="form-control" type="text" value="<?= $row['apellido'] ?>" readonly>
            Nombre:
            <input class="form-control" type="text" value="<?= $row['nombre'] ?>" readonly>
            Direccion:
            <input class="form-control" type="text" value="<?= $row['direccion'] ?>" readonly>
            Circuito:
            <input class="form-control" type="text" value="<?= $row['circuito'] ?>" readonly>
            Mesa: 
            <input class="form-control" type="text" value="<?= $row['mesa'] ?>" readonly>
            Escuela:
            <input class="form-control" type="text" value="<?= $row['escuela'] ?>" readonly>
            Dir Escuela
            <input class="form-control" type="text" value="<?= $row['dir_escuela'] ?>" readonly>
            
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