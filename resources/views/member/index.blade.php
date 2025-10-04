@extends('layouts.app')

@section('title', 'Miembros de la Iglesia')

@section('content')
<div class="container py-4" style="max-width:1000px">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">👥 Miembros de la Iglesia</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">← Volver al panel</a>
    </div>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario para añadir miembros --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-dark text-white">➕ Añadir nuevo miembro</div>
        <div class="card-body">
            <form action="{{ route('admin.members.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Nombre completo" required>
                </div>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                </div>
                <div class="col-md-3">
                    <input type="date" name="birthday" class="form-control" placeholder="Fecha de nacimiento">
                </div>
                <div class="col-md-1 d-grid">
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabla de miembros --}}
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">📋 Lista de miembros</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Cumpleaños</th>
                            <th style="width: 120px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>
                                    @if($member->birthday)
                                        {{ \Carbon\Carbon::parse($member->birthday)->format('d/m/Y') }}
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.members.destroy', $member) }}" method="POST" onsubmit="return confirm('¿Eliminar este miembro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">No hay miembros registrados todavía.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
