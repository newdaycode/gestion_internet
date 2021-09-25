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
            url: 'roles',
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


    function printErrorMsg (msg) {
        $(".msj-error").html('');
        $.each( msg, function( key, value ) {
          $('.'+key+'_err').text(value);
        });
    }

});


function actualizar(){
  $.get("listado_roles", function(response){
        
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
        url: 'roles/' + id,
        success: function(data) {
            $("#eliminar-titulo").html("¿Desea eliminar este rol (" + data.role.name + ")?");
            $("#FormEliminar input[name=codigo]").val(data.role.id);
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
        url: 'roles/' + $("#FormEliminar input[name=codigo]").val(),
        dataType: 'json',
        success: function(data) {

            if($.isEmptyObject(data.error)){

                Toast.fire({
                    icon: 'success',
                    title: data.success
                });

                actualizar()

            }else{


                Toast.fire({
                    icon: 'error',
                    title: data.error
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
        url: 'roles/' + id,
        success: function(data) {

            $("#FormEditar input[name=name]").val(data.role.name);
            $.each( data.permisoRol, function( key, value ) {
                document.getElementById(value.name).checked = true
            });

            $("#FormEditar input[name=codigo_editar]").val(data.role.id);
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
        url: 'roles/'+ codigo,
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
