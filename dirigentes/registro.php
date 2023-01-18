<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
            <?php include("head.php");?>
			<meta charset='utf-8'>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
 <title>Registro Dirigentes</title>
 <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
 <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
 <style>@import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box
}

body {
    background-color: #eee;
    height: 100vh;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to top, rgb(245, 186, 186) 10%, rgba(3, 97, 54, 0.4) 90%) no-repeat
}

.wrapper {
    max-width: 500px;
    border-radius: 10px;    
    margin: 50px auto;
    padding: 30px 40px;
    box-shadow: 20px 20px 80px rgb(206, 206, 206)
}

.h2 {
    font-family: 'Kaushan Script', cursive;
    font-size: 3.5rem;
    font-weight: bold;
    color: #aae427;
    font-style: italic
}

.h4 {
    font-family: 'Poppins', sans-serif
}

.input-field {
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: 1px solid #400485;
    color: #400485
}

.input-field:hover {
    color: #aae427;
    border: 1px solid #aae427
}

input {
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%;
    padding: 0px 2px;
    font-family: 'Poppins', sans-serif
}

.fa-eye-slash.btn {
    border: none;
    outline: none;
    box-shadow: none
}

a {
    text-decoration: none;
    color: #400485;
    font-weight: 700
}

a:hover {
    text-decoration: none;
    color: #aae427
}

.option {
    position: relative;
    padding-left: 30px;
    cursor: pointer
}

.option label.text-muted {
    display: block;
    cursor: pointer
}

.option input {
    display: none
}

.checkmark {
    position: absolute;
    top: 3px;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    cursor: pointer
}

.option input:checked~.checkmark:after {
    display: block
}

.option .checkmark:after {
    content: "";
    width: 13px;
    height: 13px;
    display: block;
    background: #aae427;
    position: absolute;
    top: 48%;
    left: 53%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s
}

.option input[type="radio"]:checked~.checkmark {
    background: #fff;
    transition: 300ms ease-in-out 0s;
    border: 1px solid #400485
}

.option input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1)
}

.btn.btn-block {
    border-radius: 20px;
    background-color: #400485;
    color: white
}

.btn.btn-block:hover {
    background-color: #55268be0
}

@media(max-width: 575px) {
    .wrapper {
        margin: 10px
    }
}

@media(max-width:424px) {
    .wrapper {
        padding: 30px 10px;
        margin: 5px
    }

    .option {
        position: relative;
        padding-left: 22px
    }

    .option label.text-muted {
        font-size: 0.95rem
    }

    .checkmark {
        position: absolute;
        top: 2px
    }

    .option .checkmark:after {
        top: 50%
    }

    #forgot {
        font-size: 0.95rem
    }
}</style>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>

<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="../afiliados/index.php">Afiliados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../dirigentes/index.php">Dirigentes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../carga/index.php">Cargar</a>
  </li>
  
</ul>
 
    </head>
	<?php
			if(isset($_POST['input'])){
				$dni	= mysqli_real_escape_string($conn,(strip_tags($_POST['dni'], ENT_QUOTES)));
				$apellido  	= mysqli_real_escape_string($conn,(strip_tags($_POST['apellido'], ENT_QUOTES)));
				$nombre 	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$celular  = mysqli_real_escape_string($conn,(strip_tags($_POST['celular'], ENT_QUOTES)));
				$circuito  = mysqli_real_escape_string($conn,(strip_tags($_POST['circuito'], ENT_QUOTES)));
			
				$insert = mysqli_query($conn, "INSERT INTO dirigente(dni, apellido, nombre, celular, circuito)
				VALUES('$dni', '$apellido', '$nombre', '$celular', '$circuito')") or die(mysqli_error());
				if($insert){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
				}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
				}
				
			}
			?>

	<body oncontextmenu='return false' class='snippet-body'>
                            <div class="wrapper bg-white">
    <div class="h2 text-center">Dirigentes</div>
    <div class="h4 text-muted text-center pt-2">Cargar Dirigentes</div>
    
	
	
	<form class="pt-3"  name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">
        
	
	<div class="form-group py-3">
            <div class="input-field"><input type="number" name="dni" id="dni" placeholder="DNI DEL DIRIGENTE" required> </div>
        </div>
        <div class="form-group py-2">
            <div class="input-field"><input type="text" name="apellido" id="apellido" placeholder="APELLIDO DEL DIRIGENTE" required> </div>
        </div>
		<div class="form-group py-2">
            <div class="input-field"><input type="text" name="nombre" id="nombre" placeholder="NOMBRE DEL DIRIGENTE" required> </div>
        </div>
		<div class="form-group py-2">
            <div class="input-field"><input type="number" name="celular" id="celular" placeholder="CELULAR DEL DIRIGENTE" required> </div>
        </div>
		<div class="form-group py-2">
            <div class="input-field"><input type="text" name="circuito" id="circuito" placeholder="CIRCUITO DEL DIRIGENTE" required> </div>
        </div>
		
        <div class="d-flex align-items-start">
            
            
        </div> 
		<button type="submit" name="input" id="input" class="btn btn-block text-center my-3">Registrar</button>
			<br>
		
        <a class="btn btn-danger text-center my-3" href="./index.php" role="button">SALIR</a>
		
        
    </form>
</div>
                            <script type='text/javascript'></script>
                            </body>
                        </html>
    
         
       
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
            
       

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      
    </body>
