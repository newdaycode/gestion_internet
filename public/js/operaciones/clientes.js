//Activa el datatable
$(document).ready(function() {
    $('#datatable').DataTable();
} );

$('#startDate').daterangepicker({
    singleDatePicker: true,
    startDate: moment(),
    maxDate :moment(),
    locale: {
        format: 'YY-MM-DD'
      }
  });


//alert de msj  
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000
});

$("#agregar").on('click', function(){
    $(".msj-error").html('');
    $('#FormRegistro').trigger("reset");
    $("#ModalRegistro").modal('show');
})


$(".buscar_cliente").on('click', function(){

  $.get("solicitudes_clientes", function(response){
        
        var $contenido = $('.tabla-listado-solicitudes');
        $contenido.html(response.html);

        $( '#datatable_soli').on( 'mouseover', 'tbody tr', function () {
            $( this ).css( "cursor", "pointer" );
        });
        var datatable = $('#datatable_soli').DataTable();

        $("#ModalRegistro").modal('hide');
        $("#ModalSolicitudes").modal('show');



    })
})

$(".cerrar_soli").on('click', function(){
    $("#ModalRegistro").modal('show');

})

//*******************cargar data de solicitudes *************************/

function cargar(codigo,nombre, cedula, movil, fijo, email, ubicacion, observaciones){

    $('#nombre_solicitante').val(nombre)
    $('#cd_rif').val(cedula)
    $('#movil').val(movil)
    $('#fijo').val(fijo)
    $('#email').val(email)
    $('#ubicacion').val(ubicacion)
    $('#observaciones').val(observaciones)
    $("#ModalRegistro").modal('show');
    $("#ModalSolicitudes").modal('hide');
}


$(function(){
    $("#FormRegistro").on("submit", function(e){
        e.preventDefault();

            var valor = $( '#accion' ).prop( 'value' ) 
        console.log(valor)


        //verificas la accion a ejecutar para procesar
        if(valor === 'agregar'){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var action = 'clientes';
            var method = 'POST';
        }else if(valor === 'editar'){

            var codigo = $("#FormRegistro input[name=codigo_editar]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            var action = 'clientes/'+ codigo;
            var method = 'PUT';

        }else{

            Toast.fire({
                icon: 'error',
                title: 'Lo siento proceso desconocido.'
             });  
        }

        $.ajax({
            type: method,
            url: action,
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

//*******************Actualizar Listado luego de cada proceso *************************/

function actualizar(){

  $.get("listado_clientes", function(response){
        
        var $contenido = $('.tabla-listado');
        $contenido.html(response.html);

        $( '#datatable').on( 'mouseover', 'tbody tr', function () {
            $( this ).css( "cursor", "pointer" );
        });
        var datatable = $('#datatable').DataTable();

    })
}


//*******************Eliminar Cliente *************************/

function eliminar(id) {
    $.ajax({
        type: 'GET',
        url: 'clientes/' + id,
        success: function(data) {
            $("#eliminar-titulo").html("¿Desea Eliminar este cliente (" + data.cliente.nombre_cliente + ")?");
            $("#FormEliminar input[name=codigo]").val(data.cliente.id);
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
        url: 'clientes/' + $("#FormEliminar input[name=codigo]").val(),
        dataType: 'json',
        success: function(data) {

            if (data.estado==true) {

                Toast.fire({
                   icon: 'success',
                   title: 'Registro Eliminado.'
                });

                actualizar()
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

//*******************Editar Registro de Cliente *************************/

function editar(id) {

    $(".msj-error").html('');

    $.ajax({
        type: 'GET',
        url: 'clientes/' + id,
        success: function(data) {

            $('#FormRegistro input[name=nombre_solicitante]').val(data.cliente.nombre_cliente)
            $('#FormRegistro input[name=cd_rif]').val(data.cliente.cd_rif)
            $('#FormRegistro input[name=movil]').val(data.cliente.movil)
            $('#FormRegistro input[name=fijo]').val(data.cliente.fijo)
            $('#FormRegistro input[name=email]').val(data.cliente.email)
            $('#FormRegistro input[name=ubicacion]').val(data.cliente.ubicacion)
            $('#FormRegistro input[name=usuario]').val(data.cliente.usuario)
            document.getElementById('ser-'+data.cliente.servicios_id).selected = true
            $('#FormRegistro textarea[name=observaciones]').val(data.cliente.observaciones)
            $('#FormRegistro input[name=ip]').val(data.cliente.ip)
            $('#FormRegistro input[name=fecha_i]').val(data.cliente.fecha_i)
            $('#FormRegistro input[name=costo]').val(data.cliente.costo)
            document.getElementById('torr-'+data.cliente.torres_id).selected = true
            document.getElementById('equi-'+data.cliente.equipos_id).selected = true
            document.getElementById(data.cliente.otros_equi).selected = true
            $('#FormRegistro input[name=costo_equipo]').val(data.cliente.costo_equi)
            $('#FormRegistro input[name=equipos_id]').val(data.cliente.equipos_id)
            $('#FormRegistro input[name=costo_otro_equipo]').val(data.cliente.costo_otro_equi)
            $('#FormRegistro input[name=mac_address]').val(data.cliente.mac_address)
            $("#FormRegistro input[name=codigo_editar]").val(data.cliente.id);
            $("#FormRegistro input[name=accion]").val('editar');
            $('#ModalRegistro').modal('show');
        }
    });
}

//*******************Agregar servicio *************************/

$(".agregar_servicio").on('click', function(){
    $("#ModalRegistro").modal('hide');
    $('#ForServicio').trigger("reset");
    $("#ModalServicio").modal('show');
})

$(".cerrar_antena").on('click', function(){
    $("#ModalRegistro").modal('show');
})

$(function(){
    $("#ForServicio").on("submit", function(e){
        e.preventDefault();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: 'clientes_servicio',
            data: $("#ForServicio").serialize(),
            dataType: 'json',
            success: function(data) {

                if($.isEmptyObject(data.error)){

                  Toast.fire({
                    icon: 'success',
                    title: data.success
                  });

                var $contenido = $('.listado_servicios');
                $contenido.html(data.html);


                  $("#ModalServicio").modal('hide');
                  $("#ModalRegistro").modal('show');


                }else{

                    printErrorMsg(data.error);

                }

            }
        });
    }); 
});

//*******************Agregar equipo *************************/

$(".agregar_equipo").on('click', function(){
    $("#ModalRegistro").modal('hide');
    $('#ForEquipo').trigger("reset");
    $("#ModalEquipo").modal('show');
})

$(".cerrar_equipo").on('click', function(){
    $("#ModalRegistro").modal('show');
})

$(function(){
    $("#ForEquipo").on("submit", function(e){
        e.preventDefault();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: 'clientes_equipo',
            data: $("#ForEquipo").serialize(),
            dataType: 'json',
            success: function(data) {

                if($.isEmptyObject(data.error)){

                  Toast.fire({
                    icon: 'success',
                    title: data.success
                  });

                var $contenido = $('.listado_equipos');
                $contenido.html(data.html);


                  $("#ModalEquipo").modal('hide');
                  $("#ModalRegistro").modal('show');


                }else{

                    printErrorMsg(data.error);

                }

            }
        });
    }); 
});