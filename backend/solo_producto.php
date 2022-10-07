<?php
require_once 'conexion.php';

function get_soloproducto(){    
    $mysqli = getConn();    
    $id_producto = $_POST['id_envio'];    
    $query ="SELECT * FROM `productos` where id_producto = $id_producto";
    $resultado = mysqli_query($mysqli,$query);
    $json = array();
    while ($fila =  mysqli_fetch_array($resultado)){
        $json[]=array (
          'id_producto'=> $fila['id_producto'],    
          'cod_producto' => $fila['cod_producto'],       
          'nombre_producto' => $fila['nombre_producto'],
          'unidad'=> $fila['unidad'],
          'cantidad'=> $fila['cantidad'],
          'stock_min' => $fila['stock_min'],
          'precio_costo' => $fila['precio_costo'],
          'fecha_ingreso' => $fila['fecha_ingreso']
          
              
        );
    }
    $jsonstring = json_encode($json[0]);   
    return $jsonstring;
}
echo get_soloproducto();