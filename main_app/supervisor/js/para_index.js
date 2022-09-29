jQuery(document).ready(function(){
    //productos_categoria();
    crud_productos(); 
    crud_clientes();  
    $('.contenedor_clientes').hide();
    $('.contenedor_productos').hide();
    $('.continue_clienteform').hide(); 
    
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
    $(document).on('click','#cliente_', function(){        
        //$('.contenedor_productos').show();
        $('.grid-container').hide();
    })
     $(document).on('click','#regresar', function(){        
        $('.grid-container').show();
        $('.contenedor_productos').hide();
        $('.contenedor_clientes').hide();
     })
    $(document).on('click','#cliente_', function(){        
        $('.grid-container').hide();
        $('.contenedor_clientes').show();
    }) 
    $(document).on('click','#product_', function(){        
        $('.grid-container').hide();
        $('.contenedor_productos').show();
    })
    $(document).on('click','#val_cedula', function(){    
        $identi = $('#cedula').val();   
        validar_cedula($identi);
    })
//***  boton crear clientes */
$(document).on('click','#carga_cliente_',function(e){
    e.preventDefault();
    codigo = $('#cod_cliente').val();
    nombres = $('#nombres').val();
    apellidos = $('#apellidos').val();
    direccion = $('#direccion').val();
    telefono = $('#telefono').val();
    mail = $('#mail').val();
    correo = $('#mail').val();
    if ( codigo == ""){alert ("Falta ingresar codigo de cliente");exit();}
    if ( nombres== ""){alert ("Falta ingresar Nombres del cliente");exit();}
    if ( apellidos == ""){alert ("Falta ingresar Apellidos del cliente");exit();}
    if ( direccion == ""){alert ("Falta ingresar Dirección del cliente");exit();}
    if ( telefono == ""){alert ("Falta ingresar Telefono del cliente");exit();}
    if ( mail == ""){alert ("Falta ingresar correo electronico del cliente");exit();}
    validateEmail(correo);    
})
//** crud clientes */
function crud_clientes(){
  $.ajax({
    url: '../../backend/crud_clientes.php',
    type: 'POST',      
  })
  .done(function(listas_clientes){
  var i = 1;  
  var listas = JSON.parse(listas_clientes);
  var template='';
  listas.forEach(lista =>{
          template+= `
          <tr elmentoid="${lista.id_cliente}">                              
             <td>${lista.cliente_codigo}</td>
             <td>${lista.cedula} </td>
             <td>${lista.nombres} &nbsp ${lista.apellidos}</td>             
             <td>${lista.direccion}</td>
             <td>${lista.telefono}</td>
             <td>${lista.mail}</td> 
             <td>${lista.estado}</td>              
             <td> <i class='bx bxs-user-x' id="borrar_cliente"></i> 
             </td>   
              
          </tr>`;                
          $('#lista_clientes').html(template);
         
        });
  /*$('#tot_plan').html(i);   
  console.log (listas);
  console.log (i);*/   
  })
  .fail(function(){
    alert('Hubo un errror al cargar los usuarios');
  });  

}
//***** VALIDAR CEDULA****
function validar_cedula($identi) {
    //alert ($identi);
    if ($identi == ""){
        alert ("Revise.. no puede estar el campo cédula en blanco");
    }else{    
        var cad_ =  $identi;
        var cad = $.trim(cad_);
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;

        if (cad !== "" && longitud === 10){
          for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
              var aux = cad.charAt(i) * 2;
              if (aux > 9) aux -= 9;
               total += aux;
            } else {
              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
          }
          total = total % 10 ? 10 - total % 10 : 0;
          if (cad.charAt(longitud-1) == total) {
             //alert ("Cedula Válida");
             busca_cliente($identi);
          }else{            
            alert ("cedula invalida");
          }
        }else{
          alert("Por favor ingreso 10 digitos correspondiente a la cédula")  
        }
    }
  }

//***** busca cliente ****
function busca_cliente(cad){
  var cedula= cad;  
  var id_envio ={"id_envio":cedula};     
  $.ajax({
          url: '../../backend/busca_cliente.php',
          type: 'POST',
          data: id_envio,  
          success: function (cliente_)
          {
            var jsonData = JSON.parse(cliente_);
            //alert (jsonData.success);
            if (jsonData.success == "1"){
              alert ("este cliente ya se encuentra registrado");
              exit();
            }else{
              //alert ("vamos a añadri este nuevo cliente");
              $('.continue_clienteform').show(); 
            }

                    
          }    
        });  
   }
//**** validacion correo electronico */
function validateEmail(correo){ 
  var expReg= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
  var esValido = expReg.test(correo);
  if (esValido == true){
    var _formP = $("#new_cliente");      
    var datos = new FormData($("#new_cliente")[0]);                
      $.ajax({
         url: '../../backend/inserta_cliente.php',
         type: 'POST',
         data: datos,
         contentType: false,
         processData: false,
         success: function(datos)
         {
           alert(datos);
           _formP[0].reset();
           crud_clientes(); 
           $('.continue_clienteform').hide();   
         }
         });
  }else{
    alert (" El correo ingregrado no es válido por favor revisar.");
    
    }
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
//********* ELIMINA CLIENTE **********
$(document).on('click','#borrar_cliente',function(){
  let elemento = $(this)[0].parentElement.parentElement;
  let id_de_cliente = $(elemento).attr('elmentoid');
  //alert (id_de_cliente);  
  elimina_usuario(id_de_cliente); 
});

function elimina_usuario(id_de_cliente){
let id = id_de_cliente;
var id_envio ={"id_envio":id}; 
alert ('desea eliminar este cliente definitivamente');
  $.ajax({
    url: '../../backend/eliminar_cliente.php',
    type: 'POST',
    data: id_envio,
    success: function (respuesta)
      {
      alert (respuesta);
      crud_clientes(); 
      }
      });  
}
//*******FIN DE TODO******    
})