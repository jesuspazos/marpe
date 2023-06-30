<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Title Page-->
    <title>Marpe | Panel Control</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('/control/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('/control/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('/control/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('/control/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <link rel="stylesheet" href="{{asset('/plugins/alertifyjs/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/alertifyjs/css/themes/default.min.css')}}">

    <!-- Bootstrap CSS-->
    <link href="{{asset('/control/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->    
    <link href="{{asset('/control/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('/control/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('/control/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">    
    <link href="{{asset('/control/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('/control/css/theme.css')}}" rel="stylesheet" media="all">    
    <link rel="stylesheet" href="{{asset('js/marpe/multiple-select-1.5.2/dist/multiple-select.min.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <!--<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">-->    
    <link rel="stylesheet" href="{{asset('css/marpe/datatable_1.10.16.css')}}">
    <link rel="stylesheet" href="{{asset('css/marpe/datatable_resposive_2_2_1.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    
    <link rel="stylesheet" href="{{asset('js/marpe/dropzone-5.7.0/dist/basic.css')}}">
    <link rel="stylesheet" href="{{asset('js/marpe/dropzone-5.7.0/dist/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('js/marpe/summernote-0.8.18-dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('css/marpe/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/marpe/jquery.timepicker.css')}}">            
</head>

<body class="animsitionss">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{url('/')}}">
                            <img src="{{asset('/images/marpe.png')}}" alt="Marpe" width="200px" height="100px" style="margin-top:-30px;" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="{{url('menuinicio')}}">
                                <i class="far fa-check-square"></i>Contenido</a>
                        </li>
                        <li>
                            <a href="{{url('categoria')}}">
                                <i class="fas fa-map-marker-alt"></i>Categorias</a>
                        </li>
                        <li class="has-sub">
                            <a href="{{url('altaProducto')}}">
                                <i class="fas fa-copy"></i>Productos</a>
                        </li>
                        <li class="has-sub">
                            <a href="{{url('Archivos')}}">
                                <i class="fas fa-copy"></i>Archivos</a>
                        </li>                          
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{url('/')}}">
                    <img src="{{asset('/images/marpe.png')}}" alt="Marpe" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{url('menuinicio')}}">
                                <i class="far fa-check-square"></i>Contenido</a>
                        </li>
                        <li>
                            <a href="{{url('categoria')}}">
                                <i class="fa fa-address-book"></i>Categoria</a>
                        </li>
                        <li class="has-sub">
                            <a href="{{url('altaProducto')}}">
                                <i class="fa fa-line-chart"></i>Productos</a>
                        </li>
                        <li class="has-sub">
                            <a href="{{url('Archivos')}}">
                                <i class="fas fa-copy"></i>Archivos</a>
                        </li>                     
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="noti-wrap">
                                   <!-- <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="https://i.pinimg.com/originals/47/1a/1a/471a1ad342659289433e05a611d206f8.png" alt="perfil" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ (Auth::user()) ? Auth::user()->name : ''}} </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="https://i.pinimg.com/originals/47/1a/1a/471a1ad342659289433e05a611d206f8.png" alt="perfil" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ (Auth::user()) ? Auth::user()->name :'' }} </a>
                                                    </h5>
                                                    <span class="email">{{Session::get('correo')}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Perfil</a>
                                                </div>
                                               <!--<div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>-->
                                               <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>-->
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Cerrar Sesion</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--header wrap-->
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            @if(isset($vista))
                                {!!$vista!!}
                                    @unset($vista)
                            @endif
                    </div><!--fin-->
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('/control/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('/control/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('/control/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('/control/vendor/wow/wow.min.js')}}"></script>    
    <script src="{{asset('/control/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('/control/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('/control/vendor/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/control/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('/control/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('/control/vendor/chartjs/Chart.bundle.min.js')}}"></script>    
    <!-- Main JS-->
    <script src="{{asset('js/marpe/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/marpe/jquery.timepicker.min.js')}}"></script>      
    <script src="{{asset('js/marpe/multiple-select-1.5.2/dist/multiple-select.min.js')}}"></script>   

    <script src="{{asset('/control/js/main.js')}}"></script>
    <script src="{{asset('js/marpe/dropzone-5.7.0/dist/dropzone.js')}}"></script>
    <script src="{{asset('js/marpe/summernote-0.8.18-dist/summernote-bs4.js')}}"></script>
    <script src="{{asset('js/marpe/slick-1.6.0/slick/slick.js')}}"></script>
    <script>var url_global = '{{url("/")}}'</script>

    <script src="{{asset('js/marpe/datatable_1_10_6.js')}}"></script>
    <script src="{{asset('js/marpe/datatable_responsive_2_2_1.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>    
    
    <script src="{{asset('/plugins/alertifyjs/alertify.min.js')}}"></script>
    <script src="{{asset('/js/funciones.js')}}"></script>
    <script src="{{asset('/js/dropzonecustomize.js')}}"></script>
    <script src="{{asset('/js/tblproductos.js')}}"></script>     
    <script src="{{asset('/js/tblmarcas.js')}}"></script>   
    <script src="{{asset('/js/tblarchivos.js')}}"></script> 
    <!-- Latest compiled and minified JavaScript -->      
</body>

</html>
<!-- end document-->
