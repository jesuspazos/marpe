<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card mt-3 tab-card">        
        <div class="tab-content" id="myTabContent">  
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">            
            <div class="card">                            
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <h3>Productos</h3><br>
                        <form id='dZUpload' class='dropzone borde-dropzone' style='cursor: pointer;'>
                        <div class="form-group">
                          <div class="row mbr-justify-content-center">
                            <div class="col-lg-3 mbr-col-md-3">
                                <div class="wrap_card">
                                  <label for="marca_marpe"><b>¿Marca?</b>
                                  <div class="switch_box box_4">
                                    <div class="input_wrapper">
                                      <input type="checkbox" class="switch_4" name="marca_marpe" id="marca_marpe">
                                      <svg class="is_checked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.67 426.67">
                                        <path d="M153.504 366.84c-8.657 0-17.323-3.303-23.927-9.912L9.914 237.265c-13.218-13.218-13.218-34.645 0-47.863 13.218-13.218 34.645-13.218 47.863 0l95.727 95.727 215.39-215.387c13.218-13.214 34.65-13.218 47.86 0 13.22 13.218 13.22 34.65 0 47.863L177.435 356.928c-6.61 6.605-15.27 9.91-23.932 9.91z"/>
                                      </svg>
                                      <svg class="is_unchecked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.982 212.982">
                                        <path d="M131.804 106.49l75.936-75.935c6.99-6.99 6.99-18.323 0-25.312-6.99-6.99-18.322-6.99-25.312 0L106.49 81.18 30.555 5.242c-6.99-6.99-18.322-6.99-25.312 0-6.99 6.99-6.99 18.323 0 25.312L81.18 106.49 5.24 182.427c-6.99 6.99-6.99 18.323 0 25.312 6.99 6.99 18.322 6.99 25.312 0L106.49 131.8l75.938 75.937c6.99 6.99 18.322 6.99 25.312 0 6.99-6.99 6.99-18.323 0-25.313l-75.936-75.936z" fill-rule="evenodd" clip-rule="evenodd"/>
                                      </svg>
                                    </div>
                                  </div>
                                  </label>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="Prodcategoria">Categoría</label>
                            <select class="form-control" name="Prodcategoria" id="Prodcategoria"></select>
                        </div>

                        <div class="form-group">
                            <label for="Prodsubcategoria">Subcategoría</label>
                            <select class="form-control" name="Prodsubcategoria" id="Prodsubcategoria"></select>
                        </div>

                        <div class="form-group">
                            <label for="NameProducto">Nombre</label>
                            <input type="text" class="form-control" name="NameProducto" id="NameProducto" value="">
                        </div>
                         <div class='dz-default dz-message text-center'>
                           <span><h3>Arrastra la imagen</h3></span>
                           <br>
                            <p>(o Clic para seleccionar)</p>
                          </div>                            
                        </form>
                    </div>                  
                </div>    
                <br>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-12">                                    
                  <!-----------------------INICIO DE MI ---------------------->                  
                  <div class="card mt-12 tab-card">
                    <div class="card-header tab-card-header">
                      <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="one-tab1" data-toggle="tab" href="#one1" role="tab" aria-controls="One" aria-selected="true">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="two-tab1" data-toggle="tab" href="#two1" role="tab" aria-controls="Two" aria-selected="false">Marcas</a>
                        </li>
                      </ul>
                    </div>
                    
                    
                    <div class="tab-content" id="myTabContent">          
                      <div class="tab-pane fade show active p-3" id="one1" role="tabpanel" aria-labelledby="one-tab1">            
                        <div class="card">
                          <div class="card-body">

                            <div id="ex1" class="modal">
                              <h2>Edición</h2>
                              <br>
                              
                              <div class="row">                       
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="nombre_prod">Nombre Producto</label>
                                    <input type="text" class="form-control" name="nombre_prod" id="nombre_prod">
                                    <input type="hidden" id="id_prod">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="categoria_prod">Categoria Producto</label>
                                    <!--<input type="text" class="form-control" name="categoria_prod" id="categoria_prod">-->
                                    <select class="form-control" name="categoria_prod" id="categoria_prod">
                                      
                                    </select>
                                  </div>
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="sub_categoria_prod">Subcategoría Producto</label>
                                    <!--<input type="text" class="form-control" name="categoria_prod" id="categoria_prod">-->
                                    <select class="form-control" name="sub_categoria_prod" id="sub_categoria_prod">
                                      
                                    </select>
                                  </div>
                                </div>  
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <input type="submit" id="GuardarEdit" value="Guardar" class="btn btn-primary">
                                    <div class="submitting"></div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="table-resposive">
                              <table class="table table-striped data_table" width="100%" id="tblProductos">
                                <thead>
                                  <th>#</th>
                                  <th>Nombre</th>
                                  <th>Categoria</th>
                                  <th>Imagen</th>
                                  <th>Opciones</th>
                                </thead>
                              </table>
                            </div>
                          </div>
                        </div>  
                      </div>
          
                      <!----INICIO TAB 2----->
                      <div class="tab-pane fade p-3" id="two1" role="tabpanel" aria-labelledby="two-tab1">            
                          <div class="card">                          
                            <div class="card-body">
                              <table class="table table-striped data_table" width="100%" id="tblMarcas">
                                <thead>
                                  <th>#</th>
                                  <th>Nombre</th>
                                  <!--<th>Categoria</th>-->
                                  <th>Imagen</th>
                                  <th>Opciones</th>
                                </thead>
                              </table>
                            </div>
                          </div>       
                      </div>                    
                    </div>
                  </div>
                  <!----------------------FIN DE MI -------------------------->
                  </div>
                </div>                                                    
              </div><!--Card-body-->
            </div><!--Fin Card-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 