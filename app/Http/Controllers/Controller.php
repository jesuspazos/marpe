<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

use App\Configuraciones;
use App\Productos;
use App\Categoria;
use App\Subcategoria;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(){                
        
        $aInicioGral = [];

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
                        $aInicioGral[$Valor['cClave']] = $Valor['cValor'];
                    }
                    else{                     
                        unset($aInicioGral[$Valor['cClave']]);                                    
                    }                                                             
                } 
            } 


            $Semana = explode(',', $aInicioGral['diasSemana']); 
            $ContadorSemana = count($Semana);
            $Inicio = $Semana[0];
            $Fin = $Semana[$ContadorSemana-1];
            $aInicioGral['DiasSemana'] = $DiasSemana[$Inicio]." - ".$DiasSemana[$Fin];

            if(isset($aInicioGral['diasFin']) && $aInicioGral['diasFin'] != ''){
                $Semana = explode(',', $aInicioGral['diasFin']); 
                $ContadorSemana = count($Semana);
                $Inicio = $Semana[0];
                $Fin = $Semana[$ContadorSemana-1];
                $aInicioGral['diasFin'] = $DiasSemana[$Inicio]." - ".$DiasSemana[$Fin];  
            }
        }

        view()->share('RRSS',$aInicioGral);            
    }
}
