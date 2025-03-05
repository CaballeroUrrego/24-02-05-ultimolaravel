<!-- filepath: /c:/xampp/htdocs/24-02-05-ultimolaravel/resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Encabezado de la tarjeta con el título "Dashboard" -->
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <!-- Mensaje de éxito si la sesión contiene el estado -->
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Mensaje indicando que el usuario ha iniciado sesión -->
                    {{ __('¡Ya has iniciado sesión!') }}

                    <div class="mt-4">
                        <!-- Mensaje de bienvenida con el nombre del usuario -->
                        <h4>Bienvenido, {{ Auth::user()->name }}!</h4>
                        <p>Esta es tu página de inicio. Desde aquí puedes acceder a diferentes secciones de la aplicación.</p>
                        <!-- Enlace para editar el perfil del usuario -->
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
                    </div>

                    <div class="mt-4">
                        <!-- Sección de detalles del perfil del usuario -->
                        <h5>Detalles del Perfil:</h5>
                        <p><strong>Nombre:</strong> {{ Auth::user()->profile->nombre }}</p>
                        <p><strong>Apellido:</strong> {{ Auth::user()->profile->apellido }}</p>
                        <p><strong>Teléfono:</strong> {{ Auth::user()->profile->telefono }}</p>
                        <p><strong>Dirección:</strong> {{ Auth::user()->profile->direccion }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
