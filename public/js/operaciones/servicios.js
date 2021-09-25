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

$("#agregar").on('click', function(){
    $('#FormRegistro').trigger("reset");
    $("#ModalRegistro").modal('show');
})


$(function(){
    $("#FormRegistro").on("submit", function(e){
        e.preventDefault();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: 'servicios',
            data: $("#FormRegistro").serialize(),
            dataType: 'json',
            success: function(data) {

                if($.isEmptyObject(data.error)){

                  Toast.fire({
                    icon: 'success',
                    title: data.success
                  });

                  actualizar()
                  $("#ModalRegistro").modal('hide');


                }else{

                    printErrorMsg(data.error);

                }

            }
        });
    }); 

});

function printErrorMsg (msg) {
    $(".msj-error").html('');
    $.each( msg, function( key, value ) {
      $('.'+key+'_err').text(value);
    });
}


function actualizar(){

  $.get("listado_servicios", function(response){
        
        var $contenido = $('.tabla-listado');
        $contenido.html(response.html);

        $( '#datatable').on( 'mouseover', 'tbody tr', function () {
            $( this ).css( "cursor", "pointer" );
        });
        var datatable = $('#datatable').DataTable();

    })
}


//eliminar registro
function eliminar(id) {
    $.ajax({
        type: 'GET',
        url: 'servicios/' + id,
        success: function(data) {
            $("#eliminar-titulo").html("¿Desea Eliminar este servicio (" + data.servicio.plan + ")?");
            $("#FormEliminar input[name=codigo]").val(data.servicio.id);
            $('#ModalEliminar').modal('show');
        }
    });
}

$("#btn-eliminar").click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        url: 'servicios/' + $("#FormEliminar input[name=codigo]").val(),
        dataType: 'json',
        success: function(data) {

            if (data.estado==true) {

                Toast.fire({
                   icon: 'success',
                   title: 'Registro Eliminado.'
                });

                actualizar('pendiente')
            }else {

                Toast.fire({
                   icon: 'error',
                   title: 'Lo Siento Error Insesperado.'
                });              
            }
            $("#ModalEliminar").modal('hide');
            
        }
    });
});


function editar(id) {

    $(".msj-error").html('');
    $('#FormRegistro').trigger("reset");
    $.ajax({
        type: 'GET',
        url: 'servicios/' + id,
        success: function(data) {

            $("#FormEditar input[name=plan]").val(data.servicio.plan);
            $("#FormEditar input[name=megas]").val(data.servicio.megas);
            $("#FormEditar input[name=monto]").val(data.servicio.monto);
            $("#FormEditar textarea[name=descripcion]").val(data.servicio.descripcion);
            $("#FormEditar input[name=codigo_editar]").val(data.servicio.id);
            $('#ModalEditar').modal('show');
        }
    });
}


//editar servicio
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
        url: 'servicios/'+ codigo,
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

});