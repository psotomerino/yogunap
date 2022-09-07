<?php
    include 'templates/header.html';
    include 'templates/footer.html';
?>
<style>
    .contenedor_index{
        width: 100%;
        margin: 0 auto;
    }
    #logo{
        width: 100%;
    }
    #boton_ingreso{
        width: 100%;
        margin-top: 50px;
        font-size: 25px;
    }
    #menu_index{
        width: 100%;
        background-color: #34495E;
        height: 60px;
        color: white;
        font-size: 18px;
    
    }
</style>
<div class="contenedor_index">
   <div id="menu_index">
      <center>
        aqui irá los botones que conforman el menu 
      </center>
       
   </div>
    <img src="imagenes/yogu_4.png" alt="" id="logo">
    <div id="boton_ingreso">
       <center>
        <button class="btn-success" onclick="location.href='https://yogunap.jireh.edu.ec/login/login.php'">INGRESAR</button>      
       </center>
    </div>

</div>

