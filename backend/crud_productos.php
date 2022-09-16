<?php
require_once 'conexion.php';

function get_productos(){
    $mysqli = getConn();
    $query ="SELECT * FROM `productos`";
    $resultado = mysqli_query($mysqli,$query);
    $json = array();
    while ($fila =  mysqli_fetch_array($resultado)){
        $json[]=array (
          'id_producto' =>$fila['id_producto'], 
          'id_procategoria' =>$fila['id_procategoria'], 
          'cod_producto' =>$fila['cod_producto'], 
          'nombre_producto' =>$fila['nombre_producto'], 
          'bodega' =>$fila['bodega'], 
          'cantidad' =>$fila['cantidad'], 
          'precio_costo' =>$fila['precio_costo'], 
          'fecha_ingreso' =>$fila['fecha_ingreso']                 
        );
    }
    $jsonstring = json_encode($json);   
    return $jsonstring;
}
echo get_productos();