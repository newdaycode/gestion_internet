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

                  actualizar('no_factible')
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
