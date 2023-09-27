<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Archivos;
use App\ContenidoPagina;
use App\Categoria;
use App\Subcategoria;
use App\Productos;
use App\Configuraciones;
use App\Mail\TemplateContacto;

class ControlPanel extends Controller
{
    
    //Contenido Panel Control
    function menu_inicio(){

        if (!\Auth::check()) {
          return redirect('/login');
        }
        
        $valores = array();        

        $DatasNosotros = Configuraciones::get()->toArray();

        $arrayConfig = array();
        
        foreach ($DatasNosotros as $Indice => $valor) {            
        
            $arrayConfig[$valor['cClave']]['Valor']         = $valor['cValor'];
            $arrayConfig[$valor['cClave']]['Descripcion']   = $valor['cDescripcion'];                        
        }        
        
        $form_men = view('panel.modulos_panel.seccion_home')->with('forms',$arrayConfig);                    

        return view('panel.panelcontrol')->with('vista',$form_men);
    }

    function Categoria(){
        $form_categoria = view('panel.modulos_panel..seccion_categoria');
        return view('panel.panelcontrol')->with('vista',$form_categoria);
    }

    function Archivos(){
        $form_archivos = view('panel.modulos_panel..seccion_archivos');
        return view('panel.panelcontrol')->with('vista',$form_archivos);   
    }

    function GetCategorias(Request $request){        
        
        $bfiltro = false;
        $siPase  = 'No';
        $draw    =  $request['draw'];
        $start   =  $request['start'];
        $length  =  $request['length'];

        $totalRecords = Categoria::Select('count (*) as total')->count();

        $QueryCategoria = Categoria::query();

        $QueryCategoria->select('idCategoria','nombre','activo');    

        if(isset($request['search']['value']) && $request['search']['value'] != ''){            

            if(is_numeric($request['search']['value']) && ($request['search']['value'] == '1' || $request['search']['value'] == '0')){
                $QueryCategoria->where('activo',$request['search']['value']);
            }
            else{
                $QueryCategoria->where('nombre','like','%'.$request['search']['value'].'%');
            }
            $siPase = 'Si'; 
            
            $bfiltro = true;
        }
        
        $QueryCategoria->skip($start);
        $QueryCategoria->take($length);                
        $retornoData = $QueryCategoria->get()->toArray();

        $recordsFiltro = ($bfiltro) ? count($retornoData) : $totalRecords;
        
        $data = array();
        $array2 = array();
        
        foreach ($retornoData as $Indice => $valor) {
            $array2['iIdCategoria'] = $valor['idCategoria'];
            $array2['cNombreCategoria'] = $valor['nombre'];
            $array2['bEstatus'] = ($valor['activo']) ? 'Activo' : 'Desactivado';    
            $array2['opciones'] = '<a class="btn btn-default btn-sm" data="'.$valor['idCategoria'].'" id="delete" style="margin-left:20px;"><span class="fa fa-trash"></span></a>
                                   <a class="btn btn-default btn-sm"  href="#ediCate" style="color: inherit;" rel="modal:open" data="" id="editarCat" style="margin-left:20px;"><span class="fa fa-pencil-square-o" aria-hidden="true"></span></a>';
            $data[] = $array2;        
        }

        $jsosData = [
            'draw' => $draw,
            'recordsFiltered' => $recordsFiltro,
            'recordsTotal' => $totalRecords,
            'data' => $data,
            'paso' => $siPase
        ];
        echo json_encode($jsosData);
        exit();
       // return response()->json($jsosData);
    }

    function GetSubcategorias(Request $request){        
        
        $bfiltro = false;
        $draw    =  $request['draw'];
        $start   =  $request['start'];
        $length  =  $request['length'];

        $totalRecords = Subcategoria::Select('count (*) as total')->count();

        $QueryCategoria = Subcategoria::query();

        $QueryCategoria->select('subcategorias.idsubcategoria','subcategorias.cNombre','subcategorias.idcategoria','categoria.*');

        $QueryCategoria->leftJoin("categoria","categoria.idCategoria","=","subcategorias.idcategoria");    

        if(isset($request['search']['value']) && $request['search']['value'] != ''){            

            if(is_numeric($request['search']['value']) && ($request['search']['value'] == '1' || $request['search']['value'] == '0')){
                $QueryCategoria->where('activo',$request['search']['value']);
            }
            else{
                $QueryCategoria->where('cNombre','like','%'.$request['search']['value'].'%');
            }
            
            $bfiltro =true;
        }
        
        $QueryCategoria->skip($start);
        $QueryCategoria->take($length);                
        $retornoData = $QueryCategoria->get()->toArray();
        //dd($retornoData);
        $recordsFiltro = ($bfiltro) ? count($retornoData) : $totalRecords;
        
        $data = array();
        $array2 = array();
        
        foreach ($retornoData as $Indice => $valor) {
            $array2['iIdSubcategoria'] = $valor['idsubcategoria'];
            $array2['cNombreCategoria'] = $valor['cNombre'];
            $array2['bEstatus'] = $valor['nombre'];/*($valor['activo']) ? 'Activo' : 'Desactivado'; */   
            $array2['opciones'] = '<a class="btn btn-default btn-sm" data="'.$valor['idsubcategoria'].'" id="deleteSubcate" style="margin-left:20px;"><span class="fa fa-trash"></span></a>
                                   <a class="btn btn-default btn-sm"  href="#editarSubCat" style="color: inherit;" rel="modal:open" id="subCat" style="margin-left:20px;"><span class="fa fa-pencil-square-o" aria-hidden="true"></span></a>';
            $data[] = $array2;        
        }

        $jsosData = [
            'draw' => $draw,
            'recordsFiltered' => $recordsFiltro,
            'recordsTotal' => $totalRecords,
            'data' => $data
        ];
        echo json_encode($jsosData);
        exit();
       // return response()->json($jsosData);
    }

