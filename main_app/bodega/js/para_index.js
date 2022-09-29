jQuery(document).ready(function(){

    //$('.contenedor_2').hide();
    $('.contenedor_productos').hide();
    $('.contenedor_categorias').hide();
    crud_productos();
    
    //  $(document).on('click','#btn_yo', function(){        
    //     var id_de_usuario = $('#este_usuario').val();
    //     editar_usuario(id_de_usuario);
    //     //alert (id_de_usuario); 
    //     $('.contenedor_2').show();
    // });    

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
    
    $(document).on('click','#product_', function(){
      $('.contenedor_productos').show();
      $('.grid-container').hide();
        
    })
    $(document).on('click','#regresar', function(){        
      $('.grid-container').show();
      $('.contenedor_productos').hide();
      
   })
//** crud productos */
function crud_productos(){
  $.ajax({
    url: '../../backend/crud_productos.php',
    type: 'POST',      
  })
  .done(function(listas_productos){
  var i = 1;  
  var listas = JSON.parse(listas_productos);
  var template='';
  listas.forEach(lista =>{
          template+= `
          <tr elmentoid="${lista.id_producto}">                              
             <td>${lista.cod_producto}</td>
             <td>${lista.nombre_producto}</td>             
             <td>${lista.cantidad}</td>            
              
          </tr>`;                
          $('#listados_productos').html(template);
         
        });
  /*$('#tot_plan').html(i);   
  console.log (listas);
  console.log (i);*/   
  })
  .fail(function(){
    alert('Hubo un errror al cargar los productos');
  });  

}
//** CARGA LISTA DE CATEGORIAS */
$.ajax({
  type: 'POST',
  url: '../../backend/listado_categorias.php',
  })
  .done(function(listas_categorias){
      $('#cat_product').html(listas_categorias); 
      
  })
  .fail(function(){
      alert ('hubo un error al cargar la lista de categorias ');
  })
  //** INSERTA CATEGORIAS PRODUCTOS */
  $(document).on('click','#crea_cat',function(e){
    e.preventDefault();
    nom_cad = $('#nom_cat').val();    
    if ( nom_cad == ""){alert ("Antes de guardar categoria asegurese de haber escrito un nombre");exit();}
    var _formP = $("#form_categoria");      
    var datos = new FormData($("#form_categoria")[0]);                
      $.ajax({
         url: '../../backend/inserta_catergoria_produc.php',
         type: 'POST',
         data: datos,
         contentType: false,
         processData: false,
         success: function(datos)
         {
           alert(datos);
           _formP[0].reset();
           crud_productos();
         }
         });  
    
})


    
//*******FIN DE TODO******    
})