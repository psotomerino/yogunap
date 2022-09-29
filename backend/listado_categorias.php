<?php 
require_once 'conexion.php';

function getCategorias(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `produc_categoria`';
  $result = $mysqli->query($query);
  $categorias_product = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $categorias_product .= "<option value='$row[id_procategoria]'>$row[nombre_catergoria]</option>";
  }
  return $categorias_product;
}

echo getCategorias();