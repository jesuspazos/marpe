@extends('base.base')


@section('content')


<section class="section section-sm section-first bg-default text-md-left">
        <div class="container">
          <div class="row row-50 justify-content-center align-items-xl-center">
            <div class="col-md-10 col-lg-5 col-xl-6"><img src="{{ (isset($Contenido['UrlImagen'])) ? $Contenido['UrlImagen'] : '' }}" alt="" width="519" height="564"/>
            </div>
            <div class="col-md-10 col-lg-7 col-xl-6">
              <h1 class="text-spacing-25 font-weight-normal title-opacity-9">{{ isset($Contenido['TituloNosotros']) ? $Contenido['TituloNosotros'] : "Titulo Default"}}</h1>
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-4">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-4-1" data-toggle="tab">{{(isset($Contenido['TituloMision']) ? $Contenido['TituloMision'] : '')}}</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-2" data-toggle="tab">{{(isset($Contenido['TituloVision']) ? $Contenido['TituloVision'] : '')}}</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-3" data-toggle="tab">{{(isset($Contenido['TituloValores']) ? $Contenido['TituloValores'] : '')}}</a></li>
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-4-1">
                    <p>{{ (isset($Contenido['Mision'])) ? $Contenido['Mision'] : '' }}</p>
                    <!-- Linear progress bar-->
                    <!-- <article class="progress-linear progress-secondary">
                      <div class="progress-header">
                        <p>Tours</p>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear" data-gradient=""><span class="progress-value">79</span><span class="progress-marker"></span></div>
                      </div>
                    </article> -->
                    <!-- Linear progress bar-->
                    <!-- <article class="progress-linear progress-orange">
                      <div class="progress-header">
                        <p>Excursions</p>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear" data-gradient=""><span class="progress-value">72</span><span class="progress-marker"></span></div>
                      </div>
                    </article> -->
                    <!-- Linear progress bar-->
                    <!-- <article class="progress-linear">
                      <div class="progress-header">
                        <p>Hotel Bookings</p>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear" data-gradient=""><span class="progress-value">88</span><span class="progress-marker"></span></div>
                      </div>
                    </article> -->
                  </div>
                  <div class="tab-pane fade" id="tabs-4-2">
                    <div class="row row-40 justify-content-center text-center inset-top-10">
                      <p>{{(isset($Contenido['Vision'])) ? $Contenido['Vision'] : '' }}</p>
                    </div>
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Get in touch</a><a class="button button-black-outline button-width-xl-230" href="#">Read more</a></div>
                  </div>
                  <div class="tab-pane fade" id="tabs-4-3">
                    <p>{{(isset($Contenido['Valores'])) ? $Contenido['Valores'] : '' }}</p>
                    
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Get in touch</a><a class="button button-black-outline button-md" href="#">Download presentation</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


@endsection