    function GetCategoriaCombo(){

        try{
            $allData = Categoria::where('activo',1)->get()->toArray();
        }
        catch(Exception $e){
            $allData['cError']  = $e->getMessage();
        }

        //return response()->json($allData);
        echo json_encode($allData);

    }

    function GetSubcategoriaCombo($id){
        
        try{
            $allData = Subcategoria::where('idcategoria',$id)->get()->toArray();
            
        }
        catch(Exception $e){
            $allData['cError']  = $e->getMessage();
        }

        //return response()->json($allData);
        echo json_encode($allData);
    }
    //SubcategoriaCombo
    //GetSubcategoriaCombo

    function GuardarCategoria(Request $request){        

        if (!\Auth::check()) {
          $jsonData['lErro'] = false; 
          $jsonData['redirect'] = url('/')."/login";
          return response()->json($jsonData);
        }
        
        $datos = $request->all();    


        if(!isset($request->editar)){

            $Parametros = [
                'nombre' => $request['txtTituloCategoria'],
                'activo' => 1
            ];
            
            if(Categoria::create($Parametros)){
                $jsonData['lErro'] = true;
                $jsonData['mError'] = 'Categoria ingresado con exito';
            }   
            else{
                $jsonData['lErro'] = false;
                $jsonData['mError'] = 'Ocurrio un problema';
            }                
        }
        else{

            $Parametros = [
                'nombre' => $request['nombre_categoria'],                 
            ];
            
            if(Categoria::where('idCategoria',$request->id)->update($Parametros)){
                $jsonData['lErro'] = true;
                $jsonData['mError'] = 'Categoria modificada con exito';
            }
            else{
                $jsonData['lErro'] = false;
                $jsonData['mError'] = 'Ocurrio un problema';
            }

        }
        

        return response()->json($jsonData);
    }

    function GuardarSubcategoria(Request $request){        

        if (!\Auth::check()) {
          $jsonData['lErro'] = false; 
          $jsonData['redirect'] = url('/')."/login";
          return response()->json($jsonData);
        }
        
        //dd($request->all());

        if(!isset($request->editar)){
            $Parametros = [
                'cNombre' => $request['txtTituloSubcategoria'],
                'idcategoria' => $request['txtcategoria']
            ];


            if(Subcategoria::create($Parametros)){
                $jsonData['lErro'] = true;
                $jsonData['mError'] = 'Subcategoria ingresado con exito';
            }   
            else{
                $jsonData['lErro'] = false;
                $jsonData['mError'] = 'Ocurrio un problema';
            }
        }
        else{

            $Parametros = [
                'cNombre' => $request['nombre_subcategoria'],                 
            ];
            
            if(Subcategoria::where('idsubcategoria',$request->id)->update($Parametros)){
                $jsonData['lErro'] = true;
                $jsonData['mError'] = 'Categoria modificada con exito';
            }
            else{
                $jsonData['lErro'] = false;
                $jsonData['mError'] = 'Ocurrio un problema';
            }
        }

        return response()->json($jsonData);
    }

    function ComprobarCategoria(Request $request){        

        $Contenido = Productos::where('categoria',$request->id)->get()->toArray();


        $jsoReturn['bBool'] = false;

        if(!empty($Contenido)){
            $jsoReturn['bBool'] = true;
        }
        
        return response()->json($jsoReturn);
        //echo json_encode($jsoReturn);
    }

    function EliminarCategoria(Request $request){
    
        $idCategoria = $request->id;        
        $bTodo       = $request->bTodo;
        $bElimine    = false;
        
        if($bTodo != 'false'){
            
            $ContenidoProdutos = Productos::leftJoin("categoria","categoria.idCategoria","=","producto.categoria")
                                            ->where('categoria',$idCategoria)
                                            ->select('producto.*', 'categoria.nombre as NombreCate')
                                            ->get()
                                            ->toArray();            
            
            $RutaDirectorio = public_path('images\\Catalogo\\'.$ContenidoProdutos[0]['NombreCate']);                            

            if(\File::exists($RutaDirectorio)){                    
                
                \File::deleteDirectory($RutaDirectorio);                

                $bElimine = Productos::leftJoin("categoria","categoria.idCategoria","=","producto.categoria")
                                            ->where('categoria',$idCategoria)
                                            ->delete();

            }          
        }

        $Delete = Categoria::where('idCategoria',$idCategoria)->delete();        

        $bExito = ($Delete) ? true : false;

        $Contenido = [
            'bExito' => $bExito,
            'bElimineProd' => $bElimine
        ];

        echo json_encode($Contenido);
    }

