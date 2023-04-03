<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kaizenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\calendarioController;
use App\Http\Controllers\CalendarExtController;
use App\Http\Controllers\analisisdesgasteController;
use App\Http\Controllers\ayudasvisualesController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\usersController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/error', function () {
    return view('error');
});

Route::get('login', [LoginController::class, 'show']);

Route::post('login', [LoginController::class, 'login']);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('logout', [LogoutController::class, 'logout']);

//Ruta de vista para mostrar formulario de carga de un análisis de desgaste existente
Route::get('analisisdesgaste/upload', [analisisdesgasteController::class, 'upload'])->name('analisisdesgaste.upload');
//Ruta para almacenar un análisis de desgaste existente
Route::put('analisisdesgaste/upload', [analisisdesgasteController::class, 'storeUploaded'])->name('analisisdesgaste.upload.store');
//Ruta de vista para mostrar formulario de carga de un kaizen existente
Route::get('kaizen/upload', [kaizenController::class, 'upload'])->name('kaizen.upload');
//Ruta para almacenar un kaizen existente
Route::put('kaizen/upload', [kaizenController::class, 'storeUploaded'])->name('kaizen.upload.store');

Route::resource('analisisdesgaste','App\Http\Controllers\analisisdesgasteController')->middleware('auth');

Route::resource('inventario', 'App\Http\Controllers\InventarioController')->middleware('auth');    
Route::resource('ayudasvisuales','App\Http\Controllers\ayudasvisualesController')->middleware('auth');  
Route::resource('kaizen','App\Http\Controllers\kaizenController')->middleware('auth');
Route::resource('registrolectura','App\Http\Controllers\registrolecturaController')->middleware('auth');


Route::group(['middleware' => ['administrador']], function () {
Route::resource('register','App\Http\Controllers\usersController')->middleware('auth');
});
Route::resource('error2','App\Http\Controllers\error2Controller');
/* --------------------------------PDF-------------------------------------*/
Route::get ('prueba',[PDFController::class, 'index']);

Route::post('form_post', [PDFController::class, 'mostrar'])->name('contact.send');

Route::post('contact_post', [PDFController::class, 'mostrarfallo'])->name('form.desgaste');

/* --------------------------------Calendario-------------------------------------*/

//Route::get('Calendar/event',[calendarioController::class,'index']);

//Route::get('Calendar/event/{mes}',[calendarioController::class,'index_month']);
// formulario
Route::get('Evento/form',[eventController::class, 'form']);

Route::post('Evento/create',[eventController::class,'create']);
// Detalles de evento
Route::get('Evento/index/{id}',[calendarioController::class,'show'])->name('show.calendar');

Route::get('Evento/index/{month}',[eventController::class,'index_month']);
// Editar Evento
Route::put('Evento/{id}', [eventController::class, 'update'])->name('event.update');
// Documentos
Route::get('desgaste/{documento}',[analisisdesgasteController::class,'show']);

Route::get('kaizen/{documento}',[kaizenController::class,'show']);

Route::get('ayudas/{documento}',[ayudasvisualesController::class,'ver']);

Route::put('edit/{id}', [eventController::class, 'imagen'])->name('event.imagen');
//Route::put('posponer/{id}', [eventController::class, 'posponer'])->name('event.posponer');
//Route::put('terminado/{id}', [eventController::class, 'terminado'])->name('event.terminado');
Route::put('posponer/{id}', [eventController::class, 'pospuesto'])->name('event.pospuesto');
Route::put('terminado/{id}', [eventController::class, 'completado'])->name('event.completado');

Route::get('Calendar/example',[CalendarExtController::class,'consulta']);

Route::get('send-mail', [MailController::class, 'email']);

//Movimientos del inventario
Route::put('inventario/update', [InventarioController::class, 'update'])->name('inventario.actualizar');

Route::put('Uppassword/{id}', [usersController::class, 'Updpassword'])->name('user.update');



