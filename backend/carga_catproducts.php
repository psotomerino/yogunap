<?php 
require_once 'conexion.php';

function get_categoria_product(){

  $mysqli = getConn();
  $query = 'SELECT * FROM produc_categoria';
  $result = $mysqli->query($query);
  $categoria_pro = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $categoria_pro.= "<option value='$row[id_procategoria]'>$row[nombre_catergoria]</option>";
         
  }
  return $categoria_pro;
 
}

echo get_categoria_product();

?>