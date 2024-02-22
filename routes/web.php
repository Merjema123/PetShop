<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\GrowerController;
/*
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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/pets', function () {
    return view('pets.index');
})->name('pets');
Route::middleware(['auth:sanctum', 'verified'])->get('/breeds', function () {
    return view('breeds.index');
})->name('breeds');
Route::middleware(['auth:sanctum', 'verified'])->get('/customers', function () {
    return view('customers.index');
})->name('customers');
Route::middleware(['auth:sanctum', 'verified'])->get('/shops', function () {
    return view('shops.index');
})->name('shops');
Route::middleware(['auth:sanctum', 'verified'])->get('/categories', function () {
    return view('categories.index');
})->name('categories');
Route::middleware(['auth:sanctum', 'verified'])->get('/workers', function () {
    return view('workers.index');
})->name('workers');

Route::middleware(['auth:sanctum', 'verified'])->get('pets', [PetController::class, 'index'])->name('pets');
Route::middleware(['auth:sanctum', 'verified'])->get('add_pet', [PetController::class, 'create'])->name('add_pet');
Route::middleware(['auth:sanctum', 'verified'])->post('store_pet', [PetController::class, 'store'])->name('store_pet');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_pet', [PetController::class, 'delete'])->name('delete_pet');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_pet', [PetController::class, 'edit'])->name('edit_pet');
Route::middleware(['auth:sanctum', 'verified'])->post('update_pet', [PetController::class, 'update'])->name('update_pet');
Route::middleware(['auth:sanctum', 'verified'])->post('file_add', [PetController::class, 'file_add'])->name('file_add');
Route::middleware(['auth:sanctum', 'verified'])->post('process', [PetController::class, 'process'])->name('process');


Route::middleware(['auth:sanctum', 'verified'])->get('breeds', [BreedController::class, 'index'])->name('breeds');
Route::middleware(['auth:sanctum', 'verified'])->get('add_breed', [BreedController::class, 'create'])->name('add_breed');
Route::middleware(['auth:sanctum', 'verified'])->post('store_breed', [BreedController::class, 'store'])->name('store_breed');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_breed', [BreedController::class, 'delete'])->name('delete_breed');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_breed', [BreedController::class, 'edit'])->name('edit_breed');
Route::middleware(['auth:sanctum', 'verified'])->post('update_breed', [BreedController::class, 'update'])->name('update_breed');
Route::middleware(['auth:sanctum', 'verified'])->post('file_add', [BreedController::class, 'file_add'])->name('file_add');
Route::middleware(['auth:sanctum', 'verified'])->post('process', [BreedController::class, 'process'])->name('process');


Route::middleware(['auth:sanctum', 'verified'])->get('customers', [CustomerController::class, 'index'])->name('customers');
Route::middleware(['auth:sanctum', 'verified'])->get('add_customer', [CustomerController::class, 'create'])->name('add_customer');
Route::middleware(['auth:sanctum', 'verified'])->post('store_customer', [CustomerController::class, 'store'])->name('store_customer');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_customer', [CustomerController::class, 'delete'])->name('delete_customer');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_customer', [CustomerController::class, 'edit'])->name('edit_customer');
Route::middleware(['auth:sanctum', 'verified'])->post('update_customer', [CustomerController::class, 'update'])->name('update_customer');
Route::middleware(['auth:sanctum', 'verified'])->post('file_add', [CustomerController::class, 'file_add'])->name('file_add');
Route::middleware(['auth:sanctum', 'verified'])->post('process', [CustomerController::class, 'process'])->name('process');



Route::middleware(['auth:sanctum', 'verified'])->get('shops', [ShopController::class, 'index'])->name('shops');




Route::middleware(['auth:sanctum', 'verified'])->get('categories', [CategoryController::class, 'index'])->name('categories');
Route::middleware(['auth:sanctum', 'verified'])->get('add_category', [CategoryController::class, 'create'])->name('add_category');
Route::middleware(['auth:sanctum', 'verified'])->post('store_category', [CategoryController::class, 'store'])->name('store_category');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_category', [CategoryController::class, 'delete'])->name('delete_category');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_category', [CategoryController::class, 'edit'])->name('edit_category');
Route::middleware(['auth:sanctum', 'verified'])->post('update_category', [CategoryController::class, 'update'])->name('update_category');

Route::middleware(['auth:sanctum', 'verified'])->get('grower', [GrowerController::class, 'index'])->name('grower');


Route::middleware(['auth:sanctum', 'verified'])->get('workers', [WorkerController::class, 'index'])->name('workers');
Route::middleware(['auth:sanctum', 'verified'])->get('add_worker', [WorkerController::class, 'create'])->name('add_worker');
Route::middleware(['auth:sanctum', 'verified'])->post('store_worker', [WorkerController::class, 'store'])->name('store_worker');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_worker', [WorkerController::class, 'delete'])->name('delete_worker');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_worker', [WorkerController::class, 'edit'])->name('edit_worker');
Route::middleware(['auth:sanctum', 'verified'])->post('update_worker', [WorkerController::class, 'update'])->name('update_worker');
Route::middleware(['auth:sanctum', 'verified'])->post('file_add', [WorkerController::class, 'file_add'])->name('file_add');
Route::middleware(['auth:sanctum', 'verified'])->post('process', [WorkerController::class, 'process'])->name('process');