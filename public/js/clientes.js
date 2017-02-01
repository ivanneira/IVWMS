/**
 * Created by ivan on 30/1/2017.
 */

$.ajax({
    url: 'get_clientes',
    type: "GET",
    global: true,
    cache: false,
    dataType: 'json',
    success: function (data) {
        console.dir(data);
        fillTable(data);
    },
    error: function (e) {
        console.log("error en el método ajax");
        console.log(e);
    }
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
            {'data': 'TelefonoID', 'title': 'teléfono'},
            {'data': 'IP', 'title': 'ip'},
            {'data': 'Comentarios', 'title': 'comentarios'}
        ]
    });
}