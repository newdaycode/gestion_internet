//Activa el datatable
$(document).ready(function() {
    $('#datatable').DataTable();
} );



//SweetAlert2 Toast
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000
});

// $("#agregar").on('click', function(){
//     $('#FormRegistro').trigger("reset");
//     $("#ModalRegistro").modal('show');
// })


// $(function(){
//     $("#FormRegistro").on("submit", function(e){
//         e.preventDefault();


//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         $.ajax({
//             type: 'POST',
//             url: 'solicitudes',
//             data: $("#FormRegistro").serialize(),
//             dataType: 'json',
//             success: function(data) {

//                 if($.isEmptyObject(data.error)){

//                   Toast.fire({
//                     icon: 'success',
//                     title: data.success
//                   });

//                   actualizar()
//                   $("#ModalRegistro").modal('hide');



//                 }else{

//                     printErrorMsg(data.error);

//                 }

//             }
//         });
//     }); 


//     function printErrorMsg (msg) {
//         $(".msj-error").html('');
//         $.each( msg, function( key, value ) {
//           $('.'+key+'_err').text(value);
//         });
//     }

// });


function actualizar(){
  $.get("listado_users", function(response){
        
        var $contenido = $('.tabla-listado');
        $contenido.html(response.html);

        $( '#datatable').on( 'mouseover', 'tbody tr', function () {
            $( this ).css( "cursor", "pointer" );
        });
        var datatable = $('#datatable').DataTable();

    })
}


// //eliminar registro
// function eliminar(id) {
//     $.ajax({
//         type: 'GET',
//         url: 'solicitudes/' + id,
//         success: function(data) {
//             $("#eliminar-titulo").html("¿Desea Eliminar la solicitud de (" + data.solicitud.nombre_solicitante + ")?");
//             $("#FormEliminar input[name=codigo]").val(data.solicitud.id);
//             $('#ModalEliminar').modal('show');
//         }
//     });
// }

// $("#btn-eliminar").click(function() {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         type: 'DELETE',
//         url: 'solicitudes/' + $("#FormEliminar input[name=codigo]").val(),
//         dataType: 'json',
//         success: function(data) {

//             if (data.estado==true) {

//                 Toast.fire({
//                    icon: 'success',
//                    title: 'Registro Eliminado.'
//                 });

//                 actualizar()
//             }else {

//                 Toast.fire({
//                    icon: 'error',
//                    title: 'Lo Siento Error Insesperado.'
//                 });              
//             }
//             $("#ModalEliminar").modal('hide');
            
//         }
//     });
// });


function editar(id) {

    $(".msj-error").html('');
    $('#FormEditar').trigger("reset");
    $.ajax({
        type: 'GET',
        url: 'users/' + id,
        success: function(data) {

            $("#FormEditar input[name=nombre]").val(data.users.name);
            $.each( data.roles, function( key, value ) {
                document.getElementById(value.name).checked = true
            });

            // console.log('hola')
            // console.log(data.datos[0].name)
            $("#FormEditar input[name=codigo_editar]").val(data.users.id);
            $('#ModalEditar').modal('show');
        }
    });
}


//editar solicitud

$(function(){
    $("#FormEditar").on("submit", function(e){
        e.preventDefault();


    var codigo = $("#FormEditar input[name=codigo_editar]").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'PUT',
        url: 'users/'+ codigo,
        data: $("#FormEditar").serialize(),
        dataType: 'json',
        success: function(data) {

                if($.isEmptyObject(data.error)){
                    Toast.fire({
                      icon: 'success',
                      title: data.success
                    });

                    actualizar()
                     $("#ModalEditar").modal('hide');

                }else{

                    printErrorMsgActu(data.error);

                }

            }
        });
    }); 


    function printErrorMsgActu (msg) {
        $(".msj-error").html('');
        $.each( msg, function( key, value ) {
          $('.'+key+'_err').text(value);
        });
    }

});
