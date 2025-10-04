<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Muestra la lista de miembros
     */
    public function index()
    {
        $members = Member::orderBy('name')->get();

        return view('admin.members.index', compact('members'));
    }

    /**
     * Guarda un nuevo miembro en la base de datos
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'max:150', 'unique:members,email'],
            'birthday' => ['nullable', 'date'],
        ]);

        Member::create($data);

        return back()->with('success', '✅ Miembro añadido correctamente.');
    }

    /**
     * Elimina un miembro existente
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return back()->with('success', '🗑️ Miembro eliminado correctamente.');
    }
}