    function ComprobarSubCategoria(Request $request){

        $Contenido = Productos::where('subcategoria',$request->id)->get()->toArray();

        $jsoReturn['bBool'] = false;

        if(!empty($Contenido)){
            $jsoReturn['bBool'] = true;
        }

        return reposnse()->json($jsoReturn);
        //echo json_encode($jsoReturn);
    }

    function EliminarSubCategoria(Request $request){
    
        $idSubCategoria = $request->id;        
        $bTodo       = $request->bTodo;
        $bElimine    = false;
        
        if($bTodo != 'false'){
            
            $ContenidoProdutos = Productos::leftJoin("subcategorias","subcategorias.idsubcategoria","=","producto.subcategoria")
                                            ->where('producto.subcategoria',$idSubCategoria)
                                            ->select('producto.*', 'subcategorias.nombre as NombreSubCate')
                                            ->get()
                                            ->toArray();            
            
            $RutaDirectorio = public_path('images\\Catalogo\\'.$ContenidoProdutos[0]['NombreSubCate']);                            

            if(\File::exists($RutaDirectorio)){                    
                
                \File::deleteDirectory($RutaDirectorio);                

                $bElimine = Productos::leftJoin("subcategorias","subcategorias.idsubcategoria","=","producto.subcategoria")
                                            ->where('categoria',$idCategoria)
                                            ->delete();

            }          
        }

        $Delete = Categoria::where('idCategoria',$idCategoria)->delete();        

        $bExito = ($Delete) ? true : false;

        $Contenido = [
            'bExito' => $bExito,
            'bElimineProd' => $bElimine
        ];

        echo json_encode($Contenido);
    }    


    function EliminarProducto(Request $request){
    
        $idCategoria = $request->id;                

        $Contenido = Productos::where('idProducto',$request->id)->get()->toArray()[0];
        
        if(!empty($Contenido)){
            
            $rutaImagenAnterior = realpath('')."/".$Contenido['descripcion'];            
            if(\File::exists($rutaImagenAnterior)){
                \File::delete($rutaImagenAnterior);                
            }         
            $Contenido = Productos::where('idProducto',$request->id)->delete();
        }

        $bExito = ($Contenido) ? true : false;

        $Contenido = [
            'bExito' => $bExito
        ];        

        echo json_encode($Contenido);
    }

    function EliminarArchivo(Request $request){
    
        $idFile = $request->id;                

        $Contenido = Archivos::where('id_file',$request->id)->get()->toArray()[0];
        
        if(!empty($Contenido)){
            
            $rutaImagenAnterior = realpath('')."\\".$Contenido['ruta_archivo'];            
            if(\File::exists($rutaImagenAnterior)){
                \File::delete($rutaImagenAnterior);                
            }         
            $Contenido = Archivos::where('id_file',$request->id)->delete();
        }

        $bExito = ($Contenido) ? true : false;

        $Contenido = [
            'bExito' => $bExito
        ];        

        echo json_encode($Contenido);
    } 
    

    function InformacionPortada(Request $request){

        $Seccion = $request->idSeccion;
        $ContenidoRetorno = array();

        $ContenidoRetorno['Seccion'] = $Seccion;
        $ContenidoRetorno['Contenido'] = '';

        $CargaValor = Configuraciones::where('cClave',$Seccion)->get()->toArray();  
        //dd($CargaValor);
        if(!empty($CargaValor)){

            $ContenidoRetorno['Contenido'] = $CargaValor[0]['cValor'];

        }

        return response()->json($ContenidoRetorno);

    }

    function GuardarSettings(Request $request){
        
        if(!empty($request->all())){
            $return = array();
            $campos = [
                'cClave' => $request->Seccion,
                'cValor' => $request->Contenido
            ];

            $return['bExito'] = true;

            try{
                if(!empty(Configuraciones::where('cClave',$request->Seccion)->get()->toArray())){                
                    Configuraciones::where('cClave', $request->Seccion)->update($campos);                
                    $return['update'] = true;
                }   
                else{
                    Configuraciones::create($campos);                
                    $return['create'] = true;
                }
            }
            catch(Exception $oExcep){
                $return['bExito'] = false;
                $return['cMensaje'] = $oExcep->getMessage();
            }

            return response()->json($return);
        }
    }

