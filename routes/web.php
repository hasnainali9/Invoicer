<?php

use Illuminate\Support\Facades\Route;
use App\Models\Invoice;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/app/profile/update',  [App\Http\Controllers\HomeController::class, 'editProfile'])->name('updateProfile.show');
Route::post('/app/users/update', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile.store');

Route::get('/app/users',  [App\Http\Controllers\UsersController::class, 'index'])->name('users.show');
Route::post('/app/users/add',  [App\Http\Controllers\UsersController::class, 'store'])->name('users.create');
Route::post('/app/users/update',  [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::get('/app/users/{id}/delete',  [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');

Route::get('/app/user/roles',  [App\Http\Controllers\RoleController::class, 'index'])->name('roles.show');
Route::post('/app/user/roles/create',  [App\Http\Controllers\RoleController::class, 'store'])->name('roles.create');
Route::post('/app/user/roles/ajax/get',  [App\Http\Controllers\RoleController::class, 'getAjax'])->name('roles.getAjax');
Route::post('/app/user/roles/update',  [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
Route::get('/app/user/roles/{id}/delete',  [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');








Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/app/airports', [App\Http\Controllers\AirportController::class, 'index'])->name('airports.home');
Route::post('/app/airports/store', [App\Http\Controllers\AirportController::class, 'store'])->name('airports.store');
Route::post('/app/airports/storeAjax', [App\Http\Controllers\AirportController::class, 'storeAjax'])->name('airports.store.ajax');
Route::post('/app/airports/update', [App\Http\Controllers\AirportController::class, 'update'])->name('airports.update');
Route::get('/app/airports/status/{id}/{status}', [App\Http\Controllers\AirportController::class, 'statusUpdate'])->name('airports.status.update');
Route::get('/app/airports/destroy/{id}', [App\Http\Controllers\AirportController::class, 'destroy'])->name('airports.destroy');


Route::get('/app/airlines', [App\Http\Controllers\AirlineController::class, 'index'])->name('airlines.home');
Route::post('/app/airlines/store', [App\Http\Controllers\AirlineController::class, 'store'])->name('airlines.store');
Route::post('/app/airlines/storeAjax', [App\Http\Controllers\AirlineController::class, 'storeAjax'])->name('airlines.store.ajax');
Route::post('/app/airlines/update', [App\Http\Controllers\AirlineController::class, 'update'])->name('airlines.update');
Route::get('/app/airlines/status/{id}/{status}', [App\Http\Controllers\AirlineController::class, 'statusUpdate'])->name('airlines.status.update');
Route::get('/app/airlines/destroy/{id}', [App\Http\Controllers\AirlineController::class, 'destroy'])->name('airlines.destroy');


Route::get('/app/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies.home');
Route::post('/app/companies/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('companies.store');
Route::post('/app/companies/storeAjax', [App\Http\Controllers\CompanyController::class, 'storeAjax'])->name('companies.store.ajax');
Route::post('/app/companies/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('companies.update');
Route::get('/app/companies/status/{id}/{status}', [App\Http\Controllers\CompanyController::class, 'statusUpdate'])->name('companies.status.update');
Route::get('/app/companies/destroy/{id}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('companies.destroy');




Route::get('/app/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client.home');
Route::post('/app/client/store', [App\Http\Controllers\ClientController::class, 'store'])->name('client.store');
Route::post('/app/client/storeAjax', [App\Http\Controllers\ClientController::class, 'storeAjax'])->name('client.store.ajax');
Route::post('/app/client/update', [App\Http\Controllers\ClientController::class, 'update'])->name('client.update');
Route::get('/app/client/destroy/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('client.destroy');






Route::get('/app/invoices', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoices.home');

Route::get('/app/invoices/{id}/download', [App\Http\Controllers\InvoiceController::class, 'downloadInvoice'])->name('invoices.view.download');

Route::get('/app/invoices/{id}/view', [App\Http\Controllers\InvoiceController::class, 'ViewSingle'])->name('invoices.view.single');
Route::get('/app/invoices/{id}/view/versions', [App\Http\Controllers\InvoiceController::class, 'VersionsShowAll'])->name('invoices.view.single.versions');
Route::get('/app/invoices/view/versions/{id}', [App\Http\Controllers\InvoiceController::class, 'VersionsShow'])->name('invoices.view.single.versions.show');
Route::get('/app/invoices/versions/{id}/roll/back', [App\Http\Controllers\InvoiceController::class, 'VersionsRollBack'])->name('invoices.view.single.versions.roll.back');
Route::get('/app/invoices/versions/{id}/destroy', [App\Http\Controllers\InvoiceController::class, 'VersionDestroy'])->name('invoices.view.single.versions.destroy');


Route::get('/app/invoices/new', [App\Http\Controllers\InvoiceController::class, 'addIndex'])->name('invoices.add');
Route::post('/app/invoices/store', [App\Http\Controllers\InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/app/invoices/{id}/update/view', [App\Http\Controllers\InvoiceController::class, 'updateIndex'])->name('invoices.update.show');

Route::get('/app/invoices/{id}/duplicate/create', [App\Http\Controllers\InvoiceController::class, 'DuplicateInvoice'])->name('invoices.duplicate.add.show');



Route::post('/app/invoices/update', [App\Http\Controllers\InvoiceController::class, 'update'])->name('invoices.update');
Route::get('/app/invoices/destroy/{id}', [App\Http\Controllers\InvoiceController::class, 'destroy'])->name('invoices.destroy');
