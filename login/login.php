<?php

    
    include '../templates/header.html';
    include '../templates/footer.html';

    session_start();
    if(isset($_SESSION['usuario'])){
		if($_SESSION['usuario']['tipo_usuario']== "Admin"){
			header('Location: ../main_app/admin/');
            
		}else if($_SESSION['usuario']['tipo_usuario']== "bodega"){
			header('Location: ../main_app/bodega/');
		}else if($_SESSION['usuario']['tipo_usuario']== "supervisor"){
			header('Location: ../main_app/supervisor/');
		}/*else if($_SESSION['usuario']['tipo_usuario']== "estudiante"){
			header('Location: main_app/estudiante/');
		}else if($_SESSION['usuario']['tipo_usuario']== "curricular"){
			header('Location: /main_app/curriculares/');
		}*/
	}
    //header('location: ../../login/login.php');

?>                          
<style>
    #espacio_{
        height: 15px;
    }
    #yogu_2{
        width: 25%;
    }
</style>
<link rel="stylesheet" href="../css/para_login.css">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <div id="espacio_"></div>
      
        <form action="" id="formlg">
          <input type="text" id="login" class="fadeIn second" name="usuariolg" pattern="[A-Za-z0-9_-]{1,15}" requeired placeholder="Usuario">
          <input type="password" id="_password" class="fadeIn third" name="passlg" pattern="[A-Za-z0-9_-]{1,15}" requiered placeholder="Password">
          <input type="submit" class="botonlg" value="Iniciar Sesión">
        </form>
  </div>
  <img src="../imagenes/youg_2.png" alt="" id="yogu_2">
</div>
<script src="../js/para_login/main.js"></script>


