<?php

//datos.php

include('dbconect.php');

$column = array("dni", "apellido", "nombre", "direccion", "circuito", "escuela", "dirigente");

$query = "SELECT * FROM empleados ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE dni LIKE "%'.$_POST["search"]["value"].'%" 
 OR apellido LIKE "%'.$_POST["search"]["value"].'%" 
 OR dirigente LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY dni asc ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['dni'];
 $sub_array[] = $row['apellido'];
 $sub_array[] = $row['nombre'];
 $sub_array[] = $row['direccion'];
 $sub_array[] = $row['circuito'];
 $sub_array[] = $row['escuela'];
 $sub_array[] = $row['dirigente'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM empleados";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>
