<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Contacto</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">          
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">            
            <div class="card">
              <div class="card-body">
                <form action="{{url('GuardarInformacion')}}" method="POST">
                    <input type="hidden" name="menu_seccion" value="Inicio">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <h3>Información Portada</h3>
                        <br>
                        <select class="form-control" name="seccionIn" id="seccionIn">
                          <option value="0">Seleccione</option>
                          <option value="titulo">Titulo</option>
                          <option value="subtitulo">Subtitulo</option>
                          <option value="tituSeccion1">Titulo seccion 1</option>
                          <option value="ContentSeccion1">Contenido Seccion 1</option>
                          <option value="tituSeccion2">Titulo seccion 2</option>
                          <option value="ContentSeccion2">Contenido Seccion 2</option>
                          <option value="tituSeccion3">Titulo seccion 3</option>
                          <option value="ContentSeccion3">Contenido Seccion 3</option>
                        </select><br>

                        <div id="summernote"></div>

                        <div class="form-group">
                          <input type="submit" name="btnSubmit" align="center" id="btnContact" class="btn btn-info pull-left" value="Vista Previa"/>
                        </div>
                      </div>                    
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <br>
                        <div id="preview">                      
                        </div>                    
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 heading-section ftco-animate py-md-4">
                        <h2 class="mb-4" id="tituloIni">Vista Previa</h2>
                        <p id="contenidoSub">Te mostramos una vista previa del contenido de la vista principal</p>                                        
                        <div class="tabulation-2 mt-4">
                          <ul class="nav nav-pills nav-fill d-md-flex d-block">
                            <li class="nav-item mb-md-0 mb-2">
                              <a class="nav-link active py-3" id="sec1" data-toggle="tab" href="#prewiew1">Seccion 1</a>
                            </li>
                            <li class="nav-item px-lg-2 mb-md-0 mb-2">
                                <a class="nav-link py-3" id="sec2" data-toggle="tab" href="#prewiew2">Seccion 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-3 mb-md-0 mb-2" id="sec3" data-toggle="tab" href="#prewiew3">Seccion 3</a>
                            </li>
                          </ul>
                      
                          <div class="tab-content rounded mt-2">
                            <div class="tab-pane container p-0 active area-content" id="prewiew1"></div>                            
                            <div class="tab-pane container p-0 fade area-content" id="prewiew2"></div>
                            <div class="tab-pane container p-0 fade area-content" id="prewiew3"></div>
                          </div>

                          <br>
                          <div class="form-group">
                            <input type="submit" name="btnGuarda" align="center" id="btnGuarda" class="btn btn-info pull-left" value="Guardar"/>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>  
          </div>
          
          <!----INICIO TAB 2----->
          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">            
            <div class="card">
              <h3 style="margin: 20px 20px;">Información Nosotros</h3>
                <div class="card-body">
                  <form action="{{url('GuardarInformacion')}}" method="POST" id="form-nosotros"> 
                    <input type="hidden" name="menu_seccion" value="Nosotros">
                    {{ csrf_field() }}
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="file" name="imagenMuestra" accept="image/*" id="imagenMuestra">
                        </div>
                        <div class="form-group">
                          <label for="txtTituloNosotros">Titulo Nosotros:</label>
                          <input type="text" name="txtTituloNosotros" id="txtTituloNosotros" class="form-control" placeholder="Titulo" value="{{(isset($forms['tituloNosotros'])) ? $forms['tituloNosotros']['Valor'] : 'Dato Default' }}" />
                        </div>
                        <div class="form-group">
                          <label for="txtTituloNosotros">Descripción Historia:</label>
                          <textarea name="txtHistoriaNosotros" class="form-control txtHistoriaNosotros" placeholder="Escribe la breve historia" >{{ (isset($forms['tituloNosotros'])) ? $forms['tituloNosotros']['Descripcion'] : 'Dato Default' }}</textarea>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="imagen_nosotros" id="titulo_img_nosotros">Imagen</label> 
                          <div class="imagen_nosotros" id="imagen_nosotros" style="border: 1px solid black;  {{ (isset($forms['imagenNosotros'])) ? 'background:url("'.$forms["imagenNosotros"]["Valor"].'") no-repeat' : '' }}" ><!--    ../../images/info.jpg-->
                            <input type="hidden" name="nameImagen" id="nameImagen" value="{{ (isset($forms["imagenNosotros"])) ? $forms["imagenNosotros"]["Valor"] : '' }}">   
                          </div>                                           
                        </div>
                      </div>
                    </div> 
                    
                    <!--<div class="row">
                      <div class="col-md-6">
                      </div>
                      <div class="col-md-6">                                      
                      </div>
                    </div>   -->
                    <hr>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <h4>Nuestras Fuerzas</h4>
                      </div>                      
                    </div>
                    
                    <br>
                    
                    <div class="row">                        
                        <div class="col-md-4 col-xs-12">
                          <div class="form-group">
                              <label for="tituloMision">Contenido Abierto 1</label>
                              <input type="text" class="form-control" name="tituloMision" value="{{ (isset($forms['infoMision'])) ? $forms['infoMision']['Valor'] : 'Texto Default'}}" id="tituloMision"><br>
                              <textarea name="txtMision"  class="form-control textareaobjeti">{{ (isset($forms['infoMision'])) ? $forms['infoMision']['Descripcion'] : ''}}</textarea>
                          </div>
                        </div>
                        <div class="col-md-4">                      
                          <div class="form-group">
                            <label for="tituloVision">Contenido Abierto 2</label>
                            <input type="text" class="form-control" name="tituloVision" value="{{ (isset($forms['infoVision'])) ? $forms['infoVision']['Valor'] : 'Texto Default'}}" id="tituloVision"><br>
                            <textarea name="txtVision" class="form-control textareaobjeti">{{ (isset($forms['infoVision'])) ? $forms['infoVision']["Descripcion"] : ''}}</textarea>
                          </div>
                        </div>
                        <div class="col-md-4">                      
                          <div class="form-group">
                            <label for="tituloValores">Contenido Abierto 2</label>
                            <input type="text" class="form-control" name="tituloValores" value="{{ (isset($forms['infoValores'])) ? $forms['infoValores']['Valor'] : 'Texto Default'}}" id="tituloValores"><br>
                            <textarea name="txtValores" class="form-control textareaobjeti">{{ (isset($forms['infoValores'])) ? $forms['infoValores']["Descripcion"] : ''}}</textarea>
                          </div>
                        </div>
                    </div>

                    <div class="row">          
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="submit" name="btnSubmit" class="btn btn-info pull-left" value="Guardar" />
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>       
          </div>
          <!----FIN TAB 2----->
            <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                          <h4>Información de contacto</h4>
                          <hr>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <form action="{{url('guardarContacto')}}" method="POST" id="form-contacto">
                            <input type="hidden" name="menu_seccion" value="Contacto">
                            {{ csrf_field() }}
                            <div class="form-group row">
                              <label for="DireccionInfo" class="col-4 col-form-label">Dirección</label> 
                              <div class="col-8">
                                <textarea id="DireccionInfo" name="DireccionInfo" cols="40" rows="4" class="form-control" style="resize: none;">{{isset($forms['DireccionInfo']) ? $forms['DireccionInfo']['Valor'] : '' }}</textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="TelefonoInfo" class="col-4 col-form-label">Telefono </label> 
                              <div class="col-8">
                                <input id="TelefonoInfo" name="TelefonoInfo" placeholder="Telefono" class="form-control here" required="required" type="text" value="{{isset($forms['TelefonoInfo']) ? $forms['TelefonoInfo']['Valor'] : '' }}">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="CorreoInfo" class="col-4 col-form-label">Correo</label> 
                              <div class="col-8">
                                <input id="CorreoInfo" name="CorreoInfo" placeholder="Correo" class="form-control here" required="required" type="text" value="{{isset($forms['CorreoInfo']) ? $forms['CorreoInfo']['Valor'] : '' }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="WebInfo" class="col-4 col-form-label">Sitio Web</label> 
                              <div class="col-8">
                                <input id="WebInfo" name="WebInfo" placeholder="Sitio Web" class="form-control here" type="text" value="{{isset($forms['WebInfo']) ? $forms['WebInfo']['Valor'] : '' }}">
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label for="CorreoMail" class="col-4 col-form-label">Correo del area del mensaje <br> Este correo es donde llegaran los mensajes que se envian desde la pagina</label> 
                              <div class="col-8">
                                <input id="CorreoMail" name="CorreoMail" placeholder="Correo a configurar" class="form-control here" type="text" value="{{isset($forms['CorreoMail']) ? $forms['CorreoMail']['Valor'] : '' }}">
                              </div>
                            </div>

                            <hr>
                            
                            <h3>Redes Sociales</h3>

                            <div class="form-group row">
                              <label for="fbInput" class="col-4 col-form-label">Facebook</label> 
                              <div class="col-8">
                                <input id="fbInput" name="fbInput" placeholder="Sitio Web" class="form-control here" type="text" value="{{isset($forms['fbInput']) ? $forms['fbInput']['Valor'] : '' }}">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="twInput" class="col-4 col-form-label">Twitter</label> 
                              <div class="col-8">
                                <input id="twInput" name="twInput" placeholder="Sitio Web" class="form-control here" type="text" value="{{isset($forms['twInput']) ? $forms['twInput']['Valor'] : '' }}">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="igInput" class="col-4 col-form-label">Instagram</label> 
                              <div class="col-8">
                                <input id="igInput" name="igInput" placeholder="Sitio Web" class="form-control here" type="text" value="{{isset($forms['igInput']) ? $forms['igInput']['Valor'] : '' }}">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="ytInput" class="col-4 col-form-label">Youtube</label> 
                              <div class="col-8">
                                <input id="ytInput" name="ytInput" placeholder="Sitio Web" class="form-control here" type="text" value="{{isset($forms['ytInput']) ? $forms['ytInput']['Valor'] : '' }}">
                              </div>
                            </div>

                            <hr>

                            <h3>Horarios de Oficina</h3>
                            <br>

                            <div class="form-group row">                              
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <div class="input-wrap">
                                            <h3>Entre semana</h3>
                                            <div class="icon"><label for="" class="col-4 col-form-label">Dias</label> <span class="fa fa-calendar"></span></div>
                                            <select name="labores_semana" class="form-control" multiple="multiple" id="labores_semana">
                                              <!--<option value='0'>Seleccione</option>-->
                                              <option value='1'>Lunes</option>
                                              <option value='2'>Martes</option>
                                              <option value='3'>Miercoles</option>
                                              <option value='4'>Jueves</option>
                                              <option value='5'>Viernes</option>                                              
                                              <option value='6'>Sabado</option>
                                              <option value='7'>Domingo</option>
                                            </select>
                                          </div>
                                          <script type="text/javascript">                                            
                                            var Valores2 = "{{(isset($forms['diasSemana'])) ? $forms['diasSemana']['Valor'] : '0,0,0,0'}}";
                                            var lstValores2 = Valores2.split(',');                                            
                                          </script>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="row clock">                                      
                                      <div class="col-md-3">  
                                          <label for="Ini"></label>
                                          <div class="icon"><span class="fa fa-clock-o"></span>Inicio</div>                                          
                                          <input type="text" id="InihorarioSe" name="InihorarioSe" value="{{isset($forms['HorariosSemana']) ? explode('@',$forms['HorariosSemana']['Valor'])[0] : '' }}" class="form-control appointment_time" placeholder="Time">                                        
                                      </div>                                    
                                      
                                      <div class="col-md-3">          
                                            <label for="Fin"></label>                                                                                                              
                                            <div class="icon"><span class="fa fa-clock-o"></span>Fin</div>
                                            <input type="text" id="FinhorarioSe" name="FinhorarioSe" value="{{isset($forms['HorariosSemana']) ? explode('@',$forms['HorariosSemana']['Valor'])[1] : '' }}" class="form-control appointment_time" placeholder="Time">                                        
                                      </div>         
                                  </div>                                                             
                                </div>
                            </div>

                            <div class="form-group row">                              
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <div class="input-wrap">
                                            <h3>Fin de</h3>                                        
                                            <div class="icon"><label for="DS" class="col-4 col-form-label">Dias</label> <span class="fa fa-calendar"></span></div>
                                            <select name="labores_finsemana" class="form-control" multiple="multiple" id="labores_finsemana">                                              
                                              <option value='1'>Lunes</option>
                                              <option value='2'>Martes</option>
                                              <option value='3'>Miercoles</option>
                                              <option value='4'>Jueves</option>
                                              <option value='5'>Viernes</option>                                              
                                              <option value='6'>Sabado</option>
                                              <option value='7'>Domingo</option>
                                            </select>                                          
                                          </div>
                                          <script type="text/javascript">                                            
                                            var Valores = "{{ isset($forms['diasFin']) ? $forms['diasFin']['Valor'] : '0,0,0,0' }}";
                                            var lstValores = Valores.split(',');                                            
                                          </script>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="row clock">                                      
                                      <div class="col-md-3">  
                                          <label for="Ini"></label>
                                          <div class="icon"><span class="fa fa-clock-o"></span>Inicio</div>
                                          <input type="text" id="InihorarioFin" name="InihorarioFin" value="{{isset($forms['HorariosFinSemana']) ? explode('@',$forms['HorariosFinSemana']['Valor'])[0] : '' }}" class="form-control appointment_time" placeholder="Time">                                        
                                      </div>                                    
                                      
                                      <div class="col-md-3">          
                                            <label for="Fin"></label>                                                                                                              
                                            <div class="icon"><span class="fa fa-clock-o"></span>Fin</div>
                                            <input type="text" id="FinhorarioFin" name="FinhorarioFin" value="{{isset($forms['HorariosFinSemana']) ? explode('@',$forms['HorariosFinSemana']['Valor'])[1] : '' }}" class="form-control appointment_time" placeholder="Time">                                        
                                      </div>         
                                  </div>
                                </div>
                            </div>                            
                            <div class="row">          
                              <div class="col-md-6">
                                <div class="form-group">
                                  <input type="submit" name="btnSubmit" class="btn btn-info pull-left" value="Guardar" />
                                </div>
                              </div>
                            </div>
                          </form>
                      </div><!--Fin col-md-12-->
                  </div><!--Fin row-->                              
                </div><!--Card-body-->
              </div><!--Fin Card-->
            </div>
        </div>
      </div>
    </div>
  </div>
</div>