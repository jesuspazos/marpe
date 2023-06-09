<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuraciones;
use App\Productos;
use App\Categoria;
use App\Subcategoria;
class Direccionador extends Controller
{
    
    public function __construct(){                
        
        $DatosInicio = Configuraciones::where('cClave','fbInput')
                                        ->orWhere('cClave','twInput')
                                        ->orWhere('cClave','igInput')
                                        ->orWhere('cClave','ytInput')
                                        ->orWhere('cClave','CorreoInfo')
                                        ->orWhere('cClave','TelefonoInfo')
                                        ->orWhere('cClave','DireccionInfo')
                                        ->orWhere('cClave','WebInfo')
                                        ->orWhere('cClave','HorariosSemana')
                                        ->orWhere('cClave','diasSemana')
                                        ->orWhere('cClave','diasFin')
                                        ->orWhere('cClave','HorariosFinSemana')
                                        ->get()->toArray();        
        $DiasSemana = [
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miercoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'Sabado',
            7 => 'Domingo',
        ];                

        if(!empty($DatosInicio)){

            $Matriz = ['fbInput', 'twInput', 'igInput', 'ytInput', 'CorreoInfo','TelefonoInfo','DireccionInfo','WebInfo','HorariosSemana','diasSemana','diasFin','HorariosFinSemana'];        
            
            foreach ($DatosInicio as $key => $Valor) {                       
                if(in_array($Valor['cClave'], $Matriz)){                
                    if($Valor['cValor'] != null){                                                      
                        $this->Arreglo[$Valor['cClave']] = $Valor['cValor'];
                    }
                    else{                     
                        unset($this->Arreglo[$Valor['cClave']]);                                    
                    }                                                             
                } 
            } 


            $Semana = explode(',', $this->Arreglo['diasSemana']); 
            $ContadorSemana = count($Semana);
            $Inicio = $Semana[0];
            $Fin = $Semana[$ContadorSemana-1];
            $this->Arreglo['DiasSemana'] = $DiasSemana[$Inicio]." - ".$DiasSemana[$Fin];

            if(isset($this->Arreglo['diasFin']) && $this->Arreglo['diasFin'] != ''){
                $Semana = explode(',', $this->Arreglo['diasFin']); 
                $ContadorSemana = count($Semana);
                $Inicio = $Semana[0];
                $Fin = $Semana[$ContadorSemana-1];
                $this->Arreglo['diasFin'] = $DiasSemana[$Inicio]." - ".$DiasSemana[$Fin];  
            }
        }            
    }
    //
    // public function index()
    // {
    //     return view('welcome');
    // }
    public function index(){
        

        $Contenido = array();
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

        // dd($this->Arreglo);
         // dd($Contenido);
        
        // return view('inicio')->with('Contenido',$Contenido)->with('RRSS',$this->Arreglo)->with('Marcas',$DatosMarcas);
        return view('cuerpo.home')->with('Contenido',$Contenido)->with('RRSS',$this->Arreglo)->with('Marcas',$DatosMarcas);
    }


}
