
<select name="select1">	<option value="1">Number 1</option>	<option value="2"  
selected="selected">Number 2</option>	<option value="3">Number 3</option>	
<option value="4">Number 4</option></select>








<?php
// Consultar la base de datos

$consulta_mysql='select * from dirigente';
$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
  
echo "<select name='select1'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
    echo "<option value='".$fila['apellido']."'>".$fila['nombre']."</option>";
}
echo "</select>";

?>

