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
Route::get('catalogo_mar','Direccionador@catalogo');
Route::get('nosotros/{section?}', 'Direccionador@nosotros');
Route::get('contacto', 'Direccionador@contacto');
Route::get('registro', 'Direccionador@registro');

Route::get('/tree', function () {
    return view('cuerpo.test');
});


//---------Rutas Panel control-----------------
Route::get('menuinicio', 'ControladorHome@menu_inicio');
Route::post('GuardarInformacion', 'ControladorHome@guardarInformacion');
Route::post('guardarContacto','ControladorHome@GuardaInformacionContacto');
Route::get('categoria','ControladorHome@Categoria');
Route::get('Archivos', 'ControladorHome@Archivos');
Route::post('GuardarArchivo', 'ControladorHome@SaveArchivo');
Route::get('altaProducto','ControladorHome@VistaProductos');
Route::post('productoSave','ControladorHome@productoSave');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
