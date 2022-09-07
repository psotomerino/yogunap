<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
        header('location: https://yogunap.jireh.edu.ec/');
        exit();
    }

    //include '../../templates/header.html';
    //include '../../templates/footer.html';
    

?>
<style>
    #capa_1ActP{
        background-color: rgba(0,0,0,0.7);
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
    } 
    .formActP{
        color: black;
        position: relative;
        width: 30%;
        height: 55%;
        background-color: #EEE;
        top: 20%;
        margin: -25px 0 0 -25px; 
        padding: 20px;
        
    }
    .form1ActP{
        font-size: 22px;
        font-family:fantasy;
    }
</style>
<div id="capa_1ActP">
    <div class="formActP">
        <center> 
       <div class="row">
           <div class="col-12"><h3>ACTUALIZACION DE PERFIL</h3></div>
       </div>
        <div class="row">
            <div class=" col-12 form1ActP"></div>
        </div>
        <div class="row">
            <div class="col-12">
               <form action="" id="form_perfilesActP">
                <input type="hidden" class="form-control" id="Id_usuarioynActP" name="Id_usuarioynActP">   
                    <select  class="form-control" id="perfilActP" required name="perfilActP">
                            <option value="bodega">Bodega</option>
                            <option value="caja">caja</option>
                            <option value="cantabilidad">contabilidad</option>
                            <option value="supervisor">supervisor</option>
                    </select> 
                    <b>Usuario</b><input  required type="text" class="form-control" id="usuarioActP" name="usuarioPActP">
                    <b>Contraseña</b><input required type="text" class="form-control" id="passwordActP" name="passwordActP">
                
                    <button type="submit" class="btn btn-success mt-4 mb-4" id="btn_actualiperfil">Actualizar</button>               
                    <p class="btn btn-info  mt-4 mb-4 " id="btn_cancelar">Cancelar</p>
                    
                    
                </form>    
            </div>
        </div>        
        </center> 
    </div>
</div>
<script src="../../js/para_formperfiles.js"></script>