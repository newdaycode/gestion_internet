//Activa el datatable
$(document).ready(function() {
    $('#datatable').DataTable();
} );


//crea el slug en base al nombre
$(document).ready( function() {
  $(".nombre_solicitante").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '.slug',
    space: '-'
  });
});



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
            url: 'solicitudes',
            data: $("#FormRegistro").serialize(),
            dataType: 'json',
            success: function(data) {

                if($.isEmptyObject(data.error)){

                  Toast.fire({
                    icon: 'success',
                    title: data.success
                  });

                  actualizar('pendiente')
                  $("#ModalRegistro").modal('hide');

                }else{

                    printErrorMsg(data.error);

                }

            }
        });
    }); 


    function printErrorMsg (msg) {
        $(".msj-error").html('');
        $.each( msg, function( key, value ) {
          $('.'+key+'_err').text(value);
        });
    }

});


function actualizar(estado){

  $.get("listado_solicitudes/"+ estado, function(response){
        
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
        url: 'solicitudes/' + id,
        success: function(data) {
            $("#eliminar-titulo").html("¿Desea Eliminar la solicitud de (" + data.solicitud.nombre_solicitante + ")?");
            $("#FormEliminar input[name=codigo]").val(data.solicitud.id);
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
        url: 'solicitudes/' + $("#FormEliminar input[name=codigo]").val(),
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
        url: 'solicitudes/' + id,
        success: function(data) {

            $("#FormEditar input[name=nombre_solicitante]").val(data.solicitud.nombre_solicitante);
            $("#FormEditar input[name=slug]").val(data.solicitud.slug);
            $("#FormEditar input[name=cd_rif]").val(data.solicitud.cd_rif);
            $("#FormEditar input[name=movil]").val(data.solicitud.movil);
            $("#FormEditar input[name=fijo]").val(data.solicitud.fijo);
            $("#FormEditar input[name=email]").val(data.solicitud.email);
            $("#FormEditar input[name=ubicacion]").val(data.solicitud.ubicacion);


            if(data.solicitud.antena === 'si'){
                document.getElementById("antena1").checked = true
            }else{
                document.getElementById("antena2").checked = true              
            }
            $("#FormEditar textarea[name=observaciones]").val(data.solicitud.observaciones);
            $("#FormEditar input[name=codigo_editar]").val(data.solicitud.id);
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
        url: 'solicitudes/'+ codigo,
        data: $("#FormEditar").serialize(),
        dataType: 'json',
        success: function(data) {

                if($.isEmptyObject(data.error)){
                    Toast.fire({
                      icon: 'success',
                      title: data.success
                    });

                    actualizar('pendiente')
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


function procesar(id){
    $('#FormProcesar').trigger("reset");
    $('#procesar_data').val(id)
    $("#ModalProcesar").modal('show');
}

$(function(){
    $("#FormProcesar").on("submit", function(e){
        e.preventDefault();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: 'procesar',
            data: $("#FormProcesar").serialize(),
            dataType: 'json',
            success: function(data) {

                if($.isEmptyObject(data.error)){

                  Toast.fire({
                    icon: 'success',
                    title: data.success
                  });

                  actualizar('pendiente')
                  $("#ModalProcesar").modal('hide');



                }else{

                    printErrorMsg(data.error);

                }

            }
        });
    }); 


    function printErrorMsg (msg) {
        $(".msj-error").html('');
        $.each( msg, function( key, value ) {
          $('.'+key+'_err').text(value);
        });
    }

});
