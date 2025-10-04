@extends('layouts.app')

@section('title', 'Sobre Nosotros')

@section('content')
  <div class="hero-wrap"
       style="background-image: url('{{ asset('assets/images/bcn.jpg') }}'); min-height: 60vh; background-size: cover; background-position: center;"
       data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax="properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}"></a></span>
            <span>VISIÓN</span>
          </p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">VISIÓN</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-6 d-flex ftco-animate">
          <div class="img img-about align-self-stretch"
               style="background-image: url('{{ asset('assets/images/pastores2.jpg') }}'); width: 100%; min-height: 380px; background-size: cover; background-position: center;"></div>
        </div>
        <div class="col-md-6 pl-md-5 ftco-animate">
          <h2 class="mb-4">BIENVENIDO A LA IGLESIA EL REINO DE LOS CIELOS EN BARCELONA</h2>
          <p><i>
            Somos un nuevo modelo de iglesia basada en el ejemplo de Jesús.<br><br>
            Una iglesia fundada con la llegada de la primavera el 21 de marzo de 2011.<br><br>
            Comenzamos nuestro servicio a la ciudad de Barcelona en el barrio de Sants pastoreada por Enoc y Miriam Bassols.<br><br>
            Actualmente puedes sumarte a nuestros servicios los domingos desde las 11:30 en el Hotel AC Sants.
          </i></p>
        </div>
      </div>
    </div>
  </section>
@endsection
