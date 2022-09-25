<?php
require_once 'conexion.php';

function elimina_cliente(){
    
    $id_cliente =  $_POST['id_envio'];
    //echo $id_usu;
    $mysqli = getConn();    
    $query ="DELETE FROM clientes WHERE id_cliente= $id_cliente";
    $resultado = mysqli_query($mysqli,$query);    
    //echo "";
    echo "Registro borrado exitosamente";
    return;
    
}
echo elimina_cliente();