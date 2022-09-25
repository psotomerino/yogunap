<?php    
    $cedula = $_POST['id_envio'];
    $mysqli = new mysqli('','','','');
    if($mysqli->connect_errno):
        echo "Error al conectarse con Mysql debido al error: ".$mysqli->connect_errno;
    endif;

    if ($result = $mysqli->query("SELECT * FROM `clientes` where cedula= $cedula")) 
    {
        $row_cnt = $result->num_rows;
        //echo $row_cnt;
        if ($row_cnt >= 1){
           echo json_encode(array(success => 1));
        }else {
           echo json_encode(array(success => 0));
        }
        
    }
?>


    
