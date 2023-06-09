var tblCategoria = '';
var tblSubcategoria = '';
var theCode = '';
var tmpCategoria = '';
var tmpSubCategoria = '';

GetCategorias();

$('.nav-link').on('click', function() {
    //$('.nav-link li.active').removeClass('active');
    $(this).removeClass('active');
    $(this).removeClass('show');
    //$(this).addClass('active');
    console.log("NIN");
});

$(document).ready(function(){

    $.modal.defaults = {
        closeExisting: false,    // Close existing modals. Set this to false if you need to stack multiple modal instances.
        escapeClose: false,      // Allows the user to close the modal by pressing `ESC`
        //clickClose: true,       // Allows the user to close the modal by clicking the overlay
        closeText: 'Close',     // Text content for the close <a> tag.
        closeClass: '',         // Add additional class(es) to the close <a> tag.
        showClose: true,        // Shows a (X) icon/link in the top-right corner
        //modalClass: "modal",    // CSS class added to the element being displayed in the modal.
        //blockerClass: "modal",  // CSS class added to the overlay (blocker).

        // HTML appended to the default spinner during AJAX requests.
        //spinnerHtml: '<div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div>',

        //showSpinner: true,      // Enable/disable the default spinner during AJAX requests.
        //fadeDuration: null,     // Number of milliseconds the fade transition takes (null means no transition)
        //fadeDelay: 1.0          // Point during the overlay's fade-in that the modal begins to fade in (.5 = 50%, 1.5 = 150%, etc.)
    };


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    

    $('#labores_semana, #labores_finsemana').multipleSelect({
                            selectAll: false,
                            placeholder: ' - Seleccione - ',
                            allSelectedText: 'Todos seleccionados',    
                            minimumCountSelected: 3,
                            ellipsis: true,                            
                        });  

    $('#labores_semana, #labores_finsemana').multipleSelect("setSelects", []);

    if(typeof lstValores !== 'undefined' && lstValores.length > 0){
        $("#labores_finsemana").multipleSelect("setSelects",lstValores);
    }

    if(typeof lstValores2 !== 'undefined' && lstValores2.length > 0){
        $("#labores_semana").multipleSelect("setSelects",lstValores2);                                            
    }

    $('#summernote').summernote({
        height: ($('#myTabContent').height() - 650),
        callbacks:{
            onImageUpload: function(image){                 
                
                var formData = new FormData();
                arregloImg = [];
                
                for (var key in image) {                                                                                           
                    formData.append('file[]', image[key]);
                }            
                
                $.ajax({
                    url:url_global+'/setImg',
                    type:'POST',
                    data: formData,                
                    contentType: false,
                    processData: false,
                    enctype: 'multipart/form-data',
                    dataType: 'json',
                    beforeSend: function(){                          
                    },
                    success: function(data, textStatus, jqXHR){                        
                        
                        if(data.redirect){
                            window.location.href = data.redirect;
                        }

                        data.data.forEach(element => {                
                            var image = $('<img>').attr('src', url_global+element.RutaImagen);
                            $('#summernote').summernote("insertNode", image[0]);                            
                        });                                                                        
                    }   
                });                                            
            }
        }
    });
    
   
    tblCategoria = $('#tblCategoria').addClass( 'nowrap' ).DataTable({
        "bInfo": true,
        "ordering": false,
        "processing": true,
        "serverSide": true,               
        "responsive": true,        
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
                "url": url_global+"/display",
                "type": "POST",
                "data":{}                
        },               
        "columns": [
                {"data": "iIdCategoria"}, 
                {"data": "cNombreCategoria"},
                {"data": "bEstatus"},
                {"data": "opciones"}                
        ]
    });

    tblSubcategoria = $('#tblSubcategoria').addClass( 'nowrap' ).DataTable({
        "bInfo": true,
        "ordering": false,
        "processing": true,
        "serverSide": true,               
        "responsive": true,        
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
                "url": url_global+"/displaysub",
                "type": "POST",
                "data":{}                
        },               
        "columns": [
                {"data": "iIdSubcategoria"}, 
                {"data": "cNombreCategoria"},
                {"data": "bEstatus"},
                {"data": "opciones"}                
        ]
    });
});


