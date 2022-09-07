<?php
    $id =$_POST['Id_usuarioynActP'];
    $perfil =$_POST['perfilActP'];    
    $nick =$_POST['usuarioPActP'];
    $password =$_POST['passwordActP'];
    
   
    require ("mi_conexion.php");
    

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");
    //echo $password;

    $consulta = "UPDATE `login_yn` SET  
                Tipo_usuario ='$perfil',
                Nick ='$nick',
                Password ='$password'
                WHERE login_yn.Id_usuarioyn = $id ";

    $resultado = mysqli_query($conexion,$consulta);
    if(!$resultado){
        die ('Error en la consulta');
        }
	echo "tarea actualizada satisfactoriamente";
   
?>