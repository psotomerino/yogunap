<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
        header('location: https://yogunap.jireh.edu.ec/');
        exit();
    }
    include '../../templates/cortina.php';
    include '../../templates/header.html';
    include '../../templates/footer.html';
    include 'form_perfiles.php';
    include 'form_actperfil.php';
    

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
    #menu_1{
        display: inline;
    }
    .contenedor_2{
        width: 40%;
        float: left;
        color: black;
        
    }
    .contenedor_4{
        margin-top: 20px;
        width: 40%;
        float: left;
        color: black;
        
    }
    .contenedor_3{
        
        color: black;
        font-size: 15px;
        
    }
    .contenedor_5{
        margin-top: 20px;
        width: 40%;
        float: left;
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
              <div class="enlace" id="btn_listarU">
                <i class="bx bx-user"></i>
                <span>Usuarios</span>  
              </div>
              <div class="enlace" id="btn_registroU">
                <i class='bx bx-user-plus'></i>
                <span>Nuevo</span>  
              </div>
              <!--<div class="enlace">
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

<!--    <div class="row">-->
        
        <div>

            <form role="form" id="formulario_new_reg">
                <div class="form-group">
                    <b>Número de Cédula / Pasaporte</b><input required type="text" class="form-control" id="cedula" name="cedula"> 
                    <b>Nombres</b><input required type="text" class="form-control" id="nombre" name="nombre">
                    <b>Apellidos</b><input required type="text" class="form-control" id="apellido" name="apellido"> 
                    <b>Fecha de nacimiento</b><input type="date" class="form-control" id="fecha_nac" name="fecha_nac"> 
                    <b>Sexo</b><select  class="form-control" id="sexo" required name="sexo">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                    </select>
                    <b>Número de contacto</b><input  required type="text" class="form-control" id="fono_contacto_1" name="fono_contacto_1"> 
                    <b>Correo Electronico</b><input required type="text" class="form-control" id="mail" name="mail">
                    <b>Status</b><select  class="form-control" id="status" required name="status">
                                <option value="Activo">Activo</option>
                                <option value="In-activo">In-activo</option>                                            
                    </select>
                    <p class="btn btn-lg btn-primary btn-block mt-2" id="btn_registro">Registrar</p>
                </div> 
            </form>
        </div>
</div>
<div class="contenedor_3">
    <div class="row">
       <div class="col-12">
            <table id="" class="table table-bordered table-hover table-striped">
       <thead class="thead-light">
           <tr>
               <th>Ord</th>
               <th>Nombres</th>
               <th>Apellidos</th>
               <th>Contacto</th>
               <th>Mail</th>
               <th>Perfil</th>
               <th>Status</th>
               <th >Acciones</th>
           </tr>
         
       </thead>
       <tbody id="listados_usuR"></tbody>
       
    </table>    
        </div>
    </div>
    
</div>
<div class="contenedor_4">
<!--    <div class="row">-->
        
        <div>

            <form role="form" id="formulario_edit_reg">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="Id_usuarioynE" name="Id_usuarioynE">   
                    <b>Número de Cédula / Pasaporte:</b><input required type="text" class="form-control" id="cedulaE" name="cedulaE">
                    <b>Nombres</b><input required type="text" class="form-control" id="nombreE" name="nombreE">
                    <b>Apellidos</b><input required type="text" class="form-control" id="apellidoE" name="apellidoE">
                    <b>Fecha de nacimiento</b><input type="date" class="form-control" id="fecha_nacE" name="fecha_nacE">
                    <b>Sexo</b><select  class="form-control" id="sexoE" required name="sexoE">
                            <option value=""></option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                    </select> 
                    <b>Número de contacto</b><input  required type="text" class="form-control" id="fono_contacto_1E" name="fono_contacto_1E">
                    <b>Correo Electronico</b><input required type="text" class="form-control" id="mailE" name="mailE">
                    <b>Status</b><select  class="form-control" id="statusE" required name="statusE">
                                <option value="Activo">Activo</option>
                                <option value="In-activo">In-activo</option>                                            
                    </select>
                    <p class="btn btn-lg btn-success btn-block mt-2" id="btn_registro_edit">Actualizar</p>
                   
                </div>                
            </form>
        </div>
</div>
<div class="contenedor_5">
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
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>

<script src="../../js/para_registroU/registro_U.js"></script>

