jQuery(document).ready(function(){

    $('.contenedor_2').hide();
    $('.contenedor_categorias').hide();
    
     $(document).on('click','#btn_yo', function(){
        
        var id_de_usuario = $('#este_usuario').val();
        editar_usuario(id_de_usuario);
        //alert (id_de_usuario); 
        $('.contenedor_2').show();
        

    });    

    function editar_usuario(id_de_usuario){
        let id = id_de_usuario;
        var id_envio ={"id_envio":id};     
            
        $.ajax({
          url: '../../backend/editar_usuario.php',
          type: 'POST',
          data: id_envio,
          beforeSend: function(){
                        /*document.getElementById("loading_full").style.display="block";
                        document.getElementById("loading_full").innerHTML="<img id='img_lo' src='../../imagenes/loding_1.gif' width='300' height='300'>"; */
                        $('.contenedor_3').hide();
                         $('.contenedor_4').show();
                        
                    },   
            success: function (editusuario){
            console.log (editusuario);
            /*document.getElementById("loading_full").style.display="none";*/  
            const usuarioE = JSON.parse(editusuario);
            let nombres = usuarioE.nombre +' '+ usuarioE.apellido;    
            $('#Id_usuarioynE').val(usuarioE.Id_usuarioyn);
            $('#cedulaE').val(usuarioE.Cedula);
            $('#nombreE').val(usuarioE.Apellido); 
            $('#apellidoE').val(usuarioE.Nombre); 
            $('#fecha_nacE').val(usuarioE.Fecha_Naci); 
            $('#sexoE').val(usuarioE.Sexo); 
            $('#fono_contacto_1E').val(usuarioE.Contacto); 
            $('#mailE').val(usuarioE.Mail); 
            $('#statusE').val(usuarioE.Status); 
                
            $('#yo_cedula').text(usuarioE.Cedula);
            $('#yo_nombre').text(usuarioE.Apellido);
            $('#yo_apellido').text(usuarioE.Nombre);
            $('#yo_fecha_naci').text(usuarioE.Fecha_Naci);    
            $('#yo_sexo').text(usuarioE.Sexo);
            $('#yo_contacto').text(usuarioE.Contacto);
            $('#yo_mail').text(usuarioE.Mail);  
          }    
        });  
   }
    
    $(document).on('click','#btn_inventario', function(){
        /*setTimeout(function() {
        $(".contenedor_1").fadeOut(1000);
        },1000);*/
        setTimeout(function() {
        $(".contenedor_0").fadeIn(1000);
        },1000);
        $('.contenedor_2').hide();
        $('.contenedor_1').hide();
        
    })
    $(document).on('click','#btn_home',function(){
    setTimeout(function() {
        $(".contenedor_1").fadeIn(1000);
        },1000);
        $('.contenedor_2').hide();
        $('.contenedor_0').hide();
        $('.contenedor_categorias').hide();
            
    })
    $(document).on('click','#btn_categorias', function(){
        
        $('.contenedor_categorias').show();
    })
    
    

//*******FIN DE TODO******    
})