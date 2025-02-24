<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí registramos las rutas de la aplicación.
|
*/

// 📌 Página de inicio: Redirige a la vista de login
Route::get('/', function () {
    return view('auth.login'); 
});

// 📌 Rutas de autenticación (login, registro, logout)
Auth::routes();

// 📌 Ruta protegida: Solo usuarios autenticados pueden acceder a "/home"
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// 📌 Protección del CRUD de productos: Solo accesible si el usuario está autenticado
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});