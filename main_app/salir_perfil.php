<?php
    include '../templates/header.html';
    include '../templates/footer.html';
    
    session_start();
    $_SESSION=[];
    session_destroy();
    //echo ('su session ha finalizado');
    //header('location: https://yogunap.jireh.edu.ec/main_app/admin/#');
    

?>
<div>
    <p>Ha finalizado su session con exito</p>
    <a href="../index.php"><p class="btn btn-secondary ">IR A INICIO</p></a> 
</div>