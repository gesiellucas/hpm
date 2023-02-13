<?php

use App\Http\Controllers\ImportCsvController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home');
});

Route::get('/pesquisa', function(){
    return Inertia::render('Search');
});

Route::get('/csv', function(){
    return Inertia::render('Csv');
});

Route::get('/cadastro', [PatientController::class, 'createPatient']);
Route::post('/create-patient', [PatientController::class, 'create']);

Route::get('/users', [PatientController::class, 'list']);

Route::get('/editar/{id}', [PatientController::class, 'updatePatient']);
Route::post('/update-patient', [PatientController::class, 'update']);

Route::get('/delete/{id}', [PatientController::class, 'delete']);

Route::post('/insertcsv', [ImportCsvController::class, 'importCsv']);

require __DIR__.'/auth.php';
