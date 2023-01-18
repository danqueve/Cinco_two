<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<body>

<div class="conteiner">
  <div class="row">
    <div class="col-sm-6">

    <form  method="POST">
     <td><center>Estatus:
     <select name="id_estatus">
    <?php
	
  $mysqli = new mysqli('localhost', 'root', '', 'padron');


    $query = query($conex, 'SELECT dni,apellido,nombre,circuito,escuela,dirigente FROM empleados');
 while ($datos=fetch_array($query)) {
   ?>
<option value="<?php echo $datos['dirigente']?>"><?php echo 
$datos['dirigente']?></option>
<?php
 }
 ?>
  </select></td>

</div>
</div>
</div>




  