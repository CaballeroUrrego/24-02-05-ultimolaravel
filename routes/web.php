<?php

use Illuminate\Support\Facades\Route; // Importa la clase Route para definir rutas
use App\Http\Controllers\ProductController; // Importa el controlador de productos
use App\Http\Controllers\HomeController; // Importa el controlador de la página de inicio
use Illuminate\Support\Facades\Auth; // Importa las rutas de autenticación
use App\Http\Controllers\ProfileController; // Importa el controlador de perfil

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
    return view('auth.login'); // Retorna la vista de login
});

// 📌 Rutas de autenticación (login, registro, logout)
Auth::routes(); // Registra las rutas de autenticación proporcionadas por Laravel

// 📌 Ruta protegida: Solo usuarios autenticados pueden acceder a "/home"
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth'); // Ruta para la página de inicio, protegida por el middleware 'auth'

// 📌 Protección del CRUD de productos y perfil: Solo accesible si el usuario está autenticado
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class); // Rutas CRUD para productos, protegidas por el middleware 'auth'
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Ruta para editar el perfil
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Ruta para actualizar el perfil
});
