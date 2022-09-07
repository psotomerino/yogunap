<?php
    
    
    $id_usuarioP=$_POST['Id_usuarioynP'];
    $perfil =$_POST['perfil'];
    $Nick =$_POST['usuarioP'];
    $Password =$_POST['passwordP'];
    
    require ("mi_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");

    $consulta = "INSERT INTO login_yn(
                Id_usuarioyn,
                Tipo_usuario,
                Nick,
                Password              
                )VALUES(?,?,?,?)";

    $resu =mysqli_prepare($conexion, $consulta);
    $ok = mysqli_stmt_bind_param($resu,"ssss",
                        $id_usuarioP, 
                        $perfil,          
                        $Nick,                        
                        $Password 
                        );
    
    $ok = mysqli_stmt_execute($resu);
   
     if($ok = false){
        echo "error en la consulta";
     }else{
        echo "registro correcto vericar en la lista de usuarios";
     }
    mysqli_stmt_close($resu);
    



    
?>