    function guardarInformacion(Request $request){

        if (!\Auth::check()) {
          return redirect('/login');
        }

        
        if($request->menu_seccion == "Nosotros") {            

            $Imagen = $request->file('file');                        
            $return['Exito'] = false;

            if(!empty($Imagen)){

                $ImagenAnterior = $request->nameImagen;
                $rutaImagenAnterior = realpath('')."\\".$ImagenAnterior;

                if(\File::exists($rutaImagenAnterior)){
                    \File::delete($rutaImagenAnterior);
                }            

                $DataConfig = Configuraciones::where('cClave','imagenNosotros')->get()->toArray();

                $NombreImagen = $Imagen->getClientOriginalName();            
                $ExtensionImagen = $Imagen->getClientOriginalExtension();
                
                $NombreLimpioImagen = $this->LimpiarNombres($NombreImagen);
                $Path = $pathWindows = realpath('')."/images/nosotros/";                
                $Imagen->move($Path,$NombreLimpioImagen);
                $RutaImagen = "images/nosotros/".$NombreLimpioImagen;
                                
                $Campos = [
                    'cClave' => 'imagenNosotros',
                    'cValor' => $RutaImagen
                ];

                if(empty($DataConfig)){
                    Configuraciones::create($Campos);
                }
                else{
                    Configuraciones::where('cClave','imagenNosotros')->update($Campos);
                }

                $return['urlImg'] = $RutaImagen;
                $return['Exito'] = true;
            }
            /*else{
                $return['urlImg'] = Configuraciones::where('cClave','imagenNosotros')->get()->toArray()[0]['cValor'];                
            }*/

            //if(!is_null($request->txtTituloNosotros) && !is_null($request->txtHistoriaNosotros)){
                
                $DataTitulo = Configuraciones::where('cClave','tituloNosotros')->get()->toArray();

                $Campos = [
                    'cClave' => 'tituloNosotros',                    
                ];

                $Campos['cValor']       = (!is_null($request->txtTituloNosotros)) ? $request->txtTituloNosotros : '';
                $Campos['cDescripcion'] = (!is_null($request->txtHistoriaNosotros)) ? $request->txtHistoriaNosotros : '';

                if(empty($DataTitulo)){
                    Configuraciones::create($Campos);
                }
                else{
                    Configuraciones::where('cClave','tituloNosotros')->update($Campos);
                }

                $return['Exito'] = true;


                //-------------------------------------------

                $DataMision = Configuraciones::where('cClave','infoMision')->get()->toArray();

                $Campos = [
                    'cClave' => 'infoMision',                    
                ];

                $Campos['cValor']       = (!is_null($request->tituloMision)) ? $request->tituloMision : '';
                $Campos['cDescripcion'] = (!is_null($request->txtMision)) ? $request->txtMision : '';

                if(empty($DataMision)){
                    Configuraciones::create($Campos);
                }
                else{
                    Configuraciones::where('cClave','infoMision')->update($Campos);
                }

                $return['Exito'] = true;


                //-------------------------------------------

                $DataVision = Configuraciones::where('cClave','infoVision')->get()->toArray();

                $Campos = [
                    'cClave' => 'infoVision',                    
                ];


                $Campos['cValor']       = (!is_null($request->tituloVision)) ? $request->tituloVision : '';
                $Campos['cDescripcion'] = (!is_null($request->txtVision)) ? $request->txtVision : '';

                if(empty($DataVision)){
                    Configuraciones::create($Campos);
                }
                else{
                    Configuraciones::where('cClave','infoVision')->update($Campos);
                }

                $return['Exito'] = true;

                //-------------------------------------------

                $DataValores = Configuraciones::where('cClave','infoValores')->get()->toArray();

                $Campos = [
                    'cClave' => 'infoValores',                    
                ];

                $Campos['cValor']       = (!is_null($request->tituloValores)) ? $request->tituloValores : '';
                $Campos['cDescripcion'] = (!is_null($request->txtValores)) ? $request->txtValores : '';

                if(empty($DataValores)){
                    Configuraciones::create($Campos);
                }
                else{
                    Configuraciones::where('cClave','infoValores')->update($Campos);
                }

                $return['Exito'] = true;

                //echo json_encode($return);
                return response()->json($return);
        }
    }

    function GuardaInformacionContacto(Request $request){
        
        if (!\Auth::check()) {
            //return redirect('/login');
            $miJson['redirect'] = asset();
            exit();
        }

        $Datos = $request->all();

        unset($Datos["labores_semana"]);
        unset($Datos["labores_finsemana"]);
          
        $Datos['HorariosSemana']  = $Datos['InihorarioSe']."@".$Datos['FinhorarioSe'];
        $Datos['HorariosFinSemana']  = $Datos['InihorarioFin']."@".$Datos['FinhorarioFin'];

        unset($Datos["InihorarioSe"]);
        unset($Datos["FinhorarioSe"]);
        unset($Datos["InihorarioFin"]);
        unset($Datos["FinhorarioFin"]);



        //"diasSemana" => "1,2,3"
        //"diasFin" => "1,2,3,4"

        //dd($Datos);


        /*menu_seccion" => "Contacto"
        "_token" => "1NvzP0Hvhb8zxmDfJ44OdQrEQqhnaWx5H75ZV0qz"
        "DireccionInfo" => "A espaldas cuartel militar"
        "TelefonoInfo" => "9992758813"
        "CorreoInfo" => "japj784@gmail.com"
        "WebInfo" => null
        "CorreoMail" => "japj784@gmail.com"*/
        
        if($Datos['menu_seccion'] == "Contacto"){          

            foreach ($Datos as $Inde => $valor) {
                if($Inde != '_token' && $Inde != 'fbInput' && $Inde != 'twInput' && $Inde != 'igInput' && $Inde != 'ytInput' && $valor == '' && $Inde != 'InihorarioFin' && $Inde != 'FinhorarioFin' && $Inde != 'diasFin' && $valor != 'labores_semana'){
                    $miJson['Mensaje'] = "Por favor llena todos los campos";
                }              
            }

            $arregloCampos = array();

            if(!isset($miJson['Mensaje'])){
                foreach ($Datos as $Inde => $valor) {                    

                    $Campos = [
                        'cClave' => $Inde,
                        'cValor' => $valor,
                        'cDescripcion' => ''
                    ];                    

                     try{
                        if(!empty(Configuraciones::where('cClave',$Inde)->get()->toArray())){                
                            Configuraciones::where('cClave', $Inde)->update($Campos);                
                            $miJson['update'] = true;
                        }   
                        else{
                            Configuraciones::create($Campos);                
                            $miJson['create'] = true;
                        }
                    }
                    catch(Exception $oExcep){
                        $miJson['bExito'] = false;
                        $miJson['cMensaje'] = $oExcep->getMessage();
                    }                    
                }         
                $miJson['Datos'] = 'Datos actualizados con exito';
            }
        }

        echo json_encode($miJson);
    }

