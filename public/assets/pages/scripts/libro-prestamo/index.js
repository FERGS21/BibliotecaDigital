$(document).ready(function(){
    $('.libro-devolucion').on('click', function(event){
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val(),
            _method: 'get'
        }
        ajaxRequest(data, url);
    });

    function ajaxRequest(data, url){
        $.ajax({
            url: url,
            type: 'POST',
            data:data,
            success: function(respuesta){
               // const fecha = respuesta.fecha_devolucion;
                //link.closest('tr').find('td.fecha-devolucion').text(fecha);
            },
            error: function(){

            }
        });
    }
});