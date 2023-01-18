<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

  <title>Autocompletar búsqueda </title>


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

<body class="bg-info">
  <div class="container">
    <div class="row mt-4">
      <div class="col-md-8 mx-auto bg-light rounded p-4">
        <h5 class="text-center font-weight-bold">Autocompletar busqueda de Afiliados</h5>
        <hr class="my-1">
        <h5 class="text-center text-secondary">Buscador de DNI</h5>
        <form action="registro.php" method="post" class="p-3">
          <div class="input-group">
            <input type="text" name="buscar" id="buscar" class="form-control form-control-lg rounded-0 border-info" placeholder="Ingrese DNI">
            <div class="input-group-append">
              <input type="submit" name="submit" value="Buscar" class="btn btn-info btn-lg rounded-0">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 215px;">
        <div class="list-group" id="show-list">
          <!-- Aqui se muestra la lista -->
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="main.js"></script>
</body>
</html>