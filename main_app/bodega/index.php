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
<link rel="stylesheet" href="css/para_index.css">

<!-- <style>
    .formulario_reg{
        margin-top: 20px;
        color:black;
    }
    .contenedor_dash{
        width: 18%;
        float: left;
    }

</style> -->
<div class="contenedor">
    <div class="row">
       <div class="col-12">
        <?php include '../menu_superior.php'; ?>   
       </div>
    </div>
</div>
<div class="grid-container g-0">
  <div class="grid-item" id="product_"><p><img src="../../imagenes/yogurt.png" class="img_" alt=""></p><p>PRODUCTOS</p></div>
  <div class=""></div>
  <div class=""></div>
  <div class=""></div>
  <div class=""></div>
  <div class=""></div>

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
<button type="button" class="btn btn-success" id="btn_new_produc" data-bs-toggle="" data-bs-target="#ingreso_productos">Nuevo producto </button>
</div>
<br>
<div class="col-10">
    <table id="" class="table table-bordered table-hover table-striped">
    <thead class="thead-light">
        <tr>
            <th>Codigo</th>
            <th>Descripcion/Nombre</th>
            <th>Bodega</th>                     
            <th>Acciones</th>

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
            <input type="hidden" class="form-control mt-2 " id="id_catproduct" name="id_catproduct" placeholder="id_catproducto "> 
            <input type="text" class="form-control mt-2"id="cod_producto" name="cod_producto" placeholder ="codigo de producto">
            <input type="text" class="form-control mt-2 " id="nom_producto" name="nom_producto" placeholder ="nombre del producto">
             <select name="bodega_num" id="bodega_num" class="form-control mt-2">
                <option value="1">Bodega 1</option>
                <option value="2">Bodega 2</option>
                <option value="2">Bodega 3</option>
            </select>
            <!--<input type="number" class="form-control mt-2" id="cantidad" name="cantidad" placeholder ="cantidad">
            <input type="text" class="form-control mt-2" id="precio_costo" name="precio_costo" placeholder ="precio del producto"> -->
            <input type="text" class="form-control mt-2 " id="fecha_ingreso" name="fecha_ingreso" readonly >
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="carga_producto_">CARGAR PRODUCTO</button> 
      </div>
    </div>
  </div>
</div>
<script src="js/para_index.js"></script>
<!-- Scrollable modal -->
