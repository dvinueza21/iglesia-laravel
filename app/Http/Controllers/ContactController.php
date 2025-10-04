<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'   => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:150'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'mensaje'  => ['required', 'string', 'max:5000'],
        ]);

        ContactMessage::create($data);

        return back()->with('status', '¡Gracias! Hemos recibido tu mensaje.');
    }
}