    function VistaProductos(){
        $form_categoria = view('panel.modulos_panel.seccion_producto');
        return view('panel.panelcontrol')->with('vista',$form_categoria);
    }


    function productoSave(Request $request){  

        
        if (!\Auth::check()) {
          $jsonData['bError'] = false; 
          $jsonData['redirect'] = url('/login');
          return response()->json($jsonData);
        }    

        $NombreCategoriaDestino = "";
                
        $Imagen         = $request->file('Archivo');            
        $IdCategoria    = $request->Prodcategoria;
        $NombreProducto = $request->NameProducto;
        $IdSubCategoria = ($request->Prodsubcategoria != '') ? $request->Prodsubcategoria : 0;
        
        //$bSubCategoria  = ($request->Prodsubcategoria != '') ? $request->Prodsubcategoria : 0;

        
        
        $return['Exito'] = false;

            if(!empty($Imagen)){                
                
                $Contenido = new Productos();                

                $NombreImagen       = $NombreProducto.rand();//$Imagen->getClientOriginalName();            
                $ExtensionImagen    = $Imagen->getClientOriginalExtension();                                
            
                $caracteres = array(" ","-","&","!",
                                    "#","$","%","/",
                                    "(",")","=","'",
                                    "?","¿","¡","*",
                                    "+","~","}","]",
                                    "`","ñ","Ñ","{",
                                    "[","^",":",",",
                                    ";","|","°","¬");            
                
                $NombreLimpioImagen = str_replace($caracteres, '', $NombreImagen);

                $tildes  = array('á','é','í','ó','ú');
                $vocales = array('a','e','i','o','u');


                $NombreLimpioImagen = str_replace($tildes, $vocales, $NombreLimpioImagen).".".$ExtensionImagen;                    
                
                if(!$request->marca_marpe){
                    
                    $NombreCategoria    = Categoria::find($IdCategoria);
                    $CategoriaNom       = $NombreCategoria->nombre;    

                    $NombreRutaSubCate = '';                    
                    
                    if($IdSubCategoria != 0){
                        $NombreSubCategoria = Subcategoria::find($IdSubCategoria);
                        $NombreRutaSubCate       = $NombreSubCategoria->cNombre.'//';                            
                    }


                    $PathCategoria      = '//images//Catalogo//'.$NombreRutaSubCate.$CategoriaNom;
                    $Path = $pathWindows = realpath('').$PathCategoria;                
                    
                    $Imagen->move($Path,$NombreLimpioImagen);
                    
                    $RutaImagen = "images/Catalogo/".$NombreRutaSubCate.$CategoriaNom.'/'.$NombreLimpioImagen;                
                                                
                    $Contenido->nombre       = $NombreProducto;
                    $Contenido->descripcion  = $RutaImagen;
                    $Contenido->categoria    = $IdCategoria;
                    $Contenido->subcategoria = $IdSubCategoria;
                    $Contenido->save();
                }             
                elseif ($request->marca_marpe) {
                    
                    $PathMarca     = '//images//Marcas//';
                    $Path = $pathWindows = realpath('').$PathMarca;                
                    
                    $Imagen->move($Path,$NombreLimpioImagen);
                    
                    $RutaImagen = "images/Marcas/".$NombreLimpioImagen;                
                                                
                    $Contenido->nombre      = $NombreProducto;
                    $Contenido->descripcion = $RutaImagen;
                    $Contenido->categoria   = 0;
                    $Contenido->subcategoria = 0;
                    $Contenido->save();
                }                  

                $return['urlImg'] = 'Registro guardado con exito';
                $return['Exito'] = true;
            }
            else{
                              

                //Buscamos el producto
                $queryProducto = Productos::where('idProducto',$request->id)->get()->toArray();
                
                // return response()->json(["NombreArchivo" => $queryProducto]);

                $Longi = 0;
                
                if(!empty($queryProducto)){                    
                    
                    $Archivo              = $queryProducto[0]['descripcion'];
                    $rutaArchivo          = realpath('').'/'.$Archivo; 

                    do {
                        $Longi = strrpos($rutaArchivo,'/')+1;
                        $NombreArchivo = substr($rutaArchivo, $Longi, strlen($rutaArchivo));
                    } while (strpos($NombreArchivo,'/') !== false);

                    
                    /*
                        Prodsubcategoria: null
                        categoria_prod: "1"
                        id: "55"
                        nombre_prod: "Calzado dieléctrico - 2"
                    */

                    
                    $iDCategoria = ($queryProducto[0]['categoria'] != $request->categoria_prod) ? $request->categoria_prod : $queryProducto[0]['categoria'];
                    
                    $InfoCategoria    = Categoria::find($iDCategoria);
                    // return response()->json(["debug" => $iDCategoria]);
                    $NombreCategoria  = $InfoCategoria->nombre;    

                    
                    $NombreRutaSubCate = '';
                    $entre = "";
                    if($request->Prodsubcategoria != 0){
                        $entre = " Hola";
                        $NombreSubCategoria = Subcategoria::find($IdSubCategoria);
                        $NombreRutaSubCate  = '/'.$NombreSubCategoria->cNombre;
                    }



                    $PathCategoria      = '/images/Catalogo/'.$NombreCategoria.$NombreRutaSubCate;
                    $PathNuevoDestino   = realpath('').$PathCategoria.'/'.$NombreArchivo;                                   
                    $PathImagenCSS      = 'images/Catalogo/'.$NombreCategoria.$NombreRutaSubCate.'/'.$NombreArchivo;
                    
                    $Parametros = [
                        "nombre"        => $request->nombre_prod,
                        "categoria"     => $request->categoria_prod,
                        "subcategoria"  => $IdSubCategoria,
                        'descripcion'   => $PathImagenCSS
                    ];
                    
                    // return response()->json(['rutaFile' => $rutaArchivo, "NuevoDestino1" => $PathNuevoDestino.$entre]);
                    
                    if($rutaArchivo != $PathNuevoDestino && \File::exists($rutaArchivo)){ //Comprobamos si existe el origen                           
                        // return response()->json(["debug" => true]);
                        //Si no existe el directorio lo creamos
                        if(!\File::exists(public_path().$PathCategoria)) {
                            \File::makeDirectory(public_path().$PathCategoria);                                
                        }                                

                        if(copy($rutaArchivo, $PathNuevoDestino)){                            
                            unlink($rutaArchivo);//eliminamos el original                                                                            
                        }
                        
                        //$return['RutaAnterior'] = "Ruta Anterior ".$rutaArchivo;//basename($rutaArchivo); 
                        //$return['RutaNueva'] = "Ruta Nueva ".$PathNuevoDestino;
                    }                                       
                    // return response()->json(["debug" => false]);
                    if(Productos::where('idProducto',$request->id)->update($Parametros)){
                        $return['urlImg'] = 'Registro modificado con exito';
                        $return['Exito'] = true;
                    }                                       
                }
                                                    
                //$IdProducto             = $request->id;                             
                //$return['urlImg']       = $rutaArchivo;
            }

        return response()->json($return, 200);
        //return Response::json();
    }    

