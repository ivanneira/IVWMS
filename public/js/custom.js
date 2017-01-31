/**
 * Created by ivan on 27/1/2017.
 */
$(function () {

    $("#btnPagos").click(function(){

        getContent('pagos');
    });

    $("#btnClientes").click(function(){

        getContent('clientes');
    });

    function getContent(direction){

        $.get(direction, function(data){

            $("#mainContainer").html(data);
        });
    }

});