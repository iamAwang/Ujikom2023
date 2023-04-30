<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostumeController;
use App\Http\Controllers\RentController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/costume',[CostumeController::class, 'index'])->name('indexCostume');
Route::get('/create-costume',[CostumeController::class, 'create'])->name('createCostume');
Route::post('/store-costume',[CostumeController::class, 'store'])->name('storeCostume');
Route::get('/edit-costume/{id}',[CostumeController::class, 'edit'])->name('editCostume');
Route::post('/update-costume/{id}',[CostumeController::class, 'update'])->name('updateCostume');
Route::post('/delete-costume/{id}',[CostumeController::class, 'delete'])->name('deleteCostume');

Route::get('/rent',[RentController::class, 'index'])->name('indexRent');
Route::get('/create-rent',[RentController::class, 'create'])->name('createRent');
Route::post('/store-rent',[RentController::class, 'store'])->name('storeRent');
Route::get('/edit-rent/{id}',[RentController::class, 'edit'])->name('editRent');
Route::post('/update-rent/{id}',[RentController::class, 'update'])->name('updateRent');
Route::post('/delete-rent/{id}',[RentController::class, 'delete'])->name('deleteRent');

Route::get('/rent/export_excel', [RentController::class,'export_excel'])->name('downloadExcel');
Route::get('/rent/cetak_pdf', [RentController::class,'export_pdf'])->name('exportPdf');
