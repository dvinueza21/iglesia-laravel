{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Panel de Control')

@section('content')
<div class="container py-4" style="max-width:1200px">

  {{-- Saludo --}}
  <div class="mb-4">
    <h1 class="h3 mb-1">👋 Bienvenido, {{ auth()->user()->name ?? auth()->user()->email }}</h1>
    <p class="text-muted mb-0"></p>
  </div>

  {{-- Fila 1: Perfil + Acciones rápidas --}}
  <div class="row g-3">
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-header">📌 Tu Perfil</div>
        <div class="card-body">
          <p class="mb-1"><strong>Nombre:</strong> {{ auth()->user()->name ?? '—' }}</p>
          <p class="mb-1"><strong>Email:</strong> {{ auth()->user()->email }}</p>
          <p class="mb-3">
            <strong>Roles:</strong>
            @if(method_exists(auth()->user(), 'getRoleNames') && auth()->user()->getRoleNames()->count())
              {{ auth()->user()->getRoleNames()->join(', ') }}
            @else
              —
            @endif
          </p>

          <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">✏️ Editar perfil</a>
        </div>
      </div>
    </div>

   {{-- Columna derecha: Panel de miembros para ADMIN --}}
@if(method_exists(auth()->user(), 'hasRole') && auth()->user()->hasRole('admin'))
  <div class="col-md-6">
    <div class="card shadow-sm h-100">
      <div class="card-header bg-dark text-white">👥 Miembros de la iglesia</div>
      <div class="card-body">

        {{-- Mensaje --}}
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Formulario de alta rápida --}}
        <form action="{{ route('admin.members.store') }}" method="POST" class="row g-2 mb-3">
          @csrf
          <div class="col-md-5">
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" required maxlength="100">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="col-md-5">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="col-md-4">
            <input type="date" name="birthday" value="{{ old('birthday') }}" class="form-control @error('birthday') is-invalid @enderror" placeholder="Cumpleaños (opcional)">
            @error('birthday') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="col-md-3 d-grid">
            <button type="submit" class="btn btn-primary">➕ Añadir</button>
          </div>
          <div class="col-md-5 d-flex align-items-center">
            <small class="text-muted">Completa los campos y pulsa “Añadir”.</small>
          </div>
        </form>

        {{-- Listado --}}
        @if($members->isEmpty())
          <div class="alert alert-info mb-0">Aún no hay miembros registrados.</div>
        @else
          <div class="table-responsive">
            <table class="table table-sm align-middle">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Cumpleaños</th>
                  <th class="text-end">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($members as $m)
                  <tr>
                    <td>{{ $m->name }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->birthday?->format('d/m/Y') ?? '—' }}</td>
                    <td class="text-end">
                      <form action="{{ route('admin.members.destroy', $m) }}" method="POST" onsubmit="return confirm('¿Eliminar a {{ $m->name }}?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif

        {{-- (Opcional) Enlace a pantalla completa de miembros --}}
        <div class="mt-2">
<a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary">
  Abrir en página completa
</a>

        </div>
      </div>
    </div>
  </div>
@endif


  {{-- Fila 2: Documentos y Administración --}}
  <div class="row g-3 mt-3">

    {{-- 📄 Acceso a documentos --}}
    <div class="col-md-6">
      <div class="card shadow-sm h-100 border-0">
        <div class="card-header bg-secondary text-white">📂 Documentos</div>
        <div class="card-body">
          <p class="text-muted">Acceso a los documentos compartidos.</p>
          <div class="d-grid gap-2">
            @php($u = auth()->user())

            @if($u->can('documents.manage'))
              {{-- Solo para admin@iglesia.com u otros con permiso de gestión --}}
              <a href="{{ route('admin.documents.index') }}" class="btn btn-outline-primary text-start">
                ⬆️ Subir / gestionar documentos
              </a>

            @elseif($u->can('documents.view'))
              {{-- Para usuarios con permiso de solo descarga --}}
              <a href="{{ route('documents.index') }}" class="btn btn-outline-secondary text-start">
                📄 Ver y descargar documentos
              </a>

            @else
              <p class="text-muted small mb-0">No tienes permisos para acceder a los documentos.</p>
            @endif
          </div>
        </div>
      </div>
    </div>

    {{-- 🛠️ Zona de administración --}}
    @role('admin')
    <div class="col-md-6">
      <div class="card shadow-sm h-100 border-0">
        <div class="card-header bg-dark text-white">🛠️ Administración</div>
        <div class="card-body">
          <p class="text-muted">Herramientas exclusivas para administradores.</p>
          <div class="d-grid gap-2">
            @if(Route::has('admin.users.index'))
              <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary text-start">
                👥 Gestionar usuarios
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endrole

  </div>

</div>
@endsection