$("#tblProductos").on("click", "a#deleteItem", function(event) { 
    
    var Objetc = {};        
    var current_row = $(this).parents('tr');//Get the current row

    console.log($(this).attr('id'));

    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = tblProductos.row(current_row).data();//At this point, current_row refers to a valid row in the table, whether is a child row (collapsed by the DataTable's responsiveness) or a 'normal' row    

        alertify.confirm(
            'Confirmar', 
            'Desea eliminar el producto "'+data.cNombreCategoria+'"', 
            function(){ 
                DeleteProd(data.iIdCategoria);
                tblProductos.draw();                    
            }, 
            function(){ 
                alertify.error('Cancel')
            }
        ).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
});



$("#tblProductos").on("click", "a#editarProd", function(event) { 
           

    var current_row = $(this).parents('tr');//Get the current row    

    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = tblProductos.row(current_row).data();
    console.log(data);
    //$('#sub_categoria_prod').val();
    //$('#sub_categoria_prod').prop('disabled', 'disabled');
    GetSubCategorias(data.folioCategoria);
    $('#sub_categoria_prod').val(data.subcategoria);
    $('#nombre_prod').val('');    
    $('#nombre_prod').val(data.cNombreCategoria);    
    $('#categoria_prod').val('');
    $('#categoria_prod').val(data.folioCategoria);
    $('#id_prod').val('');
    $('#id_prod').val(data.iIdCategoria);    
   // $('#editarProd').modal();     
});


$('#GuardarEditCategoria').on('click',function(){

    if($('#nombre_categoria').val().replace(/\s/g,"") == ""){
        alertify.error('Para guardar es necesario un nombre');
        return;
    }

    alertify.confirm(
            'Confirmar', 
            'Desea editar la información de la categoría "'+tmpCategoria+'"', 
            function(){                                 
                EditarCategoria($('#id_categoria').val(),$('#nombre_categoria').val());
                tmpCategoria = '';
                $.modal.close();

                setTimeout(function() {
                    tblCategoria.draw();
                }, 2000);
                
            }, 
            function(){ 
                alertify.error('Cancelado')
            }
        ).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
});

$('#GuardarEditSubCategoria').on('click',function(){

    if($('#nombre_subcategoria_edit').val().replace(/\s/g,"") == ""){
        alertify.error('Para guardar es necesario un nombre');
        return;
    }

    alertify.confirm(
            'Confirmar', 
            'Desea editar la información de la categoría "'+tmpSubCategoria+'"', 
            function(){                                
                EditarSubCategoria($('#id_subcategoria').val(),$('#nombre_subcategoria_edit').val());
                tmpSubCategoria = '';
                $.modal.close();

                setTimeout(function() {
                    tblSubcategoria.draw();
                }, 2000);
                
            }, 
            function(){ 
                alertify.error('Cancelado')
            }
        ).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
});


$('#GuardarEdit').on('click', function(){

    if($('#nombre_prod').val().replace(/\s/g,"") == ""){
        alertify.error('Para guardar es necesario un nombre');
        return;
    }

    alertify.confirm(
            'Confirmar', 
            'Desea editar la información del producto "'+$('#nombre_prod').val()+'"', 
            function(){ 
                //DeleteProd(data.iIdCategoria);
                EditarProd($('#id_prod').val(), $('#nombre_prod').val(), $('#categoria_prod').val(), $('#sub_categoria_prod').val());                  
                $.modal.close();

                setTimeout(function() {
                    tblProductos.draw();
                }, 2000);
                
            }, 
            function(){ 
                alertify.error('Cancelado')
            }
        ).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
    
});

$("#tblMarcas").on("click", "a", function(event) { 
    
    var Objetc = {};    

    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = tblMarcas.row(current_row).data();//At this point, current_row refers to a valid row in the table, whether is a child row (collapsed by the DataTable's responsiveness) or a 'normal' row

        alertify.confirm(
            'Confirmar', 
            'Desea eliminar la Marca "'+data.cNombreImagen+'"', 
            function(){ 
                DeleteProd(data.iIdMarca);
                tblMarcas.draw();                    
            }, 
            function(){ 
                alertify.error('Cancel')
            }
        ).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
});
   

