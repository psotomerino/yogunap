<?php
require_once 'conexion.php';

function get_cat_products(){
    $mysqli = getConn();
    $query ="SELECT * FROM `produc_categoria`";
    $resultado = mysqli_query($mysqli,$query);
    $json = array();
    while ($fila =  mysqli_fetch_array($resultado)){
        $json[]=array (
          'id_catproduct' =>$fila['id_procategoria'],    
          'nombre_categ' => $fila['nombre_catergoria']          
        );
    }
    $jsonstring = json_encode($json);   
    return $jsonstring;
}
echo get_cat_products();
