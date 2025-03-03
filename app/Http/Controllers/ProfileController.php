<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Auth::user()->profile;

        if (!$profile) {
            // Crear un perfil vacío si no existe
            $profile = Profile::create([
                'user_id' => Auth::id(),
                'nombre' => '',
                'apellido' => '',
                'telefono' => '',
                'direccion' => '',
            ]);
        }

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:500',
        ]);

        $profile = Auth::user()->profile;
        $profile->update($request->all());

        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado exitosamente.');
    }
}
