<?php
  require_once 'db_con.php';
  

  if (isset($_POST['submit'])) {
    $dni = $_POST['buscar'];

    $sql = 'SELECT * FROM votos WHERE dni = :dni';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['dni' => $dni]);
    $row = $stmt->fetch();
  }

?>

<?php include "conn.php"; ?>
<!doctype html>
<html lang="en">
  <head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

	
    </head>
    <body>

    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="../afiliados/index.php">Afiliados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../dirigentes/index.php">Dirigentes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../carga/index.php">Cargar</a>
    </li>
  </ul>
</nav>
	

            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
				$dni	= mysqli_real_escape_string($conn,(strip_tags($_POST['dni'], ENT_QUOTES)));
				$apellido  	= mysqli_real_escape_string($conn,(strip_tags($_POST['apellido'], ENT_QUOTES)));
				$nombre 	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$direccion  = mysqli_real_escape_string($conn,(strip_tags($_POST['direccion'], ENT_QUOTES)));
				$circuito  = mysqli_real_escape_string($conn,(strip_tags($_POST['circuito'], ENT_QUOTES)));
				$escuela  = mysqli_real_escape_string($conn,(strip_tags($_POST['escuela'], ENT_QUOTES)));
				$dirigente  = mysqli_real_escape_string($conn,(strip_tags($_POST['dirigente'], ENT_QUOTES)));
				
		
				$insert = mysqli_query($conn, "INSERT INTO empleados(dni, apellido, nombre, direccion, circuito, escuela, dirigente)
				VALUES('$dni', '$apellido', '$nombre', '$direccion', '$circuito', '$escuela', '$dirigente')") or die
				("Problemas al insertar".mysqli_error());
		if($insert){
		echo header("Location: index.php");
		die();;
		}else{
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
		}
				
			}
			?>
            
           
			<body>
			<section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="assets/images/user.png">
                </div>
                <div class="form-group">
				<form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST" >

				<label class="control-label" for="dni">DNI</label>
                  <input type="text" name="dni" class="form-control _ge_de_ol" type="text" value="<?= $row['dni'] ?>" readonly >
                
                         
				<label class="control-label" for="apellido">Apellido</label>
				<input type="text" name="apellido" class="form-control _ge_de_ol" type="text" value="<?= $row['apellido'] ?>" readonly >
										
				<label class="control-label" for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control _ge_de_ol" type="text" value="<?= $row['nombre'] ?>" readonly >						 					 										

				<label class="control-label" for="direccion">Direccion</label>
				<input type="text" name="direccion" class="form-control _ge_de_ol" type="text" value="<?= $row['direccion'] ?>" readonly >		

				<label class="control-label" for="circuito">Circuito</label>
				<input type="text" name="circuito" class="form-control _ge_de_ol" type="text" value="<?= $row['circuito'] ?>" readonly >							

				<label class="control-label" for="escuela">Escuela</label>
				<input type="text" name="escuela" class="form-control _ge_de_ol" type="text" value="<?= $row['escuela'] ?>" readonly >							
				 <br>

				
											
										
								<?php
  													$mysqli = new mysqli('localhost', 'root', '', 'padron');
										?>

                                        <div class="control-group">
											
										<select name="dirigente">
        							<option  value="0">Seleccione:</option>
        								
										<?php
          									$query = $mysqli -> query ("SELECT * FROM dirigente");
         								 while ($valores = mysqli_fetch_array($query)) {
        								    echo '<option value="'.$valores[apellido].'">'.$valores[apellido].'</option>';
        								  }
        								?>	
      									</select>

										</div>
                                      

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary" >Registrar</button>
                                               <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
											</div>
										</div>
									</form>

                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
            
        </div>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      
    </body>
