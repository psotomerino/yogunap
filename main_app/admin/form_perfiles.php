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
    #capa_1{
        background-color: rgba(0,0,0,0.7);
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
    } 
    .form{
        color: black;
        position: relative;
        width: 30%;
        height: 55%;
        background-color: #EEE;
        top: 20%;
        margin: -25px 0 0 -25px; 
        padding: 20px;
        
    }
    .form1{
        font-size: 22px;
        font-family:fantasy;
    }
</style>
<div id="capa_1">
    <div class="form">
        <center> 
       <div class="row">
           <div class="col-12"><h3>ASIGNACION DE PERFIL </h3></div>
       </div>
        <div class="row">
            <div class=" col-12 form1"></div>
        </div>
        <div class="row">
            <div class="col-12">
               <form action="" id="form_perfiles">
                <input type="hidden" class="form-control" id="Id_usuarioynP" name="Id_usuarioynP">   
                    <select  class="form-control" id="perfil" required name="perfil">
                            <option value="">    </option>
                            <option value="bodega">Bodega</option>
                            <option value="caja">caja</option>
                            <option value="cantabilidad">contabilidad</option>
                            <option value="supervisor">supervisor</option>
                    </select> 
                    <b>Usuario</b><input  required type="text" class="form-control" id="usuarioP" name="usuarioP">
                    <b>Contraseña</b><input required type="text" class="form-control" id="passwordP" name="passwordP">
                    <!--<p class="btn btn-lg btn-primary btn-block mt-2" id="btn_asignarperfil">Asignar</p>
                    <p class="btn btn-lg btn-danger btn-block mt-2" id="btn_cancelar">Cancelar</p>-->
                    
                    <button type="submit" class="btn btn-success mt-4 mb-4" id="btn_asignarperfil">Asignar</button>               
                    <button class="btn btn-info  mt-4 mb-4 " id="btn_cancelar">Cancelar</button> 
                    
                    
                </form>    
            </div>
        </div>        
        </center> 
    </div>
</div>
<script src="../../js/para_formperfiles.js"></script>