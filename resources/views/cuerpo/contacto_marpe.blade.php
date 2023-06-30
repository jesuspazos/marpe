@extends('base.base_marpemx')


@section('content')


<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="wrapper">												
							<div class="row no-gutters">
								<div class="col-md-7 d-flex">	
									<div class="contact-wrap w-100 p-md-5 p-4">

									
										<h3 class="mb-4">Contactame</h3>
										@if(isset($Contenido['mensaje']))
											{!!$Contenido['mensaje']!!}
										@endif

										{!!\Session::get('mensaje')!!}

										<form action="{{url('sendMail')}}" method="POST" id="contactForm" class="contactForm">
											{{ csrf_field() }}
											<div class="row">												
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" class="form-control" name="name_contacto" id="name_contacto" required placeholder="Nombre">
													</div>
												</div>
												<div class="col-md-6"> 
													<div class="form-group">
														<input type="email" class="form-control" name="email_contacto" id="email_contacto" required placeholder="Correo">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" class="form-control" name="asunto_contacto" id="asunto_contacto" required placeholder="Asunto">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<textarea name="mensaje_contacto" class="form-control" id="mensaje_contacto" required cols="30" rows="7" placeholder="Mensaje"></textarea>
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<div class="g-recaptcha" data-sitekey=""></div>
													</div>
												</div>
												
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" value="Enviar Mensaje" class="btn btn-primary">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-5 d-flex align-items-stretch">
									<div class="info-wrap bg-primary w-100 p-lg-5 p-4">
										<h3 class="mb-4 mt-md-4">Conocenos</h3>
					        	<div class="dbox w-100 d-flex align-items-start">
					        		<div class="icon d-flex align-items-center justify-content-center">
					        			<span class="fa fa-map-marker"></span>
					        		</div>
					        		<div class="text pl-3">
						            <p><span>Dirección:</span> {{isset($Contenido['DireccionInfo']) ? $Contenido['DireccionInfo'] : '' }}</p>
						          </div>
					          </div>
					        	<div class="dbox w-100 d-flex align-items-center">
					        		<div class="icon d-flex align-items-center justify-content-center">
					        			<span class="fa fa-phone"></span>
					        		</div>
					        		<div class="text pl-3">
						            <p><span>Telefono:</span> <a href="tel://1234567920">{{isset($Contenido['TelefonoInfo']) ? $Contenido['TelefonoInfo'] : '' }}</a></p>
						          </div>
					          </div>
					        	<div class="dbox w-100 d-flex align-items-center">
					        		<div class="icon d-flex align-items-center justify-content-center">
					        			<span class="fa fa-paper-plane"></span>
					        		</div>
					        		<div class="text pl-3">
						            <p><span>Correo:</span> <a href="mailto:info@yoursite.com">{{isset($Contenido['CorreoInfo']) ? $Contenido['CorreoInfo'] : '' }}</a></p>
						          </div>
					          </div>
					        	<div class="dbox w-100 d-flex align-items-center">
					        		<div class="icon d-flex align-items-center justify-content-center">
					        			<span class="fa fa-globe"></span>
					        		</div>
					        		<div class="text pl-3">
						            <p><span>Sitio Web</span> 
						            	
						           		<b>{{isset($Contenido['WebInfo']) ? $Contenido['WebInfo'] : '' }}</b>
						            </p>
						          </div>
					          </div>
				          </div>
								</div>
							</div>
						</div>
					</div>
				</div>
    	</div>
    </section>

@endsection

@section('script')
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
