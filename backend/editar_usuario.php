<?php
require_once 'conexion.php';

function get_editusuario(){
    
    $mysqli = getConn();
    
    $id_usu = $_POST['id_envio'];
    
    
    $query ="SELECT 
    usuarios_yn.Id_usuarioyn, 
    usuarios_yn.Cedula, 
    usuarios_yn.Nombres, 
    usuarios_yn.Apellidos, 
    usuarios_yn.Contacto, 
    usuarios_yn.Fecha_Naci, 
    usuarios_yn.Sexo, 
    usuarios_yn.Mail, 
    usuarios_yn.Status, 
    login_yn.Tipo_usuario 
    FROM usuarios_yn LEFT JOIN login_yn on usuarios_yn.Id_usuarioyn = login_yn.Id_usuarioyn where usuarios_yn.Id_usuarioyn = $id_usu";
        
    $resultado = mysqli_query($mysqli,$query);
    
    $json = array();
    while ($fila =  mysqli_fetch_array($resultado)){
        $json[]=array (
          'Id_usuarioyn'=> $fila['Id_usuarioyn'],    
          'Cedula' => $fila['Cedula'],       
          'Apellido' => $fila['Nombres'],
          'Nombre'=> $fila['Apellidos'],
          'Fecha_Naci'=> $fila['Fecha_Naci'],
          'Sexo' => $fila['Sexo'],
          'Contacto' => $fila['Contacto'],
          'Mail' => $fila['Mail'],
          'Status' => $fila['Status'],
          'Perfil' => $fila['Tipo_usuario']
              
        );
    }
    $jsonstring = json_encode($json[0]);   
    return $jsonstring;
}
echo get_editusuario();