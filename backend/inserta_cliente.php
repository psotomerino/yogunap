<?php 

    $codigo=$_POST['cod_cliente'];
    $cedula=$_POST['cedula'];
    $nombre=$_POST['nombres'];
    $apellido=$_POST['apellidos'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $mail=$_POST['mail'];
    $estado=$_POST['estado'];
      
    require ("mi_conexion.php");
    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
	if(mysqli_connect_errno()){
	       echo "Fallo al conectar con la BBDD";
           exit();
		};
	mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
	mysqli_set_charset($conexion, "utf8");

    $consulta = "INSERT INTO clientes( 
                cliente_codigo, 
                cedula, 
                nombres, 
                apellidos, 
                direccion, 
                telefono, 
                mail,
                estado                           
                )VALUES(?,?,?,?,?,?,?,?)";

    $resu =mysqli_prepare($conexion, $consulta);
    $ok = mysqli_stmt_bind_param($resu,"ssssssss",
                    $codigo,
                    $cedula,
                    $nombre,
                    $apellido,
                    $direccion,
                    $telefono,
                    $mail,
                    $estado
                    );
    
    $ok = mysqli_stmt_execute($resu);
   
     if($ok = false){
        echo "error en la consulta";
     }else{
        echo "Cliente ingresado correctamente";
     }
    mysqli_stmt_close($resu);
    



    
?>