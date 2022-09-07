<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
        header('location: https://yogunap.jireh.edu.ec/');
        exit();
    }

    include '../../templates/header.html';
    include '../../templates/footer.html';
    

?>
<style>
    .capa_0{
       
        background-color: #3A3A3A;
        position: absolute;
        z-index: 4;
        width: 100%;
        height: 100%;

        
    } 
    #imag_{
        width: 20%;
        margin-top: 150px;
        margin-left: 0px;
    }
</style>
<center>
    <div class="capa_0" >
        <img src="../../imagenes/loading-icegif.gif" alt="" id="imag_">
        <p>YOGUNAP Cltda.</p>
    </div>
</center>   
 
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".capa_0").fadeOut(1500);
    },1500);    
});
</script>