<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/>


<div id="tree"></div> 


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>   
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        
        $(document).ready(function(){
          $('#tree').tree({
            uiLibrary: 'bootstrap4',
            dataSource: getTree(),                    
          });
        });

        function getTree() {          
          var tree = [{ 
                      text: 'Planta 1', 
                      children: [ 
                          { 
                            text: 'Área 1', 
                              children: [
                                { 
                                  text: 'Equipo 1',
                                    children: [
                                      { text: 'Punto 1' },
                                      { text: 'Punto 2' },
                                      { text: 'Punto 3' }
                                  ]
                                }
                              ] 
                          } 
                        ] 
                    }];
          
          return tree;
        }                  
    </script>