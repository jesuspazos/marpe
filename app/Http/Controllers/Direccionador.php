<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TemplateContacto;
use App\Configuraciones;
use App\Productos;
use App\Categoria;

class Direccionador extends Controller
{
    
    public function index(){
        

        $Contenido = array();

        \Session::put('menu','home');
        $DatosInicio = Configuraciones::get()->toArray();

        $DatosMarcas = Productos::where('categoria', '=',0)->get()->toArray();
        
        foreach ($DatosInicio as $Index => $Valor) {

            if($Valor['cClave'] == 'titulo'){
                $Contenido['TituloPrincipal'] = $Valor['cValor'];                
            }
            if($Valor['cClave'] == 'subtitulo'){
                $Contenido['DescripcionPrincipal'] = $Valor['cValor'];
            }          
            if($Valor['cClave'] == 'tituSeccion1'){
                $Contenido['TituloContenido1'] = $Valor['cValor'];
            }  
            if($Valor['cClave'] == 'ContentSeccion1'){
                $Contenido['DescripcionContenido1'] = $Valor['cValor'];
            }  
            if($Valor['cClave'] == 'tituSeccion2'){
                $Contenido['TituloContenido2'] = $Valor['cValor'];
            } 
            if($Valor['cClave'] == 'ContentSeccion2'){
                $Contenido['DescripcionContenido2'] = $Valor['cValor'];
            } 
            if($Valor['cClave'] == 'tituSeccion3'){
                $Contenido['TituloContenido3'] = $Valor['cValor'];
            } 
            if($Valor['cClave'] == 'ContentSeccion3'){
                $Contenido['DescripcionContenido3'] = $Valor['cValor'];
            }     
        }
        
        $Contenido['section'] = 'Inicio';
        // dd($DatosMarcas);
        // return view('inicio')->with('Contenido',$Contenido)->with('RRSS',$this->Arreglo)->with('Marcas',$DatosMarcas);
        return view('cuerpo.home')->with('Contenido',$Contenido)->with('Marcas',$DatosMarcas); //->with('RRSS',$this->Arreglo)
    }

    public function nosotros(){
        
        //$DatosInicio = ContenidoPagina::where('menu','Nosotros')->get()->toArray();

        $DataImg = Configuraciones::where('cClave','imagenNosotros')->get()->toArray();
        \Session::put('menu','nosotros');
        $Contenido['UrlImagen'] = (!empty($DataImg)) ? $DataImg[0]['cValor'] :'';        

        $DataTitulo = Configuraciones::where('cClave','tituloNosotros')->get()->toArray();
        //dd($DataTitulo);
        if(!empty($DataTitulo)){
            $Contenido['TituloNosotros']    = $DataTitulo[0]['cValor'];
            $Contenido['HistoriaNosotros']  = $DataTitulo[0]['cDescripcion'];
        }

        $DataTitulo = Configuraciones::where('cClave','infoMision')->get()->toArray();

        if(!empty($DataTitulo)){
            $Contenido['TituloMision']    = $DataTitulo[0]['cValor'];
            $Contenido['Mision']            = $DataTitulo[0]['cDescripcion'];
        }

        $DataTitulo = Configuraciones::where('cClave','infoVision')->get()->toArray();

        if(!empty($DataTitulo)){
            $Contenido['TituloVision']    = $DataTitulo[0]['cValor'];
            $Contenido['Vision']            = $DataTitulo[0]['cDescripcion'];
        }

        $DataTitulo = Configuraciones::where('cClave','infoValores')->get()->toArray();

        if(!empty($DataTitulo)){
            $Contenido['TituloValores']    = $DataTitulo[0]['cValor'];
            $Contenido['Valores']            = $DataTitulo[0]['cDescripcion'];
        }

        $Contenido['section'] = 'Nosotros';

        
        // return view('nosotros_marpe')->with('Contenido',$Contenido)->with('RRSS',$this->Arreglo);
        return view('cuerpo.nosotros_mar')->with('Contenido',$Contenido);
    }

    public function contacto(){
        

        $Contenido = array();
        $DatosInicio = Configuraciones::get()->toArray();
        \Session::put('menu','contacto');

        foreach ($DatosInicio as $Index => $Valor) {

            if($Valor['cClave'] == 'DireccionInfo'){
                $Contenido['DireccionInfo'] = $Valor['cValor'];                
            }
            if($Valor['cClave'] == 'TelefonoInfo'){
                $Contenido['TelefonoInfo'] = $Valor['cValor'];
            }            

            if($Valor['cClave'] == 'CorreoInfo'){
                $Contenido['CorreoInfo'] = $Valor['cValor'];
            }  
            if($Valor['cClave'] == 'WebInfo'){
                $Contenido['WebInfo'] = $Valor['cValor'];
            }  

            if($Valor['cClave'] == 'CorreoMail'){
                $Contenido['CorreoMail'] = $Valor['cValor'];
            } 
        }
        
        // dd(env('KEYCAPTCHA_PUBLIC'));                                      
        $Contenido['section'] = 'Contacto';        
        return view('cuerpo.contacto_marpe')->with('Contenido',$Contenido);
    }

