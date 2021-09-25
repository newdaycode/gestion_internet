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



$(".agregar_antena").on('click', function(){
    $("#ModalRegistro").modal('hide');
    $('#FormAntena').trigger("reset");
    $("#ModalAntena").modal('show');
})

$(".cerrar_antena").on('click', function(){
    $("#ModalRegistro").modal('show');
    // $("#ModalAntena").modal('show');
})



$(function(){
    $("#FormAntena").on("submit", function(e){
        e.preventDefault();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: 'antenas_torres',
            data: $("#FormAntena").serialize(),
            dataType: 'json',
            success: function(data) {

                if($.isEmptyObject(data.error)){

                  Toast.fire({
                    icon: 'success',
                    title: data.success
                  });

                var $contenido = $('.listado_antenas');
                $contenido.html(data.html);


                  $("#ModalAntena").modal('hide');
                  $("#ModalRegistro").modal('show');


                }else{

                    printErrorMsg(data.error);

                }

            }
        });
    }); 
});



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
            url: 'torres',
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

  $.get("listado_torres", function(response){
        
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
        url: 'torres/' + id,
        success: function(data) {
            $("#eliminar-titulo").html("¿Desea Eliminar esta Torre (" + data.torre.ssid + ")?");
            $("#FormEliminar input[name=codigo]").val(data.torre.id);
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
        url: 'torres/' + $("#FormEliminar input[name=codigo]").val(),
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
    $('#FormEditar').trigger("reset");
    $.ajax({
        type: 'GET',
        url: 'torres/' + id,
        success: function(data) {

            $("#FormEditar input[name=ssid]").val(data.torre.ssid);
            $("#FormEditar input[name=acceso]").val(data.torre.acceso);
            // $("#FormEditar input[name=antenas_id]").val(data.torre.antenas_id);
            $("#FormEditar input[name=capacidad]").val(data.torre.capacidad);
            $("#FormEditar input[name=frecuencia]").val(data.torre.frecuencia);
            $("#FormEditar input[name=ip]").val(data.torre.ip);
            $("#FormEditar input[name=mac_address]").val(data.torre.mac_address);
            $("#FormEditar input[name=lugar]").val(data.torre.lugar);
            $("#FormEditar textarea[name=observacion]").val(data.torre.observacion);

            document.getElementById('ante_'+data.torre.antenas_id).selected = true
            $("#FormEditar input[name=codigo_editar]").val(data.torre.id);
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
        url: 'torres/'+ codigo,
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