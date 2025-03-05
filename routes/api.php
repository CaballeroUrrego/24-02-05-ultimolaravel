<?php
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




// Ruta para obtener el usuario autenticado utilizando Sanctum para la autenticación
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas API para productos utilizando un controlador de recursos
Route::apiResource('products', ProductController::class);
