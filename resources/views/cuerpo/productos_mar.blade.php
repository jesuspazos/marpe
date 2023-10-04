@extends('base.base') 

@section('css')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<!-- <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/> -->
 <!-- <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> -->

 <style>
     /* Remove default bullets */
#orange, ul {
  list-style-type: none;
}

#filtermobile, ul{
  list-style-type: none;
}
/* Remove margins and padding from the parent ul */
#myUL {
  margin: 0;
  padding: 0;
}

/* Style the caret/arrow */
.caret {
  cursor: pointer;
  user-select: none; /* Prevent text selection */
}

/* Create the caret/arrow with a unicode, and style it */
.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

/* Rotate the caret/arrow icon when clicked on (using JavaScript) */
.caret-down::before {
  transform: rotate(90deg);
}

.listCat li{
    cursor: pointer;
}

/* Hide the nested list */
.nested {
  display: none;
/*  list-style-type: none;*/
}

.nested li{
    margin-left: 25px;
}

/* Show the nested list when the user clicks on the caret/arrow (with JavaScript) */
.active {
  display: block;
}

.activeli{
    background-color: #3a3c3e;
    color: #ffffff;
    opacity: 0.7;
}

 </style>

@endsection


@section('content') 

  <section class="section section-sm section-first bg-default text-left">
    <div class="container">
          <div class="filter"> 
                <button class="btn btn-default mb-2" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filtros<span class="fa fa-filter pl-1"></span>
                </button>
          </div>
          <div id="mobile-filter" class="collapse">
              <!-- <p class="pl-sm-0 pl-2"> Home | <b>All Breads</b></p> -->
              <div class="border-bottom pb-2 ml-2">
                  <h4 id="burgundy">Filtros</h4>
              </div>
              <div class="py-2 border-bottom ml-3">
                  <h6 class="font-weight-bold">Categorias</h6>
                  <div id="orange"><span class="fa fa-minus"></span></div>
                  <form id="filtermobile">
                      <!-- <div class="form-group"> <input type="checkbox" id="artisan"> <label for="artisan">Fresh Artisan Breads</label> </div>
                      <div class="form-group"> <input type="checkbox" id="breakfast"> <label for="breakfast">Breakfast Breads</label> </div>
                      <div class="form-group"> <input type="checkbox" id="healthy"> <label for="healthy">Healthy Breads</label> </div> -->
                      <ul class="listCat">
                        

                        @foreach($Categorias as $Indice => $valor)
                            @if(isset($valor['SubCategorias']) && !empty($valor['Productos']))
                                <li class="cat" data-value="CAT|{{$valor['FolioCate']}}"><span class="caret">{{$valor['NombreCat']}}</span>
                                    <ul class="nested">
                                        @foreach($valor['SubCategorias'] as $IndiceName => $ValoresSub)
                                            <li data-value="CAT|{{$valor['FolioCate']}}|SUB|{{$ValoresSub['FolioSub']}}">{{$ValoresSub['NomSub']}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <hr>                                                          
                            @else
                                <li class="cat" data-value="CAT|{{$valor['FolioCate']}}">{{$valor['NombreCat']}}</li>
                                <!-- <div class="form-group"> <input type="checkbox" id="healthy"> <label for="healthy">{{$valor['NombreCat']}}</label> </div> -->
                                <hr>
                            @endif                          
                        @endforeach 
                      </ul>
                  </form>                        
              </div>
          </div>

          <div class="row row-40 justify-content-xl-between">
            <div class="col-xl-3 d-none d-xl-block">                
              <div class="offset-left-xl-45">                            
                <div class="py-2 border-bottom ml-3">
                    <h6 class="font-weight-bold">Categorias</h6>
                    <div id="orange">
                      <span class="fa fa-minus"></span>
                    </div>                                        
                    <ul class="listCat" id="myUL">                      
                        <li><a href="{{url('/catalogo')}}">Todas las categorías</a></li>
                        <hr>
                        @foreach($Categorias as $Indice => $valor)
                            @if(isset($valor['SubCategorias']) && !empty($valor['Productos']))
                                <li class="cat" data-value="CAT|{{$valor['FolioCate']}}"><span class="caret">{{$valor['NombreCat']}}</span>
                                    <ul class="nested">
                                        @foreach($valor['SubCategorias'] as $IndiceName => $ValoresSub)
                                            <li class="sub" data-value="CAT|{{$valor['FolioCate']}}|SUB|{{$ValoresSub['FolioSub']}}">{{$ValoresSub['NomSub']}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <hr>                                                          
                            @else
                                <li class="cat" data-value="CAT|{{$valor['FolioCate']}}">{{$valor['NombreCat']}}</li>
                                <hr>
                            @endif                          
                        @endforeach   
                    </ul>





                </div>
              </div>
            </div>
            

            <div class="col-xl-9">
              <div class="container">
                <div class="d-flex flex-row">
                    <!-- <div class="text-muted m-2" id="res">Showing 44 results</div> -->
                    <!-- <div class="ml-auto mr-lg-4">
                        <div id="sorting" class="border rounded p-1 m-1"> <span class="text-muted">Sort by</span> <select name="sort" id="sort">
                                <option value="popularity"><b>Popularity</b></option>
                                <option value="prcie"><b>Price</b></option>
                                <option value="rating"><b>Rating</b></option>
                            </select> </div>
                    </div> -->
                </div>

                <div class="row" >
                    <h2 id="titulocatalogo"></h2>
                </div>

                <div class="row" id="itemsx">

                    @foreach($Categorias as $Indice => $valor)
                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                            <div class="card cat" data-value="CAT|{{$valor['FolioCate']}}"> <img class="card-img-top" src="{{asset($valor['Productos'][0]['descripcion'])}}">
                                <div class="card-body">
                                    <h5><b>{{$valor['NombreCat']}}</b> </h5>
                                    <!-- <div class="d-flex flex-row my-2">
                                        <div class="text-muted">₹110/loaf</div>
                                        <div class="ml-auto"> <button class="border rounded bg-white sign"><span class="fa fa-plus" id="orange"></span></button> <span class="px-sm-1">1 loaf</span> <button class="border rounded bg-white sign"><span class="fa fa-minus" id="orange"></span></button> </div>
                                    </div> <button class="btn w-100 rounded my-2">Add to cart</button> -->
                                </div>
                            </div>
                        </div>
                    @endforeach

                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>  




@endsection



@section('script')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        

        var allItems  = {!! json_encode($Categorias) !!} ;        
        var toggler = document.getElementsByClassName("caret");
        var bLo = false;
        

        for (var i = 0; i < toggler.length; i++) {
          toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
          });
        }   


         $(".cat").on('click',  function () {
            
            var Element = "";        

            if(!bLo){
                var xcat = $(this).attr('data-value').split('|');
                var position = allItems.find(x => x.FolioCate == xcat[1]);                                                    
                
                $('#titulocatalogo').html(position.NombreCat);
                position.Productos.forEach( function(valor, indice, array) {                    
                    Element +=  '<div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">';
                    Element += '<div class="card"> <img class="card-img-top" src="{!! asset("'+valor.descripcion+'") !!} ">';
                    Element += '<div class="card-body">';
                    Element += '<h5><b>'+valor.nombre+'</b> </h5></div></div></div>';
                });

                $('#itemsx').empty();
                $('#itemsx').append(Element);
            }
            bLo = false;

         });

         $(".sub").on('click', function (event) {
            
            // console.log($(this).attr('data-value'));
            
            var xcat = $(this).attr('data-value').split('|');

            if(xcat.length >= 4){
                var position = allItems.find(x => x.FolioCate == xcat[1]);                
                var positioSub = position.SubCategorias.find(x=>x.FolioSub == xcat[3]);             
            }
            
            // if(allItems.SubCategorias){
            //     var position = allItems.SubCategorias.find(x => x.FolioCate == xcat[1]);    
            //     console.log(position);
            // }
            $('#titulocatalogo').html(positioSub.NomSub);
            var Element = ""; 
            positioSub.Productos.forEach( function(valor, indice, array) {                

                Element +=  '<div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">';
                Element += '<div class="card"> <img class="card-img-top" src="{!! asset("'+valor.descripcion+'") !!} ">';
                Element += '<div class="card-body">';
                Element += '<h5><b>'+valor.nombre+'</b> </h5></div></div></div>';                
            });

            bLo = true;

            $('#itemsx').empty();
            $('#itemsx').append(Element); 

         });
                            
    </script>
  @endsection