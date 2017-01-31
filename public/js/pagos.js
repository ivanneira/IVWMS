/**
 * Created by ivan on 27/1/2017.
 */


$.ajax({
    url: 'get_pagos',
    type: "GET",
    global: true,
    cache:false,
    dataType: 'json'

}).done(function(data) {
    console.dir(data);
    fillTable(data);

});

function fillTable(data) {


    $('#dataTable').DataTable({
        'data': data,
        'columns': [
            {'data': 'ID', 'title': 'id'},
            {'data': 'Fecha', 'title': 'fecha'},
            {'data': 'Referencia', 'title': 'Referencia'},
            {'data': 'Codigo', 'title': 'Codigo'},
            {'data': 'Pago', 'title': 'Pago'}
        ]
    });
}