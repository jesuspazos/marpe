var myDropzone = '';

Dropzone.autoDiscover = false;

myAwesomeDropzone = {
    url: url_global+'/productoSave',
    addRemoveLinks: true,
    paramName: "Archivo",
    maxFilesize: 4, // MB
    dictRemoveFile: "Quitar",
    dictInvalidFileType: "Archivo no valido",
    dictFileTooBig: "El archivo es muy grande ({{filesize}} Mb). Tamaño Permitido: {{maxFilesize}} Mb.",
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    autoDiscover: false,
    accept:function(file, done) {
        
        alertify.set('notifier','position', 'top-center');        
        
        if($('#Prodcategoria').val() == 0 && !$('#marca_marpe').is(':checked')){            
            alertify.error('Por favor selecciona una categoría');  
            this.removeAllFiles(true); 
            return false;
        }        

        if($('#NameProducto').val() == ''){            
            alertify.error('Por favor ingresa el nombre del produto');  
            this.removeAllFiles(true); 
            return false;
        }      

        done();
        
    },
    init: function() {                                
        this.on("addedfile", function() {                            
            if(this.files[1]!=null){
                this.removeFile(this.files[0]);
            }
        });        
    },
    sending: function(file,xhr,formdata){
       console.log(file);
    },

    success: function (file, response) {
        var imgName = response;
        console.log(response);
        //console.log("Successfully uploaded :" + imgName);
        file.previewElement.classList.add("dz-success");
        alertify.set('notifier','position', 'top-center');        
        alertify.success(response.urlImg); 
        tempThis = this;
        setTimeout(function(){
            tempThis.removeAllFiles(true);
            $('#Prodcategoria').val('0');
            $('#NameProducto').val('');
        }, 4000); 
        
        if($('#marca_marpe').is(':checked')){
            $('#marca_marpe').prop('checked', false);
            $('#Prodcategoria').prop('disabled', false); 
            tblMarcas.draw();
        }        
        else{
            tblProductos.draw();
        }
        theCode.summernote('code');       
    },
    error: function (file, response) {
      //file.previewElement.classList.add("dz-error");
      //file.previewElement.classList.add("dz-error");
      //$(file.previewElement).addClass("dz-error").find('.dz-error-message').text(response);
      alertify.error(response); 
    }
} // FIN myAwesomeDropzone

if($('#dZUpload').length) {
    myDropzone = new Dropzone("#dZUpload", myAwesomeDropzone); 
}