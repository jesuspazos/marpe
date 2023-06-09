var tblProductos = '';

$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });        

    tblProductos = $('#tblProductos').addClass( 'nowrap' ).DataTable({
        "bInfo": true,
        "ordering": false,
        "processing": true,
        "serverSide": true,
        responsive: true,
        //"searching":false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "lengthMenu": [
                [5, 10, 20, 30, 50, -1], 
                [5, 10, 20, 30, 50, "Todos"]
        ],
        "ajax":{
                "url": url_global+"/getitems",
                "type": "POST",
                "data":{}
                //"data": 'csrf_token':$('meta[name=csrf_token]').attr("content")
                /*"data": function(data){       
                        var bVal = ($('#divSCOVTiendas #txtActivoSearch').prop('checked')) ? 1 : 0;                                             
                        data.bactivo        = bVal;
                        data.cNombreTiendaT = $('#divSCOVTiendas #txtNombreTiendaIndex').val();
                        data.cDescripcionT  = $('#divSCOVTiendas #txtDescripcionSearch').val();
                        data.iGiroT         = $('#divSCOVTiendas #txtGiroSearch').val();
                        data.iSubgiroT      = $('#divSCOVTiendas #txtSubgiroSearch').val();
                        data.dFechaIniT     = $('#divSCOVTiendas #txtFechaInicio').val();
                        data.dFechaFinT     = $('#divSCOVTiendas #txtFechaFin').val();
                    }*/
        },               
        "columns": [
                {"data": "iIdCategoria"}, 
                {"data": "cNombreCategoria"},
                {"data": "bEstatus"},
                {"data": "pathImg"},
                {"data": "opciones"},                             
        ]
    });
});