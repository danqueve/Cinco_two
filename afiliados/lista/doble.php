<?php
        include "db_con.php";


   $sql= $con->query()("SELECT * FROM empleados e INNER JOIN dirigente d
        on e.dirigente = d.id limit 1   ");
        
        while ($row = $sql->fetch_array())
        {
    echo  $row ['dni']."".$row ['apellido']."".$row ['nombre']."".$row ['direccion']."".
             $row ['circuito']."".$row ['escuela']."";
          }

?>
