<?php
    $cedula =$_POST['cedula'];
    $nombre =$_POST['nombre'];
    $apellido =$_POST['apellido'];
    $fecha_nac =$_POST['fecha_nac'];
    $sexo =$_POST['sexo'];
    $fono =$_POST['fono_contacto_1'];
    $mail =$_POST['mail'];
    $status =$_POST['status'];
   



    require ("mi_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");
//     echo $este_profe_id;
//     echo $asignatura;
//     echo $grado;
//     echo $num_estud;
//     echo $num_unid;
//     echo $titulo;
//     echo $video;
//     echo $destreza_1;
//     echo $destreza_2;
//     echo $destreza_3;
//     echo $lista_IE;
//     echo $eje;
//     echo $periodo;
//     echo $semana;
//     echo $IE_i;
//     echo $fecha_fin;
//     echo $texto_plan;
//     echo $texto_plata;
    
    $consulta = "INSERT INTO usuarios_yn(
                Cedula,
                Apellidos,
                Nombres,
                Fecha_Naci,
                Sexo,
                Contacto,
                Mail,
                Status                
                )VALUES(?,?,?,?,?,?,?,?)";

    $resu =mysqli_prepare($conexion, $consulta);
    $ok = mysqli_stmt_bind_param($resu,"ssssssss",
                        $cedula, 
                        $apellido,          
                        $nombre,                        
                        $fecha_nac, 
                        $sexo, 
                        $fono, 
                        $mail, 
                        $status 
                        );
    
    $ok = mysqli_stmt_execute($resu);
   
     if($ok = false){
        echo "error en la consulta";
     }else{
        echo "registro correcto vericar en la lista de usuarios";
     }
    mysqli_stmt_close($resu);
    

?>