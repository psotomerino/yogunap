<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
        header('location: https://yogunap.jireh.edu.ec/');
        exit();
    }
    include '../../templates/cortina.php';
    include '../../templates/header.html';
    include '../../templates/footer.html';    

?>
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="../../css/para_indexAdmin.css">
<script src="../../js/para_indexAdmin.js" defer></script>
<style>
    .contenedor_1{
        /*margin-top: 5px;
        margin-left: 15px;*/
        width: 18%;
        /*background-color: aqua;*/
        float: left;
    }
    .contenedor_0{
        width: 99%;
        background-color: #31879B;
        display: none;
        
    }
    #menu_1{
        display: inline;
    }
   .contenedor_2{
        margin-top: 20px;
        width: 40%;
        float: left;
        color: black;
        
    }
    #mi_clave{
        color: orangered;
    }
    .btn_{
        padding: 15px;
        color:black;
        text-align: center;
        font-size: 18px;
        
    }
    .btn_:hover{
        background-color: greenyellow;
        
    }
    .contenedor_categorias{
        margin-left: 15px;
        margin-top: 5px;
        color: black;
        font-size: 15px;
    }
    .contenedor_productos{
        margin-left: 15px;
        margin-top: 5px;
        color: black;
        font-size: 15px;
    }
    #ingreso_productos{
        color: black;
    }
        
</style>
<div class="contenedor">
    <div class="row">
       <div class="col-12">
        <?php include '../menu_superior.php'; ?>   
       </div>
    </div>
</div>
<div class="contenedor_0">
    <div class="row">
        <a><div class="col-12 btn_" id="btn_home">
            Home
        </div></a>
        <a><div class="col-12 btn_" id="btn_categorias">
            Categorias
        </div></a>
        <a><div class="col-12 btn_" id="btn_proveedores">
            Proveedores
        </div></a>
        <a><div class="col-12 btn_" id="btn_productos">
            Productos
        </div></a>
    </div>    
</div>
<div class="contenedor_1">
    <div class="menu-dashboard">
    <!--   TOP MENU-->
        <div class="top-menu">
           <div class="toggle">
                <i class='bx bx-menu'></i> 
           </div><br>
    <!--MENU-->
           <div class="menu">
              <div class="enlace" id="btn_yo">
                <i class="bx bx-grid-alt"></i>
                <span>Mi perfil</span>  
              </div>
              <div class="enlace" id="btn_inventario">
                <i class='bx bx-barcode-reader'></i>
                <span>Inventarios</span>  
              </div>
              <!--<div class="enlace" id="btn_registroU">
                <i class='bx bx-user-plus'></i>
                <span>Nuevo</span>  
              </div>
              <div class="enlace">
                <i class='bx bxs-key'></i>
                <span>Perfiles</span>  
              </div>
              <div class="enlace" id="salir">
                <i class='bx bxs-log-out'></i>
                <span>Salir</span> 
              </div> -->  
           </div>

        </div>
    </div>
</div>
<div class="contenedor_2">
    <div class="table-responsive-md">
        <table class="table">
            <tr>
                <td>Cédula</td>
                <td id="yo_cedula"></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td id="yo_nombre"></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td id="yo_apellido"></td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td>
                <td id="yo_fecha_naci"></td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td id="yo_sexo"></td>
            </tr>
            <tr>
                <td>Contacto</td>
                <td id="yo_contacto"></td>
            </tr>
            <tr>
                <td>Mail</td>
                <td id="yo_mail"></td>
            </tr>
            <tr>
                <td id="mi_clave">cambiar mi clave</td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
