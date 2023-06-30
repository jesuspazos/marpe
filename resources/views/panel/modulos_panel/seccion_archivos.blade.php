<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card mt-3 tab-card">
        <div class="tab-content" id="myTabContent">  
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">            
            <div class="card">
              <div class="card-body">
                <form action="{{url('GuardarArchivo')}}" class="form_file" method="POST">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Archivos</h3>
                      <br>
                      <div class="form-group">                        
                        <div class="custom-file-upload">
                          <label for="file-upload" class="custom-file-upload1">
                              <i class="fa fa-cloud-upload"></i> Selecciona Archivo.
                          </label>
                          <input id="file-upload" type="file" name="file-upload" />
                        </div>                       
                      </div>                                      
                      <div class="form-group">
                        <input type="submit" name="btnSubmit" class="pull-right btn btn-default" value="Guardar" />
                      </div>
                    </div>                    
                  </div>
                  <br>
                  <div class="row">          
                    <div class="col-md-12">
                        <div class="table-resposive">
                          <table class="table table-striped data_table" width="100%" id="tblarchivos">
                            <thead>
                            <th>No registro</th>
                            <th>Nombre</th>
                            <th>Link</th>
                            <th>Opciones</th>
                            </thead>
                          </table>
                        </div>
                    </div>
                  </div>
                </form>                                       
              </div><!--Card-body-->
            </div><!--Fin Card-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 