$("#tblarchivos").on("click", "a#copyLink", function(event) {         
    
    var Objetc = {};    
    
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = tblarchivos.row(current_row).data();//At this point, current_row refers to a valid row in the table, whether is a child row (collapsed by the DataTable's responsiveness) or a 'normal' row    
    navigator.clipboard.writeText(data.vinculoFile);

    alertify.success('Se copio al portapapeles');

});

$("#tblarchivos").on("click", "a#deleteFile", function(event) {         
    
    var Objetc = {};    
    
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = tblarchivos.row(current_row).data();//At this point, current_row refers to a valid row in the table, whether is a child row (collapsed by the DataTable's responsiveness) or a 'normal' row

        alertify.confirm(
            'Confirmar', 
            'Desea eliminar el archivo "'+data.cNombreDoc+'"', 
            function(){ 
                //DeleteProd(data.iIdMarca);
                DeleteFile(data.iIdArchivo);
                tblarchivos.draw();                    
            }, 
            function(){ 
                alertify.error('Cancelado')
            }
        ).set('labels', {ok:'Aceptar', cancel:'Cancelar'}); 
});



$("#tblCategoria").on("click", "a#delete", function(event) { 

    var Objetc = {};    
    var current_row = $(this).parents('tr');//Get the current row
    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = tblCategoria.row(current_row).data();//At this point, current_row refers to a valid row in the table, whether is a child row (collapsed by the DataTable's responsiveness) or a 'normal' row        

    alertify.confirm(
                'Confirmar', 
                'Desea eliminar la categoria "'+data.cNombreCategoria+'"', 
                function(){ 
                    //DeleteCat(data.iIdCategoria);
                    VerifyCat(data.iIdCategoria);                    
                    //alertify.success("Ocurrion");
                }, 
                function(){ 
                    alertify.error('Cancel')
                }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});        
});

$("#tblCategoria").on("click", "a#editarCat", function(event) { 
           

    var current_row = $(this).parents('tr');//Get the current row    

    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = tblCategoria.row(current_row).data();
     
    $('#nombre_categoria').val(data.cNombreCategoria);
    tmpCategoria = data.cNombreCategoria;  
    $('#id_categoria').val(data.iIdCategoria);            
});


$("#tblSubcategoria").on("click", "a#subCat", function(event) { 
           
    console.log("Hola");   

    var current_row = $(this).parents('tr');//Get the current row    

    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = tblSubcategoria.row(current_row).data();
         
    $('#nombre_subcategoria_edit').val(data.cNombreCategoria);
    tmpSubCategoria = data.cNombreCategoria;  
    
    $('#id_subcategoria').val(data.iIdSubcategoria);
    $('#sub_categoria_prod').val(data.subcategoria);    

});

$("#tblSubcategoria").on("click", "a#deleteSubcate", function(event) { 
               

    var current_row = $(this).parents('tr');//Get the current row    

    if (current_row.hasClass('child')) {//Check if the current row is a child row
        current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
    }
    var data = tblSubcategoria.row(current_row).data();
    
    console.log(data);

    alertify.confirm(
                'Confirmar', 
                'Desea eliminar la subcategoria "'+data.cNombreCategoria+'"', 
                function(){ 
                    //DeleteCat(data.iIdCategoria);
                    VerifySubCat(data.iIdSubcategoria);                    
                    //alertify.success("Ocurrion");
                }, 
                function(){ 
                    alertify.error('Cancel')
                }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});

    // $('#nombre_subcategoria_edit').val(data.cNombreCategoria);
    // tmpSubCategoria = data.cNombreCategoria;  
    // $('#id_subcategoria').val(data.iIdSubcategoria);

    // $('#sub_categoria_prod').val(data.subcategoria);    

});





/*----------------------------fin--------------------------*/

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}


$(".success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(700);
});


