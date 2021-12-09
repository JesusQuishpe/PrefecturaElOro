<?php

use App\Http\Controllers\BioquimicaController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\CoprologiaController;
use App\Http\Controllers\CoproparasitarioController;
use App\Http\Controllers\EmbarazoController;
use App\Http\Controllers\EnfermeriaController;
use App\Http\Controllers\ExamenOrinaController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\HelicobacterController;
use App\Http\Controllers\HelicobacterHecesController;
use App\Http\Controllers\HematologiaController;
use App\Http\Controllers\HemoglobinaController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\MedicinaController;
use App\Http\Controllers\OdontologiaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TiroideasController;
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
Route::get('laboratorio/coproparasitario/nuevo',[CoproparasitarioController::class,'nuevo'])->name('coproparasitario.nuevo');
Route::get('laboratorio/coproparasitario/{id_coproparasitario}/editar',[CoproparasitarioController::class,'edit'])->name('coproparasitario.edit');
Route::put('laboratorio/coproparasitario/{id_coproparasitario}',[CoproparasitarioController::class,'update'])->name('coproparasitario.update');
Route::get('laboratorio/coproparasitario/editar',[CoproparasitarioController::class,'editar'])->name('coproparasitario.editar');
Route::delete('laboratorio/coproparasitario/{id_coproparasitario}',[CoproparasitarioController::class,'delete'])->name('coproparasitario.delete');
Route::get('laboratorio/coproparasitario/todos',[CoproparasitarioController::class,'todos'])->name('coproparasitario.todos');
Route::post('laboratorio/coproparasitario/guardar',[CoproparasitarioController::class,'guardar'])->name('coproparasitario.guardar');
//Examen de orina
Route::get('laboratorio/examen-orina/nuevo',[ExamenOrinaController::class,'nuevo'])->name('examen-orina.nuevo');
Route::get('laboratorio/examen-orina/{id_examenOrina}/editar',[ExamenOrinaController::class,'edit'])->name('examen-orina.edit');
Route::put('laboratorio/examen-orina/{id_examenOrina}',[ExamenOrinaController::class,'update'])->name('examen-orina.update');
Route::get('laboratorio/examen-orina/editar',[ExamenOrinaController::class,'editar'])->name('examen-orina.editar');
Route::delete('laboratorio/examen-orina/{id_examenOrina}',[ExamenOrinaController::class,'delete'])->name('examen-orina.delete');
Route::get('laboratorio/examen-orina/todos',[ExamenOrinaController::class,'todos'])->name('examen-orina.todos');
Route::post('laboratorio/examen-orina/guardar',[ExamenOrinaController::class,'guardar'])->name('examen-orina.guardar');
//Embarazo
Route::get('laboratorio/embarazo/nuevo',[EmbarazoController::class,'nuevo'])->name('embarazo.nuevo');
Route::get('laboratorio/embarazo/{id_embarazo}/editar',[EmbarazoController::class,'edit'])->name('embarazo.edit');
Route::put('laboratorio/embarazo/{id_embarazo}',[EmbarazoController::class,'update'])->name('embarazo.update');
Route::get('laboratorio/embarazo/editar',[EmbarazoController::class,'editar'])->name('embarazo.editar');
Route::delete('laboratorio/embarazo/{id_embarazo}',[EmbarazoController::class,'delete'])->name('embarazo.delete');
Route::get('laboratorio/embarazo/todos',[EmbarazoController::class,'todos'])->name('embarazo.todos');
Route::post('laboratorio/embarazo/guardar',[EmbarazoController::class,'guardar'])->name('embarazo.guardar');
//Helicobacter
Route::get('laboratorio/helicobacter/nuevo',[HelicobacterController::class,'nuevo'])->name('helicobacter.nuevo');
Route::get('laboratorio/helicobacter/{id_helicobacter}/editar',[HelicobacterController::class,'edit'])->name('helicobacter.edit');
Route::put('laboratorio/helicobacter/{id_helicobacter}',[HelicobacterController::class,'update'])->name('helicobacter.update');
Route::get('laboratorio/helicobacter/editar',[HelicobacterController::class,'editar'])->name('helicobacter.editar');
Route::delete('laboratorio/helicobacter/{id_helicobacter}',[HelicobacterController::class,'delete'])->name('helicobacter.delete');
Route::get('laboratorio/helicobacter/todos',[HelicobacterController::class,'todos'])->name('helicobacter.todos');
Route::post('laboratorio/helicobacter/guardar',[HelicobacterController::class,'guardar'])->name('helicobacter.guardar');
//Helicobacter Heces
Route::get('laboratorio/helicobacterHeces/nuevo',[HelicobacterHecesController::class,'nuevo'])->name('helicobacterHeces.nuevo');
Route::get('laboratorio/helicobacterHeces/{id_helicobacterHeces}/editar',[HelicobacterHecesController::class,'edit'])->name('helicobacterHeces.edit');
Route::put('laboratorio/helicobacterHeces/{id_helicobacterHeces}',[HelicobacterHecesController::class,'update'])->name('helicobacterHeces.update');
Route::get('laboratorio/helicobacterHeces/editar',[HelicobacterHecesController::class,'editar'])->name('helicobacterHeces.editar');
Route::delete('laboratorio/helicobacterHeces/{id_helicobacterHeces}',[HelicobacterHecesController::class,'delete'])->name('helicobacterHeces.delete');
Route::get('laboratorio/helicobacterHeces/todos',[HelicobacterHecesController::class,'todos'])->name('helicobacterHeces.todos');
Route::post('laboratorio/helicobacterHeces/guardar',[HelicobacterHecesController::class,'guardar'])->name('helicobacterHeces.guardar');
//Hematologia
Route::get('laboratorio/hematologia/nuevo',[HematologiaController::class,'nuevo'])->name('hematologia.nuevo');
Route::get('laboratorio/hematologia/{id_hematologia}/editar',[HematologiaController::class,'edit'])->name('hematologia.edit');
Route::put('laboratorio/hematologia/{id_hematologia}',[HematologiaController::class,'update'])->name('hematologia.update');
Route::get('laboratorio/hematologia/editar',[HematologiaController::class,'editar'])->name('hematologia.editar');
Route::delete('laboratorio/hematologia/{id_hematologia}',[HematologiaController::class,'delete'])->name('hematologia.delete');
Route::get('laboratorio/hematologia/todos',[HematologiaController::class,'todos'])->name('hematologia.todos');
Route::post('laboratorio/hematologia/guardar',[HematologiaController::class,'guardar'])->name('hematologia.guardar');
//Hemoglobina
Route::get('laboratorio/hemoglobina/nuevo',[HemoglobinaController::class,'nuevo'])->name('hemoglobina.nuevo');
Route::get('laboratorio/hemoglobina/{id_hemoglobina}/editar',[HemoglobinaController::class,'edit'])->name('hemoglobina.edit');
Route::put('laboratorio/hemoglobina/{id_hemoglobina}',[HemoglobinaController::class,'update'])->name('hemoglobina.update');
Route::get('laboratorio/hemoglobina/editar',[HemoglobinaController::class,'editar'])->name('hemoglobina.editar');
Route::delete('laboratorio/hemoglobina/{id_hemoglobina}',[HemoglobinaController::class,'delete'])->name('hemoglobina.delete');
Route::get('laboratorio/hemoglobina/todos',[HemoglobinaController::class,'todos'])->name('hemoglobina.todos');
Route::post('laboratorio/hemoglobina/guardar',[HemoglobinaController::class,'guardar'])->name('hemoglobina.guardar');
//Tiroideas
Route::get('laboratorio/tiroideas/nuevo',[TiroideasController::class,'nuevo'])->name('tiroideas.nuevo');
Route::get('laboratorio/tiroideas/{id_tiroideas}/editar',[TiroideasController::class,'edit'])->name('tiroideas.edit');
Route::put('laboratorio/tiroideas/{id_tiroideas}',[TiroideasController::class,'update'])->name('tiroideas.update');
Route::get('laboratorio/tiroideas/editar',[TiroideasController::class,'editar'])->name('tiroideas.editar');
Route::delete('laboratorio/tiroideas/{id_tiroideas}',[TiroideasController::class,'delete'])->name('tiroideas.delete');
Route::get('laboratorio/tiroideas/todos',[TiroideasController::class,'todos'])->name('tiroideas.todos');
Route::post('laboratorio/tiroideas/guardar',[TiroideasController::class,'guardar'])->name('tiroideas.guardar');