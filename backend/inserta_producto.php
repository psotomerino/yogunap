<?php
      
    $id_prodCatego =$_POST['id_catproduct'];
    $cod_produc =$_POST['cod_producto'];
    $nom_produc =$_POST['nom_producto'];
    $unidad =$_POST['unidad'];
    $cantidad =$_POST['cantidad'];
    $stock_min =$_POST['stock_min'];    
    $costo =$_POST['precio_costo'];
    $fecha_ingreso=$_POST['fecha_ingreso'];
    
    require ("mi_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");
     
    //echo $id_prodCatego;
    
    $consulta = "INSERT INTO productos(
               id_procategoria,
               cod_producto,
               nombre_producto,
               unidad,  
               cantidad,
               stock_min,
               precio_costo,            
               fecha_ingreso                             
                )VALUES(?,?,?,?,?,?,?,?)";

    $resu =mysqli_prepare($conexion, $consulta);
    $ok = mysqli_stmt_bind_param($resu,"ssssssss",
                        $id_prodCatego,
                        $cod_produc,
                        $nom_produc,
                        $unidad,
                        $cantidad,
                        $stock_min,
                        $costo,
                        $fecha_ingreso
                        
                        );
    
    $ok = mysqli_stmt_execute($resu);
   
     if($ok = false){
        echo "error en la consulta";
     }else{
        echo "Producto ingresodo correctamente";
     }
    mysqli_stmt_close($resu);
    



    
?>