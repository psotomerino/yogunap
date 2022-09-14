<?php 

    $nombre_catergoria=$_POST['nom_cat'];

    
    require ("mi_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");

    $consulta = "INSERT INTO produc_categoria(
                nombre_catergoria             
                )VALUES(?)";

    $resu =mysqli_prepare($conexion, $consulta);
    $ok = mysqli_stmt_bind_param($resu,"s",
                    $nombre_catergoria 
                    );
    
    $ok = mysqli_stmt_execute($resu);
   
     if($ok = false){
        echo "error en la consulta";
     }else{
        echo "Categoria creada correctamente";
     }
    mysqli_stmt_close($resu);
    



    
?>