    public function catalogo(){

        \Session::put('menu','productos');
        $Contenido['section'] = 'Productos';
        //$QueryCategoria->select('producto.idProducto','producto.nombre as nombreProd','producto.descripcion','producto.categoria','categoria.nombre as nombreCate');
        //$QueryCategoria->leftJoin("categoria","categoria.idCategoria","=","producto.categoria");
        

        //Obtengo todas las categorias
        $DataCategorias = Categoria::
                        // select('categoria.idCategoria','categoria.nombre as nombreCate','subcategorias.idsubcategoria as Subcate')//,'subcategorias.cNombre as nombreSubcategoria')
                        // selectRaw('categoria.idCategoria','categoria.nombre as nombreCate','(select subcategorias.idsubcategoria as Subcate')
                        selectRaw("categoria.idCategoria as FolioCate, categoria.nombre as NombreCat")
                        ->selectRaw("(
                                        select group_concat(sub.idsubcategoria separator ', ') as FolioSub from subcategorias sub where sub.idcategoria = categoria.idCategoria 
                                    ) as FoliosSub ")
                        ->where('categoria.activo',1)
                        ->get()
                        ->toArray();

                        
                        // ->join("subcategorias","categoria.idCategoria","=","subcategorias.idcategoria")                                                  

        // dd($DataCategorias);

        //Comentando Codigo que me llevo tiempo hace jajajaj

        // //Recorro para obtener si la categoria tiene subcategorias
        // foreach($DataCategorias as $indice => $balor){            
        //     $DataCategorias[$indice]['subcategorias'] = Subcategoria::where('idcategoria', intval($balor['idCategoria']))->get()->toArray();           
        // }                        
        // dd($DataCategorias);
        // $DataProductos = array();
        // //dd(Productos::get()->toArray());

        // //Recorro las categorias y si tienen subcategorias
        // foreach ($DataCategorias as $index => $Valor) {
            
        //     $tempProductos = Productos::select('producto.idProducto','producto.nombre as nombreProd','producto.descripcion','producto.categoria','producto.subcategoria')
        //                      ->where('categoria', $Valor['idCategoria'])
        //                      //->where('subcategoria',0)
        //                      ->get()
        //                      ->toArray();
        //     //dd($tempProductos);
        //     if(!empty($tempProductos)){
        //         $DataProductos[$index] = $tempProductos;
        //         $DataCategorias[$index]['categoria_productos'] = $tempProductos;
        //     }    

        //     $productosSubcategoriaTemporal = [];
        //     if(!empty($Valor['subcategorias'])){
        //         foreach($Valor['subcategorias'] as $indices => $contenido){
        //             $ProductosSubcategoria = Productos::select('producto.idProducto','producto.nombre as nombreProd','producto.descripcion','producto.subcategoria')
        //                      ->where('subcategoria', $contenido['idsubcategoria'])
        //                      ->get()
        //                      ->toArray();
                    
        //             if(!empty($ProductosSubcategoria)){
        //                 $productosSubcategoriaTemporal[] = $ProductosSubcategoria;
        //             }
        //             //$ProductoSub                             
        //         }
        //         $DataCategorias[$index]['subcategorias_productos'] = $productosSubcategoriaTemporal;
        //     } 
        //     /*$tempProd = Productos::select('producto.idProducto','producto.nombre as nombreProd','producto.descripcion','producto.categoria')
        //                      ->where('subcategoria', $Valor['subcategoria'])
        //                      ->get()
        //                      ->toArray();  */

                  
        // }
        
        //Termina Codigo comentado

        //dd($DataProductos);
        //dd($DataCategorias);

        /*echo "<pre>";
        print_r($DataProductos);
        echo "</pre>";*/
        //exit();
        // return view('productos_marpe')
        return view('cuerpo.productos_mar')
                ->with('Contenido',$Contenido)
                ->with('Categorias',$DataCategorias);
                // ->with('Productos',$DataProductos)                
    }


    function enviarMail(Request $request){
        
        $io = $request->all(); 

         // dd($io);
               
        if(isset($io['g-recaptcha-response']) && $this->validarCaptcha($io['g-recaptcha-response'])){
            $io['subject'] = "Servicio al cliente";

            $info = Configuraciones::where('cClave','CorreoMail')->get()->toArray();
            // dd($info[0]['cValor']);
            \Mail::to($info[0]['cValor'])->send(new TemplateContacto($io));        
            $mensaje = '<div id="success-alert"><div class="alert alert-success">Tu mensaje ha sido enviado con exito.</div></div>';
            \Session::flash('mensaje',$mensaje);
        }
        else{

            $mensaje = '<div id="success-alert"><div class="alert alert-success">Por favor selecciona el captcha.</div></div>';
            \Session::flash('mensaje',$mensaje);   
        }
        return redirect('contacto');        
    }

    function validarCaptcha($captcha){

        
        if ($captcha == '') {
            return false;
        }
        else {
            $obj = new \stdClass();
            $obj->secret = env('KEYCAPTCHA_SECRET');
            $obj->response = $captcha;
            $obj->remoteip = $_SERVER['REMOTE_ADDR'];
            $url = 'https://www.google.com/recaptcha/api/siteverify';

            $options = [
                    'http'  => [
                                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                'method'  => 'POST',
                                'content' => http_build_query($obj)
                    ]
                ];
            


            $context = stream_context_create($options);
            $result  = file_get_contents($url, false, $context);
            
            $validar = json_decode($result);
            
            return ($validar->success) ? true : false;
        }
    }

}
