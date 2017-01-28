/**
 * Created by ivan on 27/1/2017.
 */
$(function () {

    $("#btnPagos").click(function(){

        getContent('pagos');
    });

    function getContent(direction){

        $.get('pagos', function(data){

            $("#mainContainer").html(data);
        });
    }

});