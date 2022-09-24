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
  <div class="grid-item" id="cliente_"><p><img src="../../imagenes/clientes.jpg" class="img_" alt=""></p><p>CLIENTES</p></div>
  <div class="grid-item" id="product_"><p><img src="../../imagenes/yogurt.png" class="img_" alt=""></p><p>PRODUCTOS</p></div>
  <div class=""></div>
  <div class=""></div>
  <div class=""></div>
  <div class=""></div>
  <div class=""></div>

</div>
<div class="contenedor_clientes">
<div class="col-md-4" id="categoria_clientes">
            <!-- <p><b>FILTRAR POR CATEGORIA PRODUCTOS</b>
            <select id="cat_product" name="cat_product" class="form-control">
            </select></p> -->
</div> 
<div class="col-md-2">
<button type="button" class="btn btn-success" id="btn_new_cliente" data-bs-toggle="modal" data-bs-target="#ingreso_clientes">Nuevo cliente </button> 

</div>
<br>
<button type="button" id="regresar" class= "btn btn-primary mb-3 ml-3">Regresar</button>
<br>
<div class="col-10">
    <table id="" class="table table-bordered table-hover table-striped">
    <thead class="thead-light">
        <tr>
            <th>Codigo</th>
            <th>Nombres</th>            
            <th>Direccion</th>
            <th>Contacto</th>
            <th>Acciones</th>
        </tr>         
       </thead>
       <tbody id=""></tbody>
       
        </table>
        </div>
    </div>
</div>
<div class="contenedor_productos">
<div class="col-md-4" id="categoria_productos">
            <!-- <p><b>FILTRAR POR CATEGORIA PRODUCTOS</b>
            <select id="cat_product" name="cat_product" class="form-control">
            </select></p> -->
</div> 
<div class="col-md-2">
<!-- <button type="button" class="btn btn-success" id="btn_new_produc" data-bs-toggle="" data-bs-target="#ingreso_productos">Nuevo producto </button> -->
</div>
<br>
<button type="button" id="regresar" class= "btn btn-primary mb-3 ml-3">Regresar</button>
<br>
<div class="col-10">
    <table id="" class="table table-bordered table-hover table-striped">
    <thead class="thead-light">
        <tr>
            <th>Codigo</th>
            <th>Descripcion/Nombre</th>            
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>         
       </thead>
       <tbody id="listados_productos"></tbody>
       
        </table>
        </div>
    </div>
</div>
<!-- **** MODAL INGRESO CLIENTES *** -->
<!-- Modal -->
<div class="modal fade" id="ingreso_clientes" tabindex="-1" aria-labelledby="ingreso_clienteslLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ingreso_clientesabel">INGRESO NUEVO CLIENTE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-control" id="new_cliente">
            <input type="text" class="form-control mt-2 " id="cedula" name="cedula" placeholder ="cédula">
            <div class="btn btn-info mt-1" id="val_cedula">validar cedula</div><br>
          <div class="continue_clienteform">
            <input type="text" class="form-control mt-2"id="cod_cliente" name="cod_cliente" placeholder ="Código de cliente">
              <input type="text" class="form-control mt-2" id="nombres" name="nombres" placeholder ="Nombres">
              <input type="text" class="form-control mt-2" id="apellidos" name="apellidos" placeholder ="Apellidos"> 
              <input type="text" class="form-control mt-2 " id="direccion" name="direccion" placeholder ="Dirección">
              <input type="text" class="form-control mt-2 " id="telefono" name="telefono" placeholder ="Teléfono">
              <input type="mail" class="form-control mt-2 " id="mail" name="mail" placeholder ="Correo Electrónico">
              <!-- <input type="text" class="form-control mt-2 " id="estado" name="estado" placeholder ="Apellidos"> -->
          </div>
        </form>

      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-secondary continue_clienteform" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success continue_clienteform" id="carga_cliente_">INGRESAR CLIENTE</button> 
        
      </div>
      <p id="cedula_?"></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="../../js/para_supervisor.js"></script>
<!-- Scrollable modal -->
<script src="js/para_index.js"></script>