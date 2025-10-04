@extends('layouts.app')
@section('title','Entrar')

@section('content')
<div class="container" style="max-width:460px; margin-top:60px;">
  <h2 class="mb-4 text-center">Iniciar sesión</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="m-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Correo</label>
      <input type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Contraseña</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3 form-check">
      <input class="form-check-input" type="checkbox" name="remember" id="remember">
      <label class="form-check-label" for="remember">Recuérdame</label>
    </div>
    <button class="btn btn-primary w-100" type="submit">Entrar</button>

    @if (Route::has('password.request'))
      <p class="mt-3 text-center">
        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
      </p>
    @endif
  </form>
</div>
@endsection
