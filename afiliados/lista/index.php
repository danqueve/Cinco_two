<?php
  require_once 'db_con.php';

?>
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

<div class="container">
  <h2>Form control: select</h2>
  <p>The form below contains two dropdown menus (select lists):</p>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="sel1">Select list (select one):</label>
      <select name="dirigente">
        							<option  value="0">Seleccione:</option>
        							
			<?php
      $query = $mysqli -> query ("SELECT * FROM dirigente");
       while ($valores = mysqli_fetch_array($query)) {
       echo '<option value="'.$valores[apellido].'">'.$valores[apellido].'</option>';
      			  }
      	?>	

      	</select>
      <br>
      <label for="sel2">Mutiple select list (hold shift to select more than one):</label>
      <select multiple class="form-control" id="sel2" name="sellist2">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


<select id="categoria" name="categoria">
    <?php
        while ($cat = mysqli_fetch_array($query1)) {
        $def='';
        if($cat['id_categoria']==$idCat){
            $def='selected';
        }
            //echo $cat;
    ?>
    <option value="<?php echo $cat['id_categoria'].','.$cat['descripcion_categoria'] ?>" <?php echo $def?> ><?php echo $cat['descripcion_categoria'] ?></option>
    <?php
        }
    ?>
</select>

</body>
</html> 