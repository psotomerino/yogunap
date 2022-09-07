<?php
require_once 'conexion.php';

function elimina_usuario(){
    
    $id_usu =  $_POST['id_envio'];
   
    //echo $id_usu;
    $mysqli = getConn();    
    $query ="DELETE FROM usuarios_yn WHERE Id_usuarioyn= $id_usu";
    $resultado = mysqli_query($mysqli,$query);    
    //echo "";
    echo "Registro borrado exitosamente";
    return;
    
}
echo elimina_usuario();