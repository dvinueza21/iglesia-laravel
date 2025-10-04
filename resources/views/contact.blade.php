@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
  {{-- Hero --}}
  <div class="hero-wrap" style="background-image: url('{{ asset('assets/images/CONTACT.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax="properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}"></a></span>
            <span></span>
          </p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">CONTACTA CON NOSOTROS</h1>
        </div>
      </div>
    </div>
  </div>

  {{-- Contacto --}}
  <section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">

      <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 mb-4">
          <h2 class="h4">Contacto</h2>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3">
          <p><span>Dirección:</span> Pg. de Sant Antoni, 36-40, 08014 Barcelona, Barcelona, Spain</p>
        </div>
        <div class="col-md-3">
          <p><span>Teléfono:</span> <a href="tel:+34603422977">+34 603 42 29 77</a></p>
        </div>
        <div class="col-md-3">
          <p><span>Email:</span> <a href="mailto:rdcworship@gmail.com">rdcworship@gmail.com</a></p>
        </div>
        <div class="col-md-3">
          <p><span></span> <a href="https://iglesiaelreinodeloscielos.es/" target="_blank"></a></p>
        </div>
      </div>

      <div class="row block-9">
        {{-- Formulario --}}
        <div class="col-md-6 pr-md-5">
          <h4 class="mb-4">¿Necesitas más información?</h4>

          @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          {{-- Toast: Éxito --}}
@if (session('status'))
  <div class="toast border-0 shadow" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000"
       style="min-width: 280px;">
    <div class="toast-header bg-success text-white">
      <strong class="mr-auto">¡Hecho!</strong>
      <small class="text-white-50">ahora</small>
      <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      {{ session('status') }}
    </div>
  </div>
@endif



          <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <p><input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ old('nombre') }}" required></p>
            <p><input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required></p>
            <p><input type="text" name="telefono" class="form-control" placeholder="Teléfono" value="{{ old('telefono') }}"></p>
            <p><textarea name="mensaje" cols="30" rows="7" class="form-control" placeholder="Mensaje" required>{{ old('mensaje') }}</textarea></p>

            {{-- Honeypot anti-spam simple --}}
            <input type="text" name="website" style="display:none">

            <p><button type="submit" class="btn btn-primary py-3 px-5">ENVIAR</button></p>
          </form>
        </div>

        {{-- Mapa --}}
        <div class="col-md-6">
          <div class="embed-responsive embed-responsive-4by3">
            <iframe class="embed-responsive-item"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.848921384726!2d2.1359618749060587!3d41.37736699661847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4988693e55dcf%3A0x13eec51dd919c953!2sP.%C2%BA%20de%20San%20Antonio%2C%2036%2C%2040%2C%20Distrito%20de%20Sants-Montju%C3%AFc%2C%2008014%20Barcelona!5e0!3m2!1ses!2ses!4v1703986357659!5m2!1ses!2ses"
              width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection

