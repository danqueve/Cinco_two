<?php
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db= "padron";

        $conexion = new mysqli($server, $user, $pass, $db);
        if (mysqli_connect_errno()){
            echo 'No conectado', mysqli_connect_error();
        exit();
        }else{
            echo 'Conectado a la base de datos';
        }
?>