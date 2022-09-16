jQuery(document).ready(function(){
    productos_categoria();
    crud_productos();
    $('.contenedor_2').hide();
    $('.contenedor_categorias').hide();
    $('.contenedor_productos').hide();
    
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
        $(".contenedor_0").fadeIn(700);
        },700);
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
        $('.contenedor_productos').hide();
    })
    $(document).on('click','#btn_proveedores', function(){        
        $('.contenedor_categorias').hide();
        $('.contenedor_productos').hide();
    })
    $(document).on('click','#btn_productos', function(){        
        $('.contenedor_categorias').hide();
        $('.contenedor_productos').show();
    })
//*** crear categorias de productos */
$(document).on('click','#crea_cat',function(e){
    e.preventDefault();
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
           productos_categoria();
    
         }

        });
})
//**Crud categorias productos */
function productos_categoria(){
    $.ajax({
      url: '../../backend/crud_catproducts.php',
      type: 'POST',      
    })
    .done(function(listas_products_catego){
    var i = 1;  
    var listas = JSON.parse(listas_products_catego);
    var template='';
    listas.forEach(lista =>{
            template+= `
            <tr elmentoid="${lista.id_catproduct}">

               <td>${i++}</td>                   
               <td>${lista.nombre_categ}</td>
               <td> <i class='bx bx-edit-alt'id="editar_usu"></i> &nbsp;
                    <i class='bx bxs-user-x' id="borrar_usu"></i> 
               </td>   
                
            </tr>`;                
            $('#listados_categoria').html(template);
           
          });
    /*$('#tot_plan').html(i);   
    console.log (listas);
    console.log (i);*/   
    })
    .fail(function(){
      alert('Hubo un errror al cargar los usuarios');
    });  

}
//***** Cargar categoirias productos********
$.ajax({
  type: 'POST',
  url: '../../backend/carga_catproducts.php',
  })
  .done(function(listas_categorias_product){
      //alert (listas_materias);  
      $('#cat_product').html(listas_categorias_product); 
      
  })
  .fail(function(){
      alert ('hubo un error al cargar la lista de categorias de productos ');
  })

  $(document).on('click','#cat_product', function(){
    var id_catporduc = $('#cat_product').val();   
    $('#id_catproduct').val(id_catporduc);
  }); 
  $(document).on('click','#btn_new_produc',function(){
    $('#ingreso_productos').modal('show');
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();    
    document.getElementById("fecha_ingreso").value =year + "-" + month + "-" + day; 
  });

//** graba producto****/    
$(document).on('click','#carga_producto_',function(e){
  e.preventDefault();
  var _formCargaP = $("#new_product");      
  var datos = new FormData($("#new_product")[0]);                
    $.ajax({
        url: '../../backend/inserta_producto.php',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function(datos)
        {
          alert(datos);
          _formCargaP[0].reset();
          $('#ingreso_productos').modal('hide');
          crud_productos();
  
  
        }

       });
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
             <td>${lista.bodega}</td>
             <td>${lista.cantidad}</td>
             <td>${lista.precio_costo}</td>
             <td>${lista.fecha_ingreso}</td>

             <td> <i class='bx bx-edit-alt'id="editar_product"></i> &nbsp;
                  <i class='bx bxs-user-x' id="borrar_product"></i> 
             </td>   
              
          </tr>`;                
          $('#listados_productos').html(template);
         
        });
  /*$('#tot_plan').html(i);   
  console.log (listas);
  console.log (i);*/   
  })
  .fail(function(){
    alert('Hubo un errror al cargar los usuarios');
  });  

}

//*******FIN DE TODO******    
})