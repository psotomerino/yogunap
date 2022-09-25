<?php
require_once 'conexion.php';

function get_clientes(){
    $mysqli = getConn();
    $query ="SELECT * FROM `clientes`";
    $resultado = mysqli_query($mysqli,$query);
    $json = array();
    while ($fila =  mysqli_fetch_array($resultado)){
        $json[]=array (
          'id_cliente' =>$fila['id_cliente'], 
          'cliente_codigo' =>$fila['cliente_codigo'], 
          'cedula' =>$fila['cedula'], 
          'nombres' =>$fila['nombres'], 
          'apellidos' =>$fila['apellidos'], 
          'direccion' =>$fila['direccion'], 
          'telefono' =>$fila['telefono'], 
          'mail' =>$fila['mail']                 
        );
    }
    $jsonstring = json_encode($json);   
    return $jsonstring;
}
echo get_clientes();