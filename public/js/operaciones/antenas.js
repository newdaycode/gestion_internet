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
            url: 'antenas',
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

  $.get("listado_antenas", function(response){
        
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
        url: 'antenas/' + id,
        success: function(data) {
            $("#eliminar-titulo").html("¿Desea Eliminar esta Antena (" + data.antena.modelo + ")?");
            $("#FormEliminar input[name=codigo]").val(data.antena.id);
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
        url: 'antenas/' + $("#FormEliminar input[name=codigo]").val(),
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


    // alert($("#FormEditar select[name=tipo]").val())
    $(".msj-error").html('');
    $('#FormEditar').trigger("reset");
    $.ajax({
        type: 'GET',
        url: 'antenas/' + id,
        success: function(data) {

            $("#FormEditar input[name=modelo]").val(data.antena.modelo);
            $("#FormEditar select[name=tipo]").append('<option value="'+data.antena.tipo+'" selected="selected">'+data.antena.tipo+'</option>');
            $("#FormEditar select[name=polarizacion]").append('<option value="'+data.antena.polarizacion+'" selected="selected">'+data.antena.polarizacion+'</option>');
            $("#FormEditar input[name=ganancia]").val(data.antena.ganancia);
            $("#FormEditar input[name=codigo_editar]").val(data.antena.id);
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
        url: 'antenas/'+ codigo,
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