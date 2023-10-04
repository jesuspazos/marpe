
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//---------Vista publico-----------------

Route::get('/', 'Direccionador@index');
Route::get('catalogo','Direccionador@catalogo');
Route::get('nosotros/{section?}', 'Direccionador@nosotros');
Route::get('contacto', 'Direccionador@contacto');
Route::get('registro', 'Direccionador@registro');

Route::post('/sendMail','Direccionador@enviarMail');

Route::get('/tree', function () {
    return view('cuerpo.test');
});


//---------Rutas Vista Panel control-----------------
Route::get('menuinicio', 'ControlPanel@menu_inicio');
Route::get('categoria','ControlPanel@Categoria');
Route::get('Archivos', 'ControlPanel@Archivos');



//--------------Back--------
Route::post('GuardarInformacion', 'ControlPanel@guardarInformacion');
Route::post('guardarContacto','ControlPanel@GuardaInformacionContacto');
Route::get('altaProducto','ControlPanel@VistaProductos');
Route::post('GuardarArchivo', 'ControlPanel@SaveArchivo');
Route::post('productoSave','ControlPanel@productoSave');


//----------Consulta--------
Route::post('portada','ControlPanel@InformacionPortada');
Route::get('CategoriaCombo','ControlPanel@GetCategoriaCombo');
Route::post('display','ControlPanel@GetCategorias');
Route::post('displaysub','ControlPanel@GetSubCategorias');


Route::post('GuardarInicio','ControlPanel@GuardarSettings');
Route::get('SubcategoriaCombo/{id}','ControlPanel@GetSubcategoriaCombo');
Route::post('getitems','ControlPanel@GetItemsProductos');
Route::post('setImg','ControlPanel@procesaImagen');
Route::post('getbrand','ControlPanel@GetItemsMarca');
Route::post('getfiles','ControlPanel@GetItemsFiles');
Route::post('GuardarCategoria','ControlPanel@GuardarCategoria');
Route::post('GuardarSubategoria','ControlPanel@GuardarSubcategoria');
Route::post('VerifyCat','ControlPanel@ComprobarCategoria');
Route::post('DeleteCate','ControlPanel@EliminarCategoria');
Route::post('VerifySubCat','ControlPanel@ComprobarSubCategoria');
Route::post('DeleteSubCate','ControlPanel@EliminarSubCategoria');
Route::post('DeleteProd','ControlPanel@EliminarProducto');
Route::post('DeleteFile','ControlPanel@EliminarArchivo');





Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('panel.panelcontrol');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/limpiar', function() {
    
    // Artisan::call('config:cache');
    // Artisan::call('config:clear');
    // Artisan::call('cache:clear');
    
    // Artisan::call('route:cache');
    // Artisan::call('route:clear');
    // Artisan::call('optimize'); //1
    // Artisan::call('optimize:clear'); //2
    // Artisan::call('view:clear');
    


    // php artisan optimize
    // php artisan optimize:clear
    return "Cache esta limpio";
});
