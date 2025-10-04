{{-- resources/views/admin/members/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Miembros de la Iglesia')

@section('content')
<div class="container py-4" style="max-width: 900px;">
  <h1 class="mb-4">👥 Miembros</h1>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Formulario: añadir miembro --}}
  <div class="card mb-4">
    <div class="card-header">➕ Añadir miembro</div>
    <div class="card-body">
      <form action="{{ route('admin.members.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-4">
          <label class="form-label">Nombre</label>
          <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="col-md-4">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="col-md-4">
          <label class="form-label">Cumpleaños</label>
          <input type="date" name="birthday" class="form-control" value="{{ old('birthday') }}">
        </div>
        <div class="col-12">
          <button class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Listado --}}
  <div class="card">
    <div class="card-header">Listado</div>
    <div class="card-body p-0">
      <table class="table mb-0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Cumpleaños</th>
            <th class="text-end" style="width: 140px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse($members as $m)
            <tr>
              <td>{{ $m->name }}</td>
              <td>{{ $m->email }}</td>
              <td>{{ optional($m->birthday)->format('d/m/Y') ?: '—' }}</td>
              <td class="text-end">
                <form action="{{ route('admin.members.destroy', $m) }}" method="POST" onsubmit="return confirm('¿Eliminar este miembro?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center p-4">No hay miembros aún.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
