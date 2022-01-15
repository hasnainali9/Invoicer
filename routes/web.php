<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/app/airports', [App\Http\Controllers\AirportController::class, 'index'])->name('airports.home');
Route::post('/app/airports/store', [App\Http\Controllers\AirportController::class, 'store'])->name('airports.store');
Route::post('/app/airports/update', [App\Http\Controllers\AirportController::class, 'update'])->name('airports.update');
Route::get('/app/airports/status/{id}/{status}', [App\Http\Controllers\AirportController::class, 'statusUpdate'])->name('airports.status.update');
Route::get('/app/airports/destroy/{id}', [App\Http\Controllers\AirportController::class, 'destroy'])->name('airports.destroy');


Route::get('/app/airlines', [App\Http\Controllers\AirlineController::class, 'index'])->name('airlines.home');
Route::post('/app/airlines/store', [App\Http\Controllers\AirlineController::class, 'store'])->name('airlines.store');
Route::post('/app/airlines/update', [App\Http\Controllers\AirlineController::class, 'update'])->name('airlines.update');
Route::get('/app/airlines/status/{id}/{status}', [App\Http\Controllers\AirlineController::class, 'statusUpdate'])->name('airlines.status.update');
Route::get('/app/airlines/destroy/{id}', [App\Http\Controllers\AirlineController::class, 'destroy'])->name('airlines.destroy');


Route::get('/app/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies.home');
Route::post('/app/companies/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('companies.store');
Route::post('/app/companies/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('companies.update');
Route::get('/app/companies/status/{id}/{status}', [App\Http\Controllers\CompanyController::class, 'statusUpdate'])->name('companies.status.update');
Route::get('/app/companies/destroy/{id}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('companies.destroy');




Route::get('/app/invoices', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoices.home');
Route::get('/app/invoices/new', [App\Http\Controllers\InvoiceController::class, 'addIndex'])->name('invoices.add');
Route::post('/app/invoices/store', [App\Http\Controllers\InvoiceController::class, 'store'])->name('invoices.store');
Route::post('/app/invoices/update', [App\Http\Controllers\InvoiceController::class, 'update'])->name('invoices.update');
Route::get('/app/invoices/status/{id}/{status}', [App\Http\Controllers\InvoiceController::class, 'statusUpdate'])->name('invoices.status.update');
Route::get('/app/invoices/destroy/{id}', [App\Http\Controllers\InvoiceController::class, 'destroy'])->name('invoices.destroy');
