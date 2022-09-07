<?php 
    include '../templates/header.html';
    include '../templates/footer.html';
    include '../../global/conexion.php';

    session_start();    
    $id_usuario =$_SESSION['usuario']['Id_usuarioyn'];
    //echo $id_usuario; 

    $sql = "SELECT * FROM `login_yn` INNER JOIN usuarios_yn on login_yn.Id_usuarioyn = usuarios_yn.Id_usuarioyn WHERE login_yn.Id_usuarioyn = $id_usuario";

    if ($resultado = mysqli_query($conexion,$sql)) {

    /* obtener array asociativo */
    while ($row = mysqli_fetch_assoc($resultado)) {
        $id_usuarioyn =$row["Id_usuarioyn"];
        $nombres = $row["Nombres"];
        $apellidos = $row["Apellidos"];
        $perfil = $row["Tipo_usuario"];
    }

    /* liberar el conjunto de resultados */
    //echo $nic;    
    mysqli_free_result($resultado);
}


?>
   <style>
    .menu_a{
        background-color:darkblue;
        height: 50px;
        width: 100%;
    }
    .text{
        color: aliceblue;
    }
</style>
<div class="row menu_a">
    <div class="col-8 text"><b>USUARIO:&nbsp  </b> <?php echo $nombres;?>&nbsp <?php  echo $apellidos; ?><br><b>Perfil:&nbsp</b><?php  echo $perfil; ?> <input type="hidden" id="este_usuario" value="<?php echo $id_usuarioyn?>"> </div>
    <div class="col-4"><a href="../salir_perfil.php"><p class="btn btn-success">TERMINAR SESSION</p></a> </div>
</div>
