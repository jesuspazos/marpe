<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card mt-3 tab-card">
        <div class="tab-content" id="myTabContent">  
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">                        
            <div class="card">              
              <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link" id="one-cate" data-toggle="tab" href="#one_cate_1" role="tab" aria-controls="One" aria-selected="true">Categorías</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="two-cate" data-toggle="tab" href="#two_cate_2" role="tab" aria-controls="Two" aria-selected="false">Subcategorías</a>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                
                <div id="ediCate" class="modal modales">
                  <h2>Edición</h2>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nombre_categoria">Nombre Categoría</label>
                        <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria">
                        <input type="hidden" id="id_categoria">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="submit" id="GuardarEditCategoria" value="Guardar" class="btn btn-primary">                        
                        <a href="#" rel="modal:close" class="btn btn-primary">Cerrar</a>
                        <div class="submitting"></div>
                      </div>                    
                    </div>
                  </div>
                </div>

                <div id="editarSubCat" class="modal modales">
                  <h2>Edición</h2>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nombre_categoria">Nombre Subcategoría</label>
                        <input type="text" class="form-control" name="nombre_subcategoria_edit" id="nombre_subcategoria_edit">
                        <input type="hidden" id="id_subcategoria">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="submit" id="GuardarEditSubCategoria" value="Guardar" class="btn btn-primary">
                        <div class="submitting"></div>
                      </div>
                    </div>
                  </div>
                </div>
                

                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active p-3" id="one_cate_1" role="tabpanel" aria-labelledby="one-cate">
                    <form action="{{url('GuardarCategoria')}}" class="form_cat" method="POST">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-12">
                          <h3>Categorias</h3>
                          <br>
                          <div class="form-group">                        
                            <input type="text" id="txtTituloCategoria" name="txtTituloCategoria" class="form-control" placeholder="Titulo" value="" />                        
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
                              <table class="table table-striped data_table" width="100%" id="tblCategoria">
                                <thead>
                                <th>No registro</th>
                                <th>Nombre</th>
                                <th>Estatus</th>
                                <th>Opciones</th>
                                </thead>
                              </table>
                            </div>
                        </div>
                      </div>
                    </form>  
                  </div><!--fin tab1-->
                  <div class="tab-pane fade p-3" id="two_cate_2" role="tabpanel" aria-labelledby="two-cate">
                    <form action="{{url('GuardarSubategoria')}}" class="form_subcat" method="POST">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-12">
                          <h3>Subcategorias</h3>
                          <br>
                          <div class="form-group">
                            <label for="txtTituloSubcategoria">Subcategoría</label>                        
                            <input type="text" id="txtTituloSubcategoria" name="txtTituloSubcategoria" class="form-control" placeholder="Titulo" value="" />                        
                          </div>
                          <div class="form-group">                        
                            <!--<input type="text" name="txtTituloCategoria" class="form-control" placeholder="Titulo" value="" />-->
                            <label for="txtcategoria">Categoría</label>
                            <select class="form-control" name="txtcategoria" id="txtcategoria"></select>
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
                              <table class="table table-striped data_table" width="100%" id="tblSubcategoria">
                                <thead>
                                <th>No registro</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Opciones</th>
                                </thead>
                              </table>
                            </div>
                        </div>
                      </div>
                    </form> 
                  </div><!--fin tab2-->
                </div><!--Fin tab content-->
              </div><!--Card-body-->
            </div><!--Fin Card-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>