@extends('layouts.app')

@section('title', 'Mi perfil')

@section('content')
<div class="container py-4" style="max-width: 760px;">
  {{-- Título --}}
  <h1 class="h4 mb-3">👤 Mi perfil</h1>

  {{-- Éxito --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- Errores --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Revisa los campos marcados.</strong>
    </div>
  @endif

  <div class="card shadow-sm">
    <div class="card-header">Datos de la cuenta</div>
    <div class="card-body">
      <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        {{-- Nombre --}}
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $user->name) }}"
            maxlength="100"
            required
          >
          @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Email (solo lectura para evitar conflictos de verificación) --}}
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            value="{{ $user->email }}"
            disabled
          >
          <div class="form-text">Si necesitas cambiar el email lo hacemos en administración.</div>
        </div>


        {{-- Acciones --}}
        <div class="d-grid gap-2 d-sm-flex justify-content-end mt-4">
          <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Volver</a>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
