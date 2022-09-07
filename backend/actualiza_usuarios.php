<?php
    $id =$_POST['Id_usuarioynE'];
    $cedula =$_POST['cedulaE'];    
    $apellido =$_POST['apellidoE'];
    $nombre =$_POST['nombreE'];
    $fecha_nac =$_POST['fecha_nacE'];
    $sexo =$_POST['sexoE'];
    $fono =$_POST['fono_contacto_1E'];
    $mail =$_POST['mailE'];
    $status =$_POST['statusE'];
   
    require ("mi_conexion.php");


    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");
    //echo $nombre;

    $consulta = "UPDATE `usuarios_yn` SET  
                Cedula ='$cedula',
                Apellidos ='$apellido',
                Nombres ='$nombre',
                Fecha_Naci ='$fecha_nac',
                Sexo ='$sexo',
                Contacto ='$fono',
                Mail ='$mail',
                Status ='$status'
                WHERE usuarios_yn.Id_usuarioyn = $id ";

    $resultado = mysqli_query($conexion,$consulta);
    if(!$resultado){
        die ('Error en la consulta');
        }
	echo "tarea actualizada satisfactoriamente";
    /*mysqli_stmt_close($resultado);
                ,
                ,
                
                ,
                ,
                ,
                */

?>