    function enviarMail(Request $request){
        
        $io = $request->all(); 

        //dd($io);
               
        if(isset($io['g-recaptcha-response']) && $this->validarCaptcha($io['g-recaptcha-response'])){
            $io['subject'] = "Servicio al cliente";

            $info = Configuraciones::where('cClave','CorreoMail')->get()->toArray();

            \Mail::to($info[0]['cValor'])->send(new TemplateContacto($io));        
            $mensaje = '<div id="success-alert"><div class="alert alert-success">Tu mensaje ha sido enviado con exito.</div></div>';
            \Session::flash('mensaje',$mensaje);
        }
        else{

            $mensaje = '<div id="success-alert"><div class="alert alert-success">Por favor selecciona el captcha.</div></div>';
            \Session::flash('mensaje',$mensaje);   
        }
        return redirect('contacto');
        //return view('contacto_marpe')->with('Contenido',$arrContacto);//->with('mensaje',$mensaje);
    }

    function GetItemsProductos(Request $request){

        $bfiltro = false;
        $draw    =  $request['draw'];
        $start   =  $request['start'];
        $length  =  $request['length'];



        $totalRecords = Productos::Select('count (*) as total')->where('categoria', '<>', 0)->Join("categoria","categoria.idCategoria","=","producto.categoria")->count();

        $QueryCategoria = Productos::query();

        $QueryCategoria->select('producto.idProducto','producto.nombre as nombreProd','producto.descripcion',
                                'producto.categoria','categoria.nombre as nombreCate', 'categoria.idCategoria as folioCategoria',
                                'subcategorias.idsubcategoria as folioSubcate','subcategorias.cNombre as NombreSubCategoria');

        $QueryCategoria->Join("categoria","categoria.idCategoria","=","producto.categoria");
        $QueryCategoria->leftJoin("subcategorias","subcategorias.idsubcategoria","=","producto.subcategoria");

        if(isset($request['search']['value']) && $request['search']['value'] != ''){            
            $QueryCategoria->where('producto.nombre','like','%'.$request['search']['value'].'%');
            $QueryCategoria->orWhere('categoria.nombre','like','%'.$request['search']['value'].'%');
            $bfiltro = true;
        }

        $QueryCategoria->where('producto.categoria','!=',0);
        $QueryCategoria->orderBy('producto.idProducto', 'asc');
        //$QueryCategoria->where('producto.subcategoria','!=',0);
        $QueryCategoria->skip($start);
        $QueryCategoria->take($length);                
        $retornoData = $QueryCategoria->get()->toArray();
        //dd($retornoData);
        $recordsFiltro = ($bfiltro) ? count($retornoData) : $totalRecords;
        
        $data = array();
        $array2 = array();
        
        foreach ($retornoData as $Indice => $valor) {
            $array2['iIdCategoria']         = $valor['idProducto'];
            $array2['cNombreCategoria']     = $valor['nombreProd'];
            $array2['bEstatus']             = ($valor['NombreSubCategoria'] != '') ? $valor['nombreCate'] ."<br> <b>Sub: </b> ". $valor['NombreSubCategoria'] : $valor['nombreCate'];//($valor['activo']) ? 'Activo' : 'Desactivado';    
            $array2['opciones']             = '<a class="btn btn-default btn-sm" id="deleteItem" style="margin-left:20px;"><span class="fa fa-trash"></span></a>
                                  <a class="btn btn-default btn-sm"  href="#ex1" style="color: inherit;" rel="modal:open" data="" id="editarProd" style="margin-left:20px;"><span class="fa fa-pencil-square-o" aria-hidden="true"></span></a>';                                   
            $array2['pathImg']              = '<img style="with:100px; height:100px;" src="'.asset("/".$valor['descripcion']).'" alt="">';//realpath(''); //   
            $array2['folioCategoria']       = $valor['folioCategoria'];
            $array2['subcategoria']         = $valor['folioSubcate'];
            $array2['Nombresubcate']        = $valor['NombreSubCategoria'];
            $data[] = $array2;        
        }


        $jsosData = [
            'draw' => $draw,
            'recordsFiltered' => $recordsFiltro,
            'recordsTotal' => $totalRecords,
            'data' => $data
        ];

        echo json_encode($jsosData);
        // exit;
    }

