@extends('base.base')


@section('content')


	<section class="section section-sm section-last bg-default text-left">
        <div class="container">
			<article class="title-classic">
				<div class="title-classic-title">
				  <h3>Contactanos</h3>
				</div>
				<!-- <div class="title-classic-text">
				  <p>If you have any questions, just fill in the contact form, and we will answer you shortly.</p>
				</div> -->				
			</article>

			<article class="title-classic">
				@if(isset($Contenido['mensaje']))				
					{!!$Contenido['mensaje']!!}
				@endif			
				
				{!! \Session::get('mensaje') !!}				
			</article>

			<form action="{{url('sendMail')}}" method="POST" class="rd-form rd-form-variant-2 rd-mailform" data-form-output="form-output-global" data-form-type="contact">
				{{ csrf_field() }}
				<div class="row row-14 gutters-14">
				  	<div class="col-md-4">
				    	<div class="form-wrap">
				      		<input class="form-input" id="name_contacto" type="text" name="name_contacto" placeholder="Nombre">
				      		<!-- <label class="form-label" for="name_contacto">Nombre</label> -->
				    	</div>
				  	</div>
				  	<div class="col-md-4">
				    	<div class="form-wrap">
				      		<input class="form-input" id="email_contacto" type="text" name="email_contacto" placeholder="Correo">
				      		<!-- <label class="form-label" for="email_contacto">Correo</label> -->
				    	</div>
				  	</div>				 
				  	<div class="col-12">
				    	<div class="form-wrap">
				      		<!-- <label class="form-label" for="mensaje_contacto">Mensaje</label> -->
				      		<textarea class="form-input textarea-lg" id="mensaje_contacto" name="mensaje_contacto" required placeholder="Mensaje"></textarea>
				    	</div>
				  	</div>

				  	<div class="col-md-12">
						<div class="form-group">
							<div class="g-recaptcha" data-sitekey="{{env('KEYCAPTCHA_PUBLIC')}}"></div>
						</div>
					</div>
				</div>
				<button class="button button-primary button-pipaluk" type="submit">Enviar</button>
			</form>
        </div>
    </section>

@endsection

@section('script')
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
