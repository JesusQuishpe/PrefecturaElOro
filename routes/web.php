<?php

use App\Http\Controllers\BioquimicaController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\CoprologiaController;
use App\Http\Controllers\CoproparasitarioController;
use App\Http\Controllers\EnfermeriaController;
use App\Http\Controllers\ExamenOrinaController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\MedicinaController;
use App\Http\Controllers\OdontologiaController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Estas rutas son relativas a http://localhost/Prefectura/public/

//Views
Route::view('/','menu/index');
Route::view('/caja','caja/index');
Route::view('/enfermeria','enfermeria/index');
//Route::view('laboratorio/bioquimica','laboratorio/bioquimica');
Route::view('/prueba','odontologia/plantillas/prueba');
Route::view('/laboratorio','laboratorio/index');

//Gets
Route::get('/enfermeria/pacientes',[EnfermeriaController::class,'pacientes']);
Route::get('/odontologia',[OdontologiaController::class,'index']);
Route::get('/odontologia/pacientes',[OdontologiaController::class,'pacientes']);
Route::get('/odontologia/historiales',[OdontologiaController::class,'historiales']);
Route::get('/odontologia/ficha/{idOdo}',[FichaController::class,'ficha'])->name('NuevaFicha');
Route::get('/odontologia/cie',[FichaController::class,'cie']);
Route::get('/odontologia/paciente/{opcion?}',[OdontologiaController::class,'paciente']);
Route::get('/medicina',[MedicinaController::class,'index']);
Route::get('/odontologia/historial/{idOdo}/show',[OdontologiaController::class,'historialShow']);
Route::get('/odontologia/historial/{idOdo}',[OdontologiaController::class,'historial']);
Route::get('/odontologia/{idOdo}/pdf',[PDFController::class,'pdf'])->name('RoutePdf');
//Posts
Route::post('caja/save',[CajaController::class,'save'])->name('caja.save');
Route::post('caja/buscar',[CajaController::class,'buscar'])->name('caja.buscar');
Route::post('/caja/pacientes',[CajaController::class,'pacientes']);
Route::post('/enfermeria/save',[EnfermeriaController::class,'save']);
Route::post('/odontologia/ficha/save',[FichaController::class,'save']);
Route::post('/odontologia/lastOdontograma',[FichaController::class,'lastOdontograma']);
Route::post('/laboratorio/bioquimica/save',[LaboratorioController::class,'saveBioquimica'])->name('bioquimica.save');
Route::post('/laboratorio/bioquimica/buscar',[LaboratorioController::class,'buscarPaciente'])->name('bioquimica.buscar');
//Delete
Route::delete('/odontologia/delete/{idOdo}',[OdontologiaController::class,'delete'])->name('OdoDelete');

//Bioquimica
/*Route::resource('laboratorio/bioquimica', BioquimicaController::class)->only([
    'index','create','store','edit'
]);*/
//Route::get('laboratorio',[BioquimicaController::class,'index'])->name('bioquimica.index');
Route::get('laboratorio/bioquimica/nuevo',[BioquimicaController::class,'nuevo'])->name('bioquimica.nuevo');
Route::get('laboratorio/bioquimica/{id_bioquimica}/editar',[BioquimicaController::class,'edit'])->name('bioquimica.edit');
Route::put('laboratorio/bioquimica/{id_bioquimica}',[BioquimicaController::class,'update'])->name('bioquimica.update');
Route::get('laboratorio/bioquimica/editar',[BioquimicaController::class,'editar'])->name('bioquimica.editar');
Route::delete('laboratorio/bioquimica/{id_bioquimica}',[BioquimicaController::class,'delete'])->name('bioquimica.delete');
Route::get('laboratorio/bioquimica/todos',[BioquimicaController::class,'todos'])->name('bioquimica.todos');
Route::post('laboratorio/bioquimica/guardar',[BioquimicaController::class,'guardar'])->name('bioquimica.guardar');
Route::post('laboratorio/bioquimica/ultimaCita',[BioquimicaController::class,'ultimaCita'])->name('bioquimica.ultimaCita');

//Coprologia
//Route::get('laboratorio',[CoprologiaController::class,'index'])->name('coprologia.index');
Route::get('laboratorio/coprologia/nuevo',[CoprologiaController::class,'nuevo'])->name('coprologia.nuevo');
Route::get('laboratorio/coprologia/{id_coprologia}/editar',[CoprologiaController::class,'edit'])->name('coprologia.edit');
Route::put('laboratorio/coprologia/{id_coprologia}',[CoprologiaController::class,'update'])->name('coprologia.update');
Route::get('laboratorio/coprologia/editar',[CoprologiaController::class,'editar'])->name('coprologia.editar');
Route::delete('laboratorio/coprologia/{id_coprologia}',[CoprologiaController::class,'delete'])->name('coprologia.delete');
Route::get('laboratorio/coprologia/todos',[CoprologiaController::class,'todos'])->name('coprologia.todos');
Route::post('laboratorio/coprologia/guardar',[CoprologiaController::class,'guardar'])->name('coprologia.guardar');

//Coproparasitario
Route::get('laboratorio',[CoproparasitarioController::class,'index'])->name('coproparasitario.index');
Route::get('laboratorio/coproparasitario/nuevo',[CoproparasitarioController::class,'nuevo'])->name('coproparasitario.nuevo');
Route::get('laboratorio/coproparasitario/editar',[CoproparasitarioController::class,'editar'])->name('coproparasitario.editar');
Route::get('laboratorio/coproparasitario/todos',[CoproparasitarioController::class,'todos'])->name('coproparasitario.todos');
//Examen de orina
Route::get('laboratorio',[ExamenOrinaController::class,'index'])->name('examen-orina.index');
Route::get('laboratorio/examen-orina/nuevo',[ExamenOrinaController::class,'nuevo'])->name('examen-orina.nuevo');
Route::get('laboratorio/examen-orina/editar',[ExamenOrinaController::class,'editar'])->name('examen-orina.editar');
Route::get('laboratorio/examen-orina/todos',[ExamenOrinaController::class,'todos'])->name('examen-orina.todos');

