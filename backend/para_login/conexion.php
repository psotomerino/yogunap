<?php
    $mysqli = new mysqli('localhost','jirehedu','Pasm.2021jc','jirehedu_master');
    if($mysqli->connect_errno):
        echo "Error al conectarse con Mysql debido al error: ".$mysqli->connect_errno;
    endif;
    //echo "conexion correcta";
?>