<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('settings.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return redirect()->route('settings.index')->with('success', 'Paramètres mis à jour avec succès.');
    }
}