    function GetItemsMarca(Request $request){

        $bfiltro = false;
        $draw    =  $request['draw'];
        $start   =  $request['start'];
        $length  =  $request['length'];

        $totalRecords = Productos::Select('count (*) as total')->where('categoria', '=', 0)->count();

        $QueryCategoria = Productos::query();

        $QueryCategoria->select('producto.idProducto','producto.nombre as nombreProd','producto.descripcion','producto.categoria');

        if(isset($request['search']['value']) && $request['search']['value'] != ''){            

            $QueryCategoria->where('producto.nombre','like','%'.$request['search']['value'].'%');            
            $bfiltro = true;
        }
        

        $QueryCategoria->where('producto.categoria','=',0);
        $QueryCategoria->skip($start);
        $QueryCategoria->take($length);                
        $retornoData = $QueryCategoria->get()->toArray();

        $recordsFiltro = ($bfiltro) ? count($retornoData) : $totalRecords;
        
        $data = array();
        $array2 = array();
        
        foreach ($retornoData as $Indice => $valor) {
            $array2['iIdMarca']      = $valor['idProducto'];
            $array2['cNombreImagen'] = $valor['nombreProd'];            
            $array2['opciones'] = '<a class="btn btn-default btn-sm" id="deleteMarca" style="margin-left:20px;"><span class="fa fa-trash"></span></a>';                                   
            $array2['pathImg']  = '<img style="with:100px; height:100px;" src="'.asset("/".$valor['descripcion']).'" alt="">';
            $data[] = $array2;        
        }


        $jsosData = [
            'draw' => $draw,
            'recordsFiltered' => $recordsFiltro,
            'recordsTotal' => $totalRecords,
            'data' => $data
        ];

        echo json_encode($jsosData);
    }

