/**
 * Created by ivan on 30/1/2017.
 */

$.ajax({
    url: 'get_clientes',
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
            {'data': 'Nombre', 'title': 'nombre'},
            {'data': 'Apellido', 'title': 'apellido'},
            {'data': 'Direccion', 'title': 'dirección'},
            {'data': 'Referencia', 'title': 'referencia'},
            {'data': 'IP', 'title': 'ip'},
            {'data': 'Comentarios', 'title': 'comentarios'}
        ]
    });
}