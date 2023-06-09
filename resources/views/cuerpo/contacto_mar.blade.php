@extends('base.base_marpemx')


@section('content')


<section class="section section-sm section-first bg-default text-md-left">
        <div class="container">
          <div class="row row-50 justify-content-center align-items-xl-center">
            <div class="col-md-10 col-lg-5 col-xl-6"><img src="images/about-1-519x564.jpg" alt="" width="519" height="564"/>
            </div>
            <div class="col-md-10 col-lg-7 col-xl-6">
              <h1 class="text-spacing-25 font-weight-normal title-opacity-9">Why choose us</h1>
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-4">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-4-1" data-toggle="tab">Experience</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-2" data-toggle="tab">Skills</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-3" data-toggle="tab">Mission</a></li>
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-4-1">
                    <p>Aliquam malesuada bibendum arcu vitae elementum curabitur. A erat nam at lectus urna duis convallis convallis tellus. Sit amet consectetur adipiscing elit pellentesque.</p>
                    <!-- Linear progress bar-->
                    <article class="progress-linear progress-secondary">
                      <div class="progress-header">
                        <p>Tours</p>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear" data-gradient=""><span class="progress-value">79</span><span class="progress-marker"></span></div>
                      </div>
                    </article>
                    <!-- Linear progress bar-->
                    <article class="progress-linear progress-orange">
                      <div class="progress-header">
                        <p>Excursions</p>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear" data-gradient=""><span class="progress-value">72</span><span class="progress-marker"></span></div>
                      </div>
                    </article>
                    <!-- Linear progress bar-->
                    <article class="progress-linear">
                      <div class="progress-header">
                        <p>Hotel Bookings</p>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear" data-gradient=""><span class="progress-value">88</span><span class="progress-marker"></span></div>
                      </div>
                    </article>
                  </div>
                  <div class="tab-pane fade" id="tabs-4-2">
                    <div class="row row-40 justify-content-center text-center inset-top-10">
                      <div class="col-sm-4">
                        <!-- Circle Progress Bar-->
                        <div class="progress-bar-circle" data-value="0.87" data-gradient="#01b3a7" data-empty-fill="transparent" data-size="150" data-thickness="12" data-reverse="true"><span></span></div>
                        <p class="progress-bar-circle-title">Tours</p>
                      </div>
                      <div class="col-sm-4">
                        <!-- Circle Progress Bar-->
                        <div class="progress-bar-circle" data-value="0.74" data-gradient="#01b3a7" data-empty-fill="transparent" data-size="150" data-thickness="12" data-reverse="true"><span></span></div>
                        <p class="progress-bar-circle-title">Excursions</p>
                      </div>
                      <div class="col-sm-4">
                        <!-- Circle Progress Bar-->
                        <div class="progress-bar-circle" data-value="0.99" data-gradient="#01b3a7" data-empty-fill="transparent" data-size="150" data-thickness="12" data-reverse="true"><span></span></div>
                        <p class="progress-bar-circle-title">Hotel Bookings</p>
                      </div>
                    </div>
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Get in touch</a><a class="button button-black-outline button-width-xl-230" href="#">Read more</a></div>
                  </div>
                  <div class="tab-pane fade" id="tabs-4-3">
                    <p>Orci nulla pellentesque dignissim enim sit. Elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque.</p>
                    <div class="text-center text-sm-left offset-top-30 tab-height">
                      <ul class="row-16 list-0 list-custom list-marked list-marked-sm list-marked-secondary">
                        <li>Lorem ipsum</li>
                        <li>Consectetur adipiscing</li>
                        <li>Sed do eiusmod</li>
                        <li>Tempor incididunt</li>
                        <li>Sem fringilla</li>
                        <li>Ut venenatis</li>
                      </ul>
                    </div>
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Get in touch</a><a class="button button-black-outline button-md" href="#">Download presentation</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


@endsection