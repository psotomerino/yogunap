<?php
require_once 'conexion.php';

function get_productos(){
    $mysqli = getConn();
    $query ="SELECT * FROM `productos` INNER JOIN produc_categoria ON produc_categoria.id_procategoria = productos.id_procategoria ORDER by produc_categoria.nombre_catergoria";
    $resultado = mysqli_query($mysqli,$query);
    $json = array();
    while ($fila =  mysqli_fetch_array($resultado)){
        $json[]=array (
          'id_producto' =>$fila['id_producto'], 
          'id_procategoria' =>$fila['id_procategoria'], 
          'cod_producto' =>$fila['cod_producto'], 
          'nombre_producto' =>$fila['nombre_producto'], 
          'unidad' =>$fila['unidad'], 
          'cantidad' =>$fila['cantidad'], 
          'precio_costo' =>$fila['precio_costo'], 
          'fecha_ingreso' =>$fila['fecha_ingreso'],
          'nomb_catego' =>$fila['nombre_catergoria']                 
        );
    }
    $jsonstring = json_encode($json);   
    return $jsonstring;
}
echo get_productos();