    function GetItemsFiles(Request $request){

        $bfiltro = false;
        $draw    =  $request['draw'];
        $start   =  $request['start'];
        $length  =  $request['length'];

        $totalRecords = Archivos::Select('count (*) as total')->count();

        $QueryCategoria = Archivos::query();

        $QueryCategoria->select('archivos_m.id_file','archivos_m.nombre_archivo as nombreArchivo','archivos_m.nombre_formal as nombreFormal','archivos_m.ruta_archivo');

        if(isset($request['search']['value']) && $request['search']['value'] != ''){            

            $QueryCategoria->where('producto.nombre','like','%'.$request['search']['value'].'%');            
            $bfiltro = true;
        }
        

        //$QueryCategoria->where('producto.categoria','=',0);
        $QueryCategoria->skip($start);
        $QueryCategoria->take($length);                
        $retornoData = $QueryCategoria->get()->toArray();

        $recordsFiltro = ($bfiltro) ? count($retornoData) : $totalRecords;
        
        $data = array();
        $array2 = array();
        
        foreach ($retornoData as $Indice => $valor) {
            $array2['iIdArchivo']      = $valor['id_file'];
            $array2['cNombreDoc'] = $valor['nombreArchivo'];            
            $array2['opciones'] = ' <a class="btn btn-default btn-sm" id="copyLink" style="margin-left:20px;" data-toggle="tooltip" data-placement="left" title="Copiar"><span class="fa fa-files-o"></span></a>
                                    <a class="btn btn-default btn-sm" id="deleteFile" style="margin-left:20px;"><span class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="Eliminar"></span></a>';                                   
            $array2['pathDoc']  = "<a id='linkFile' target='_blank' href='".asset('Documentos/'.$valor['nombreFormal'])."'>".$valor['nombreFormal']."</a>";//'<img style="with:100px; height:100px;" src="'.asset("/".$valor['descripcion']).'" alt="">';
            $array2['vinculoFile'] = asset('Documentos/'.$valor['nombreFormal']);
            $data[] = $array2;        
        }


        $jsosData = [
            'draw' => $draw,
            'recordsFiltered' => $recordsFiltro,
            'recordsTotal' => $totalRecords,
            'data' => $data
        ];

        echo json_encode($jsosData);
    }   


    function procesaImagen(Request $request){

        $Files = $request->file('file');                
        
        $ruta['real']   = realpath('')."\\Inicio";
        $ruta['asset']  = "/Inicio/";

        if(is_array($Files)){            
            $respuesta = $this->SetImagen($Files,true,$ruta);
        }
        else{
            $respuesta = $this->SetImagen($Files,false,$ruta);
        }

        return response()->json($respuesta, 200);
    }

    function SetImagen($file, $bArreglo, $ruta){

        $arregloImagenesDone = array(); 

        try{                        
            
            if($bArreglo){
                foreach ($file as $index => $fileUno) {
                    
                    $Extension      = $fileUno->getClientOriginalExtension();
                    $NombreImagen   = $this->LimpiarNombres($fileUno->getClientOriginalName());                   
                                        
                    $arregloImagenesDone['RutaImagen']   = $ruta['asset'].$NombreImagen;

                    $fileUno->move($ruta['real'],$arregloImagenesDone['RutaImagen']);

                    $arrgloFinal[] = $arregloImagenesDone;
                }

            }

            $SuperFile    = $file;            
            $data['data'] = $arrgloFinal;

        } catch (Exception $e) {
            $data['cError'] = $e->getMessage();            
        }

        return $data;
        //return response()->json($data, 200);
        //echo json_encode($Data);
    }

    function LimpiarNombres($NombreLimpioImagen){


        $caracteres = array(" ","-","&","!",
                            "#","$","%","/",
                            "(",")","=","'",
                            "?","¿","¡","*",
                            "+","~","}","]",
                            "`","ñ","Ñ","{",
                            "[","^",":",",",
                            ";","|","°","¬");            
        $replace = '';
                
        $NombreLimpioImagen = str_replace($caracteres, $replace, $NombreLimpioImagen);

        $tildes  = array('á','é','í','ó','ú');
        $vocales = array('a','e','i','o','u');

        $NombreLimpioImagen = str_replace($tildes, $vocales, $NombreLimpioImagen); 

        return $NombreLimpioImagen;
    }

    function SaveArchivo(Request $request){

        if (!\Auth::check()) {
          $jsonData['bError'] = false; 
          $jsonData['redirect'] = url('/login');
          return response()->json($jsonData);
        }
        
        $ContentReturn = array();
        $ContentReturn['bError'] = false;            
        $File = $request->file('file-0');         

        $validator =  \Validator::make($request->all(), [
            'file-0'   => 'mimes:doc,pdf,docx,zip'
        ]);
        
        if($validator->fails()){
            $ContentReturn['bError'] = true;
            $ContentReturn['mError'] = "El archivo no es el correcto, verifique porfavor";
        }
        else{            

            $Contenido = new Archivos();            
            
            $NombreImagen = $File->getClientOriginalName();  
            $Extension    = $File->extension();                                      
            $NombreLimpioImagen = $this->LimpiarNombres($NombreImagen);
            
            $Path = $pathWindows = realpath('')."/Documentos/";                            
            $NombreOficial = "Documento".rand().".".$Extension;            
            $File->move($Path,$NombreOficial);            
            $RutaImagen = "Documentos/".$NombreOficial;

            $Contenido->ruta_archivo = $RutaImagen;
            $Contenido->nombre_archivo = $NombreLimpioImagen;
            $Contenido->nombre_formal = $NombreOficial;

            if($Contenido->save()){
                $ContentReturn['mError'] = "Guardado...";
            }
        }

        return response()->json($ContentReturn);
    }

    function validarCaptcha($captcha){

        
        if ($captcha == '') {
            return false;
        }
        else {
            $obj = new \stdClass();
            $obj->secret = "6Lcey4IfAAAAAGVAFQ9UlvCJXMDrdJ-aGjafvMlh";
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
