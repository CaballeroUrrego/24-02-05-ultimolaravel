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
| Aquí puedes registrar las rutas principales de la aplicación.
|
*/

// 📌 Ruta principal que redirige al formulario de inicio de sesión
Route::get('/', function () {
    return view('auth.login'); // Muestra la vista de login
});

// 📌 Rutas de autenticación generadas por Laravel (login, register, logout, etc.)
Auth::routes();

// 📌 Ruta del dashboard después de iniciar sesión
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 📌 CRUD de productos (Crea, Lee, Actualiza y Elimina productos)
Route::resource('products', ProductController::class);

