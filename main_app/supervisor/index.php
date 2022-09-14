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
<div class="contenedor_categorias">
    <div class="row mt-3">
        <div class="col-10">
        <table id="" class="table table-bordered table-hover table-striped">
        <thead class="thead-light">
           <tr>
               <th>Ord</th>
               <th>Nombre Categoria</th>
               <th >Acciones</th>
           </tr>
         
       </thead>
       <tbody id="listados_categoria"></tbody>
       
        </table>
        </div>
    </div>
    <hr>
    <div class="row mt-2 ml-3">
        <div><h4><b>Crear Categorias</b></h4><br></div>
    </div>  
    <div class="row  ml-3">
        <form role="form" id="form_categoria">
        <div class="form-group">
            <b>Nombre de la categoria</b><input required type="text" class="form-control" id="nom_cat" name="nom_cat">
            <button type="submit" class="btn btn-primary mt-1" id="crea_cat">Crear Categoria</button>
        </div>     
        </form> 
               
    </div>
</div>
<div class="contenedor_productos">
<div class="col-md-4" id="categoria_productos">
            <!-- <p><b>FILTRAR POR CATEGORIA PRODUCTOS</b>
            <select id="cat_product" name="cat_product" class="form-control">
            </select></p> -->
</div> 
<div class="col-md-2">
<button type="button" class="btn btn-success" id="btn_new_produc" data-bs-toggle="modal" data-bs-target="#ingreso_productos">Nuevo producto </button>
</div>
<br>
<div class="col-10">
    <table id="" class="table table-bordered table-hover table-striped">
    <thead class="thead-light">
        <tr>
            <th>Codigo</th>
            <th>Descripcion/Nombre</th>
            <th>Bodega</th>
            <th>Cantidad</th>
            <th>Precio costo</th>
            <th>Fecha de ingreso</th>

        </tr>         
       </thead>
       <tbody id="listados_productos"></tbody>
       
        </table>
        </div>
    </div>


</div>
<!-- **** MODAL INGRESO PRODUCTOS *** -->
<!-- Modal -->
<div class="modal fade" id="ingreso_productos" tabindex="-1" aria-labelledby="ingreso_productoslLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ingreso_productosLabel">INGRESO NUEVO PRODUCTO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-control" id="new_product">
            <select id="cat_product" name="cat_product" class="form-control mt-2">
            <input type="hidden" class="form-control mt-2 " id="id_catproduct" name="id_catproduct"> 
            <input type="text" class="form-control mt-2"id="cod_producto" name="cod_producto" placeholder ="codigo de producto">
            <input type="text" class="form-control mt-2 " id="nom_producto" name="nom_producto" placeholder ="nombre del producto">
            <select name="bodega_num" id="bodega_num" class="form-control mt-2">
                <option value="1">Bodega 1</option>
                <option value="2">Bodega 2</option>
                <option value="2">Bodega 3</option>
            </select>
            <input type="text" class="form-control mt-2" id="cantidad" name="cantidad" placeholder ="cantidad">
            <input type="text" class="form-control mt-2" id="precio_costo" name="precio_costo" placeholder ="precio del producto">
            <input type="date" class="form-control mt-2 " id="fecha_ingreso" placeholder ="fecha de ingreso">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<script src="../../js/para_supervisor.js"></script>
<!-- Scrollable modal -->
