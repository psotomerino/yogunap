<?php
    $id_usuarioP=$_POST['id_envio'];   

    
    require ("mi_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");

    
    $busca_perfil ="SELECT * FROM `login_yn` where Id_usuarioyn =$id_usuarioP";
    $encontrado = mysqli_query($conexion,$busca_perfil);

    $row_cnt = $encontrado->num_rows;
    if ($row_cnt >= 1){
            //echo json_encode(array(success => 1));
            echo "1";
        }else {
            //echo json_encode(array(success => 0));
            echo "0";
        }  
?>