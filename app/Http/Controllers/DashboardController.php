<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Member;  // 👈 Importamos el modelo Member

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 👇 Por defecto no cargamos miembros
        $members = collect();

        // 👑 Si el usuario es admin, obtenemos la lista completa
        if ($user && method_exists($user, 'hasRole') && $user->hasRole('admin')) {
            $members = Member::orderBy('name')->get();
        }

        // 👌 Pasamos los datos a la vista
        return view('dashboard', compact('user', 'members'));
    }
}

