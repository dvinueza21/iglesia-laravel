<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:100'],
            'birthday' => ['nullable','date','before:tomorrow'],
        ]);

        $request->user()->update($data);

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
