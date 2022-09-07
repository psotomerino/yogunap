<?php
require_once 'conexion.php';

function get_usuarios(){
    $mysqli = getConn();
    $query ="SELECT 
        usuarios_yn.Id_usuarioyn, 
        usuarios_yn.Nombres, 
        usuarios_yn.Apellidos, 
        usuarios_yn.Contacto, 
        usuarios_yn.Mail, 
        usuarios_yn.Status, 
        login_yn.Tipo_usuario 
        FROM usuarios_yn LEFT JOIN login_yn on usuarios_yn.Id_usuarioyn = login_yn.Id_usuarioyn";
    $resultado = mysqli_query($mysqli,$query);
    
    $json = array();
    while ($fila =  mysqli_fetch_array($resultado)){
        $json[]=array (
          'id_usuario' =>$fila['Id_usuarioyn'],    
          'Nombre' => $fila['Nombres'],
          'Apellido'=> $fila['Apellidos'],
          'Contacto'=> $fila['Contacto'],
          'Mail' => $fila['Mail'],
          'Perfil' => $fila['Tipo_usuario'],  
          'status' => $fila['Status']
        );
    }
    $jsonstring = json_encode($json);   
    return $jsonstring;
}
echo get_usuarios();
