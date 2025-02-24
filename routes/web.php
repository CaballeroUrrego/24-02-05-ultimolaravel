<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Importar el controlador de productos
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas para la aplicación.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// CRUD de productos
Route::resource('products', ProductController::class);
