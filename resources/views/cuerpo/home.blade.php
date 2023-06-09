@extends('base.base_marpemx')


@section('content')
  
      <!-- Page Header-->
      <!-- <a class="banner banner-top" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" target="_blank"><img src="images/intense_02.jpg" alt=""/></a> -->

      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-direction="vertical">
        <div class="swiper-wrapper text-left">
          <div class="swiper-slide context-dark" data-slide-bg="{{asset('/images/mmrpe.png')}}"> <!-- slider-4-slide-1-1920x678.jpg -->
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <!-- <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Enjoy the Best Destinations with Our Travel Agency</h6> -->
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100">
                      <span></span>
                      <span class="font-weight-bold" style="color: #910808;background: rgb(189 184 184 / 77%);"> En construcción</span>
                    </h2>
                    <!-- <a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft" data-caption-delay="0">Get in touch</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- slider-4-slide-2-1920x678.jpg -->
          <!-- <div class="swiper-slide context-dark" data-slide-bg="{{asset('images/protector.jpg')}}">  
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">A team of professional Travel Experts</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Trust</span><span class="font-weight-bold"> Our Experience</span></h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft" data-caption-delay="0">Get in touch</a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <div class="swiper-slide context-dark" data-slide-bg="images/slider-4-slide-3-1920x678.jpg">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">Build your Next Holiday Trip with Us</h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span>Create</span><span class="font-weight-bold"> Your Tour</span></h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft" data-caption-delay="0">Get in touch</a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination"></div>
      </section>      
      <!-- Discover New Horizons-->
      <section class="section section-sm section-first bg-default text-md-left">
        <div class="container">
          <div class="row row-50 align-items-center justify-content-center justify-content-xl-between">
            <div class="col-lg-6 text-center wow fadeInUp"><img src="images/index-3-556x382.jpg" alt="" width="556" height="382"/>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay=".1s">
              <div class="box-width-lg-470">

                <h3>{!! (isset($Contenido['TituloPrincipal'])) ? $Contenido['TituloPrincipal'] : "Este es mi titulod   default"!!}</h3>
                <!-- Bootstrap tabs-->
                <p>{!! (isset($Contenido['DescripcionPrincipal'])) ? $Contenido['DescripcionPrincipal'] : "Descripcion Principal default"!!}</p>
                <div class="tabs-custom tabs-horizontal tabs-line tabs-line-big tabs-line-style-2 text-center text-md-left" id="tabs-7">
                  <!-- Nav tabs-->
                  <ul class="nav nav-tabs">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-7-1" data-toggle="tab">{!! (isset($Contenido['TituloContenido1'])) ? $Contenido['TituloContenido1'] : "Este es mi TITULO default"!!}</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-7-2" data-toggle="tab">{!! (isset($Contenido['TituloContenido2'])) ? $Contenido['TituloContenido2'] : "Titulo 2 default"!!}</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-7-3" data-toggle="tab">{!! (isset($Contenido['TituloContenido3'])) ? $Contenido['TituloContenido3'] : "Título 3 default"!!}</a></li>
                  </ul>
                  <!-- Tab panes-->
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-7-1">
                      <p>{!! (isset($Contenido['DescripcionContenido1'])) ? $Contenido['DescripcionContenido1'] : "Descripcion 1 default"!!}</p>
                      <!-- <div class="group-md group-middle"><a class="button button-secondary button-pipaluk" href="contact-us.html">Get in Touch</a><a class="button button-black-outline button-md" href="about.html">Read More</a></div> -->
                    </div>
                    <div class="tab-pane fade" id="tabs-7-2">
                      <p>{!! (isset($Contenido['DescripcionContenido2'])) ? $Contenido['DescripcionContenido2'] : "Descripcion 2 default"!!}</p>
                      <!-- <div class="group-md group-middle"><a class="button button-secondary button-pipaluk" href="contact-us.html">Get in Touch</a><a class="button button-black-outline button-md" href="about.html">Read More</a></div> -->
                    </div>
                    <div class="tab-pane fade" id="tabs-7-3">
                      <p>{!! (isset($Contenido['DescripcionContenido3'])) ? $Contenido['DescripcionContenido3'] : "Descripcion 3 default"!!}</p>
                      <!-- <div class="group-md group-middle"><a class="button button-secondary button-pipaluk" href="contact-us.html">Get in Touch</a><a class="button button-black-outline button-md" href="about.html">Read More</a></div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--	Our Services-->
<!--       <section class="section section-sm">
        <div class="container">
          <h3>Our Services</h3>
          <div class="row row-30">
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-equalization3"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Personalized Matching</a></h5>
                    <p class="box-icon-classic-text">Our unique matching system lets you find just the tour you want for your next holiday.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-circular220"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Wide Variety of Tours</a></h5>
                    <p class="box-icon-classic-text">We offer a wide variety of personally picked tours with destinations all over the globe.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-favourites5"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Highly Qualified Service</a></h5>
                    <p class="box-icon-classic-text">Our tour managers are qualified, skilled, and friendly to bring you the best service.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-headphones32"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">24/7 Support</a></h5>
                    <p class="box-icon-classic-text">You can always get professional support from our staff 24/7 and ask any question you have.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-hot67"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Handpicked Hotels</a></h5>
                    <p class="box-icon-classic-text">Our team offers only the best selection of affordable and luxury hotels to our clients.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4">
              <article class="box-icon-classic">
                <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-classic-icon fl-bigmug-line-wallet26"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-classic-title"><a href="#">Best Price Guarantee</a></h5>
                    <p class="box-icon-classic-text">If you find tours that are cheaper than ours, we will compensate the difference.</p>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section> -->
     
      <!--	Instagrram wondertour-->
      <section class="section section-sm section-top-0 section-fluid section-relative bg-gray-4">
        <div class="container-fluid">
          <h6 class="gallery-title">Nuestras Marcas</h6>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-classic owl-dots-secondary" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-xl-items="5" data-xxl-items="6" data-stage-padding="15" data-xxl-stage-padding="0" data-margin="30" data-autoplay="true" data-nav="true" data-dots="true">                         
            @foreach($Marcas as $UnaMarca)
              <article class="thumbnail thumbnail-mary">
                <div class="thumbnail-mary-figure"><img src="{{asset($UnaMarca['descripcion'])}}" alt="" width="270" height="195"/>
                </div>
                <div class="thumbnail-mary-caption">
                  <a class="icon fl-bigmug-line-zoom60" href="{{asset($UnaMarca['descripcion'])}}" data-lightgallery="item">
                    <img src="{{asset($UnaMarca['descripcion'])}}" alt="" width="270" height="195"/>
                  </a>
                </div>
              </article> 
            @endforeach
          </div>
        </div>
      </section>
             
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
@endsection