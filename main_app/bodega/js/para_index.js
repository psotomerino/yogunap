jQuery(document).ready(function(){

    $('.contenedor_productos').hide();
    $('.contenedor_categorias').hide();
    //crud_productos();
    esta_fecha();
    
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
//** fecha actual */
function esta_fecha(){
  date = new Date();
  year = date.getFullYear();
  month = date.getMonth() + 1;
  day = date.getDate();    
  document.getElementById("fecha_ingreso").value =year + "-" + month + "-" + day;
}   
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
             <td>${lista.nomb_catego}</td> 
             <td>${lista.nombre_producto}</td>  
             <td>${lista.cantidad}</td>           
             <td>${lista.unidad}</td>  
             <td>${lista.precio_costo}</td> 
             <td> <i class="fa-light fa-octagon-plus"></i>/ <i class='bx bxs-user-x' id="borrar_producto"></i>         
             
          </tr>`;                
          // $('#listados_productos').html(template);
         
        });
  /*$('#tot_plan').html(i);   
  console.log (listas);
  console.log (i);*/   
  })
  .fail(function(){
    alert('Hubo un errror al cargar los productos');
  });  

}
//** CRUD PRODUCTOS POR CATEGORIA */
function crud_productos_categoria(id_cat_prouct_form){
  let id_cate = id_cat_prouct_form;
  var id_envio ={"id_envio":id_cate}; 
  $.ajax({
    url: '../../backend/crud_productos_categoria.php',
    type: 'POST',
    data: id_envio,      
  })
  .done(function(listas_productos_catego){
  var i = 1;   
  var listas = JSON.parse(listas_productos_catego);
  //alert (listas); 
  if(listas == ""){
    $('#listados_productos').html("");
    alert ("No hay existencias para esta categoria");    
    exit();
  }
  var template='';
  listas.forEach(lista =>{
          template+= `
          <tr elmentoid="${lista.id_producto}">                              
             <td>${lista.cod_producto}</td>
             <td>${lista.nomb_catego}</td> 
             <td>${lista.nombre_producto}</td>  
             <td>${lista.cantidad}</td>           
             <td>${lista.unidad}</td>  
             <td>${lista.stock_min}</td>
             <td>${lista.precio_costo}</td> 
             <td> <span class="badge badge-success" id="btn_stock_mas" data-bs-toggle="modal" data-bs-target="#stock_mas">cargar stock </span> / <i class='bx bxs-user-x' id="borrar_producto"></i>         
             
          </tr>`;                
          $('#listados_productos').html(template);
         
        });

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
      $('#cat_product_form').html(listas_categorias);
      
  })
  .fail(function(){
      alert ('hubo un error al cargar la lista de categorias ');
  })

  $('#cat_product').on('change', function(){
    var id_cat_prouct = $('#cat_product').val();
    //alert (id_cat_prouct);id_catproduct
    $('#id_catproduct').val(id_cat_prouct);
       
  })    

  $('#cat_product_form').on('change', function(){
    var id_cat_prouct_form = $('#cat_product_form').val();
    //alert (id_cat_prouct_form);
    crud_productos_categoria(id_cat_prouct_form);

    
       
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
//** INSERTA PRODUCTOS  */
$(document).on('click','#carga_producto_',function(e){
  e.preventDefault();
  codigo_pro = $('#cod_producto').val(); 
  nombre_pro = $('#nom_producto').val();
  cantidad_pro = $('#cantidad').val();
  precio_pro = $('#precio_costo').val(); 
  stock_min = $('#stock_min').val();
  if ( codigo_pro == ""){alert ("Antes de guardar el producto asegurese de haber escrito un codigo de producto");exit();} 
  if ( nombre_pro == ""){alert ("Antes de guardar el producto asegurese de haber escrito un nombre de producto");exit();} 
  if ( cantidad_pro == ""){alert ("Antes de guardar el producto asegurese de haber escrito un cantidad");exit();} 
  if ( precio_pro == ""){alert ("Antes de guardar el producto asegurese de haber escrito un precio");exit();} 
  if ( stock_min == ""){alert ("Antes de guardar el producto asegurese de haber ingresado el stock de seguridad");exit();} 
  var _formP = $("#new_product");      
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
      _formP[0].reset();
      crud_productos();
      esta_fecha();
    }
    });
})

//********* PARA INCREMENTAR STOCK SOLO PRODUCTO **********
$(document).on('click','#btn_stock_mas',function(){
  let elemento = $(this)[0].parentElement.parentElement;
  let id_de_producto = $(elemento).attr('elmentoid');
  //alert (id_de_producto);  
  solo_producto(id_de_producto); 
});

//****SOLO UN PRODUCTO */
function solo_producto(id_de_producto){
  let id_producto = id_de_producto;
  var id_envio ={"id_envio":id_producto};             
  $.ajax({
    url: '../../backend/solo_producto.php',
    type: 'POST',
    data: id_envio,
    beforeSend: function(){
                  /*document.getElementById("loading_full").style.display="block";
                  document.getElementById("loading_full").innerHTML="<img id='img_lo' src='../../imagenes/loding_1.gif' width='300' height='300'>"; */
                  $('.contenedor_3').hide();
                   $('.contenedor_4').show();
                  
              },   
      success: function (solo_producto){
      console.log (solo_producto);
      const producto = JSON.parse(solo_producto);
      // 'id_producto'=> $fila['id_producto'],    
      // 'cod_producto' => $fila['cod_producto'],       
      // 'nombre_producto' => $fila['nombre_producto'],
      // 'unidad'=> $fila['unidad'],
      // 'cantidad'=> $fila['cantidad'],
      // 'stock_min' => $fila['stock_min'],
      // 'precio_costo' => $fila['precio_costo'],
      // 'fecha_ingreso' => $fila['fecha_ingreso']   
      $('#nombre_producto').val(producto.nombre_producto);
      $('#existencia').val(producto.cantidad);
      $('#existencia_seguridad').val(producto.stock_min); 
      
    }    
  }); 


}
    
//*******FIN DE TODO******    
})