//---------------MARPE----------------------------------
    var loader = function() {
        setTimeout(function() { 
            if($('#ftco-loader').length > 0) {
                $('#ftco-loader').removeClass('show');
            }
        }, 1);
    };
    loader();

    $('#form-nosotros').on('submit',function(e){
        
        event.preventDefault();
        var formData = new FormData();
        var datas    = $(this).serializeArray();

        formData.append('file', $('#imagenMuestra')[0].files[0]);        
        for(let i = 0; i < datas.length; i++) {
           formData.append(datas[i].name, datas[i].value);
        }

        $.ajax({
            url:$(this).attr('action'),
            type:'POST',
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function(){          
                    
            },
            success: function(data, textStatus, jqXHR){
                            
                if(data.urlImg){
                    $('#imagen_nosotros').css('background','url('+data.urlImg+') no-repeat');
                    $('#imagen_nosotros').css('background-position','center');
                    $('#imagen_nosotros').css('background-size','40% 80%');

                    $('#nameImagen').val(data.urlImg);
                }

                if(data.Exito == true){
                    alertify.success('Cambios guardados con exito');  
                }
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    });

    $('#form-contacto').on('submit',function(e){

        event.preventDefault();        
        var datas = $(this).serializeArray();  
        var diasSemana = $('#labores_semana').multipleSelect("getSelects");
        var diasFin    = $('#labores_finsemana').multipleSelect("getSelects");
        
        datas.push({name:'diasSemana', value: diasSemana});
        datas.push({name:'diasFin', value: diasFin});              

        $.ajax({
            url:$(this).attr('action'),
            type:'POST',
            data: datas,//$(this).serializeArray(),
            cache: false,
            contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                
            },
            success: function(data, textStatus, jqXHR){
                                                                
                if(data.Mensaje){
                    alertify.error(data.Mensaje);  
                }
                else{
                    alertify.success('Cambios guardados con exito');     
                }
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    });

    $('.form_cat').on('submit',function(e){  

        event.preventDefault();

        if($('#txtTituloCategoria').val().replace(/\s/g,"") == ""){
            alertify.error('Para guardar es necesario un nombre');
            return;
        }

        $.ajax({
            url:$(this).attr('action'),
            type:'POST',
            data: $(this).serializeArray(),
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                
            },
            success: function(data, textStatus, jqXHR){                            

                if(data.redirect){
                    window.location.href = data.redirect;
                }

                if(!data.lErro){
                    alertify.error(data.mError);  
                }
                else{
                    alertify.success(data.mError); 
                    tblCategoria.draw();    
                }                
            },
            error: function(data, textStatus, jqXHR){
            }
        });
    });

    $('.form_subcat').on('submit',function(e){  

        event.preventDefault();

        if($('#txtTituloSubcategoria').val().replace(/\s/g,"") == ""){
            alertify.error('Para guardar es necesario un nombre');
            return;
        }

        if($('#txtcategoria').val() == 0){
            alertify.error('Para guardar es necesario una categoría');
            return;
        }        


        $.ajax({
            url:$(this).attr('action'),
            type:'POST',
            data: $(this).serializeArray(),
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                
            },
            success: function(data, textStatus, jqXHR){                            

                if(data.redirect){
                    window.location.href = data.redirect;
                }

                if(!data.lErro){
                    alertify.error(data.mError);  
                }
                else{
                    alertify.success(data.mError); 
                    tblCategoria.draw();    
                }                
            },
            error: function(data, textStatus, jqXHR){
            }
        });
    })

    $('#seccionIn').on('change',function(){        
        $valor = $(this).val();        
        GetSeccion($valor);
    });

    $('.row').on('keyup','#mostrar input[type="text"]',function(){
        var valor = $(this).val();
        $('#summernote').summernote('code',valor);

        if ($('#seccionIn').val() == 3){
            $('#sec1').html(valor);
        }        
    });


    $('#btnContact').on('click',function(event){
        
        event.preventDefault(); 

        var Objecto = {};

        if($('#seccionIn').val() == '0'){
            alertify.error('Selecciona una sección para vista previa');
            $('#seccionIn').focus();
            return false;
        }

        var content = $('#summernote').summernote('code');
        
        Objecto['Seccion'] = $('#seccionIn').val();
        Objecto['Contenido'] = content;


        ContentLoader(Objecto);

        //$('#prewiew1').html($('#summernote').summernote('code'));        
    });

    $('#btnGuarda').on('click', function(){
        event.preventDefault(); 
        
        var Objetc = {};
        var content = $('#summernote').summernote('isEmpty');        
        
        if($('#seccionIn').val() == 0){
            alertify.error('Selecciona una seccion para continuar');
            $('#summernote').focus();
            return false;
        }

        if(content){
            alertify.error('El contenido se encuentra vacio, capture algun valor');
            $('#summernote').focus();
            return false;
        }

        content = $('#summernote').summernote('code');
        Objetc['Seccion'] = $('#seccionIn').val();
        Objetc['Contenido'] = content;

        alertify.confirm(
                'Confirmar', 
                'Desea guardar el contenido, estos cambios se reflejaran en la pagina principal', 
                function(){ 
                    Guardar(Objetc);
                }, 
                function(){ 
                    alertify.error('Cancel')
                }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});;

    });

    function Guardar(Datos){        
        
        $.ajax({
            url:url_global+'/GuardarInicio',
            type:'POST',
            data: Datos,
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                //alertify.success('Guardando...');
            },
            success: function(data, textStatus, jqXHR){                                                               

                if(data.bExito){
                    alertify.success('Cambios realizados con exito');
                }                                                
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    function VerifyCat(id){
        $.ajax({
            //url:url_global+'/DeleteCate',
            url:url_global+'/VerifyCat',            
            type:'POST',
            data: {
                "id": id
            },
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            //processData: true,
            dataType: 'json',
            beforeSend: function(){          
                //alertify.success('Guardando...');
            },
            success: function(data, textStatus, jqXHR){                                                               

                if(data.bBool){
                    alertify.confirm(
                        'Importante', 
                        //'Desea eliminar la categoria "'+data.cNombreCategoria+'"', 
                        'La categoria que esta a punto de eliminar contiene productos. Si acepta se eliminaran los productos. <br> ¿Desea continuar?',                      
                        function(){ 
                            DeleteCat(id,true);                             
                        }, 
                        function(){ 
                            alertify.error('Cancelado')
                        }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
                }
                else{
                    DeleteCat(id,false);
                }//                                
                /*if(data.bExito){
                    alertify.error('Categoria eliminado correctamente');
                }  */                             
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    function DeleteCat(id,bEliminar){
        $.ajax({
            //url:url_global+'/DeleteCate',
            url:url_global+'/DeleteCate',            
            type:'POST',
            data: {
                "id": id,
                "bTodo": bEliminar
            },
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                //alertify.success('Eliminando...');
            },
            success: function(data, textStatus, jqXHR){                                
                                              
                if(data.bExito){
                    var msg = (data.bElimineProd) ? ' OK ' : '';
                    tblCategoria.draw();
                    alertify.error('Categoria eliminado correctamente');
                }                               
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    function VerifySubCat(id){
        $.ajax({
            //url:url_global+'/DeleteCate',
            url:url_global+'/VerifySubCat',            
            type:'POST',
            data: {
                "id": id
            },
            cache: false,            
            dataType: 'json',
            beforeSend: function(){          
                //alertify.success('Guardando...');
            },
            success: function(data, textStatus, jqXHR){                                                               

                if(data.bBool){
                    alertify.confirm(
                        'Importante', 
                        //'Desea eliminar la categoria "'+data.cNombreCategoria+'"', 
                        'La subcategoria que esta a punto de eliminar contiene productos. Si continua se eliminaran los productos. <br> ¿Desea continuar?',                      
                        function(){ 
                            DeleteSubCat(id,true);                             
                        }, 
                        function(){ 
                            alertify.error('Cancelado')
                        }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
                }
                else{
                    DeleteSubCat(id,false);
                }//                                
                /*if(data.bExito){
                    alertify.error('Categoria eliminado correctamente');
                }  */                             
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    function DeleteSubCat(id,bEliminar){
        $.ajax({
            //url:url_global+'/DeleteCate',
            url:url_global+'/DeleteSubCate',            
            type:'POST',
            data: {
                "id": id,
                "bTodo": bEliminar
            },
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                //alertify.success('Eliminando...');
            },
            success: function(data, textStatus, jqXHR){                                
                                              
                if(data.bExito){
                    var msg = (data.bElimineProd) ? ' OK ' : '';
                    tblCategoria.draw();
                    alertify.error('Categoria eliminado correctamente');
                }                               
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    function DeleteProd(id){
        $.ajax({
            url:url_global+'/DeleteProd',
            type:'POST',
            data: {
                "id": id
            },
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                //alertify.success('Guardando...');
            },
            success: function(data, textStatus, jqXHR){                                                                

                if(data.bExito){                    
                    alertify.error('Producto eliminado correctamente');                                                                                                
                }                               
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    function EditarProd(id,producto,categoria,subcategoria){
        console.log("sd");
        $.ajax({
            url:url_global+'/productoSave',
            type:'POST',
            data: {
                "id": id,
                "nombre_prod": producto,
                "categoria_prod": categoria,
                "Prodsubcategoria": subcategoria
            },
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                //alertify.success('Guardando...');
            },
            success: function(data, textStatus, jqXHR){                                                                

                if(data.redirect){
                    window.location.href = data.redirect;
                }

                if(data.Exito){                    
                    alertify.success('Producto Editado correctamente');                                                                                                
                }                               
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    function EditarCategoria(id,name_categoria){
        console.log("sd");
        $.ajax({
            url:url_global+'/GuardarCategoria',
            type:'POST',
            data: {
                "id": id,
                "nombre_categoria": name_categoria,                
                "editar":true
            },
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                //alertify.success('Guardando...');
            },
            success: function(data, textStatus, jqXHR){                                                                

                if(data.redirect){
                    window.location.href = data.redirect;
                }

                if(data.lErro){                    
                    alertify.success('Producto Editado correctamente');                                                                                                
                    GetCategorias();
                }
                else{
                    alertify.success('Ocurrio un problema.');   
                }                               
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    function EditarSubCategoria(id,name_categoria){
        console.log("sd");
        $.ajax({
            url:url_global+'/GuardarSubategoria',
            type:'POST',
            data: {
                "id": id,
                "nombre_subcategoria": name_categoria,                
                "editar":true
            },
            cache: false,            
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                //alertify.success('Guardando...');
            },
            success: function(data, textStatus, jqXHR){                                                                

                if(data.redirect){
                    window.location.href = data.redirect;
                }

                if(data.lErro){                    
                    alertify.success('Producto Editado correctamente');                                                                                                
                    GetCategorias();
                }
                else{
                    alertify.success('Ocurrio un problema.');   
                }                               
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }       

    function DeleteFile(id){
        $.ajax({
            url:url_global+'/DeleteFile',
            type:'POST',
            data: {
                "id": id
            },
            cache: false,            
            processData: true,
            dataType: 'json',
            beforeSend: function(){                          
            },
            success: function(data, textStatus, jqXHR){                                                                

                if(data.bExito){                    
                    alertify.error('Archivo eliminado correctamente'); 
                    tblarchivos.draw();                                                                                                
                }                               
            },
            error: function(data, textStatus, jqXHR){               
            } 
        });
    }

    function GetCategorias(){

        $.ajax({
            url:url_global+'/CategoriaCombo',
            type:'GET',
            //data: $(this).serializeArray(),
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                
            },
            success: function(data, textStatus, jqXHR){                                
                var elements = '<option value="0">Seleccione</option>';//<option value="0"> Seleccione </option>';                       
                for (var x in data) {                        
                   elements += '<option value="' + data[x].idCategoria + '">' + data[x].nombre + '</option>';
                }                                         
                

                $('#Prodcategoria').empty();
                $('#txtcategoria').empty();
                

                $('#Prodcategoria').append(elements); 
                $('#categoria_prod').append(elements);
                $('#txtcategoria').append(elements);

            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    $('#Prodcategoria').on('change',function(){

        console.log($(this).val());
        GetSubCategorias($(this).val());
    });

    $('#categoria_prod').on('change',function(){

        console.log($(this).val());
        GetSubCategorias($(this).val());
    });

    

    function GetSubCategorias($idCategoria){
        $.ajax({
            url:url_global+'/SubcategoriaCombo/'+$idCategoria,
            type:'GET',
            /*data: {
                "idCategoria": $idCategoria
            },*///$(this).serializeArray(),
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: false,
            dataType: 'json',
            beforeSend: function(){          
                
            },
            success: function(data, textStatus, jqXHR){                                
                
                console.log(data);                               
                $('#Prodsubcategoria').empty(); 
                $('#sub_categoria_prod').empty();                   
                
                if(data.length > 0){
                    var elements = '<option value="0">Seleccione</option>';//<option value="0"> Seleccione </option>';                       
                    
                    for (var x in data) {                        
                       elements += '<option value="' + data[x].idsubcategoria + '">' + data[x].cNombre + '</option>';
                    }                                                             
                    $('#Prodsubcategoria').prop('disabled', false);
                    $('#Prodsubcategoria').append(elements);
                    $('#sub_categoria_prod').prop('disabled', false);
                    $('#sub_categoria_prod').append(elements);
                    
                }
                else{
                    //$('#Prodsubcategoria').append(elements);
                    $('#sub_categoria_prod').prop('disabled', 'disabled');
                    $('#Prodsubcategoria').prop('disabled', 'disabled');
                }                            
            },
            error: function(data, textStatus, jqXHR){
               //alert(textStatus);
            } 
        });
    }

    function GetSeccion(seccion){
        
        var data = {
            'idSeccion': seccion
        };

        $.ajax({
            url:url_global+'/portada',
            type:'POST',
            data: data,
            cache: false,
            //contentType: 'application/x-www-form-urlencoded',
            processData: true,
            dataType: 'json',
            beforeSend: function(){          
                
            },
            success: function(data, textStatus, jqXHR){                                                                
                $('#summernote').summernote('code',data.Contenido);
                ContentLoader(data);                
            },
            error: function(data, textStatus, jqXHR){
                alertify.error(textStatus);               
            } 
        });
    }

    function ContentLoader(content){

        var objects = {
            'titulo': 'tituloIni',
            'subtitulo': 'contenidoSub',
            'tituSeccion1': 'sec1',
            'ContentSeccion1': 'prewiew1',
            'tituSeccion2':'sec2',
            'ContentSeccion2':'prewiew2',
            'tituSeccion3':'sec3',
            'ContentSeccion3': 'prewiew3'                                                           
        };

        var objectsDefault = {
            'titulo': 'Titulo',
            'subtitulo': 'Muestra de contenido principal',
            'tituSeccion1': 'Seccion 1',
            'ContentSeccion1': '',
            'tituSeccion2':'Seccion 2',
            'ContentSeccion2':'',
            'tituSeccion3':'Seccion 3',
            'ContentSeccion3': ''                                                           
        };
        
        if(content.Contenido){
            $('#'+objects[content.Seccion]).html(content.Contenido);
        }
        else{
            $('#'+objects[content.Seccion]).html(objectsDefault[content.Seccion]);

        }
    }

    $('#marca_marpe').on('click',function(){

        if($(this).is(':checked')){
            $('#Prodcategoria').prop('disabled', true);    
        }
        else{
            $('#Prodcategoria').prop('disabled', false);
        }
    });

    $('#file-upload').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#file-upload')[0].files[0].name;        
        $(this).prev('label').text(file);
    });

    $('.form_file').on('submit',function(e){  

       event.preventDefault();

        var dataFile = new FormData();
        if($('input[type=file]')[0].files.length == 0){
            alertify.error('Por favor selecciona un archivo para continuar.');
            return false;
        }
        jQuery.each($('input[type=file]')[0].files, function(i, file) {
            dataFile.append('file-'+i, file);
        });

        $.ajax({
            url:$(this).attr('action'),
            type:'POST',
            data: dataFile,
            cache: false,            
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function(){          
                
            },
            success: function(data, textStatus, jqXHR){                            

                if(data.redirect){
                    window.location.href = data.redirect;
                }

                if(data.bError){
                    alertify.error(data.mError);  
                }
                else{
                    alertify.success(data.mError); 
                    tblarchivos.draw();  
                    $('input[type=file]').val(''); 
                    $('#file-upload').prev('label').text("Selecciona Archivo."); 
                }                
            },
            error: function(data, textStatus, jqXHR){
            }
        });

    });
 