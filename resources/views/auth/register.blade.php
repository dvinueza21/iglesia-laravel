@extends('layouts.app')
@section('title','Registro')

@section('content')
<div class="container" style="max-width:460px; margin-top:60px;">
  <h2 class="mb-4 text-center">Crear cuenta</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="m-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nombre completo</label>
      <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
    </div>
    <div>
    <label for="birthday" class="block font-medium text-sm text-gray-700">Fecha de nacimiento</label>
    <input id="birthday" type="date" name="birthday" value="{{ old('birthday') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
</div>

    <div class="mb-3">
      <label class="form-label">Correo</label>
      <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Contraseña</label>
      <input type="password" name="password" class="form-control" required minlength="8">
    </div>
    <div class="mb-3">
      <label class="form-label">Repite la contraseña</label>
      <input type="password" name="password_confirmation" class="form-control" required minlength="8">
    </div>
    <button class="btn btn-success w-100" type="submit">Registrarme</button>
  </form>
</div>
@endsection
