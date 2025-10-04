@extends('layouts.app')

@section('title', 'Obra Social')

@section('content')

  {{-- Hero --}}
  <div class="hero-wrap" style="background-image: url('{{ asset('assets/images/SALVA_BG.png') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax="properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <span class="mr-2"><a href="{{ route('home') }}"></a></span>
            <span></span>
          </p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"></h1>
        </div>
      </div>
    </div>
  </div>

  {{-- Listado de causas --}}
  <section class="ftco-section">
    <div class="container">
      <div class="row">

        {{-- EPI's --}}
        <div class="col-md-4 ftco-animate">
          <div class="cause-entry">
            <a href="#" class="img" style="background-image: url('{{ asset('assets/images/PANDEMIA__2.jpg') }}');"></a>
            <div class="text p-3 p-md-4">
              <h3><a href="#">EPI'S</a></h3>
              <p>Gracias a tu generosidad, pudimos apoyar a profesionales de la salud, trabajos esenciales y familias
                en situación de vulnerabilidad con protección y provisión frente a la pandemia. ¡Gracias por ayudarnos
                a llevar vida!</p>

              <span class="donation-time mb-3 d-block"></span>
              <div class="progress custom-progress-success">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 28%;"
                     aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <span class="fund-raised d-block"></span>
            </div>
          </div>
        </div>

        {{-- S.O.S Ucrania --}}
        <div class="col-md-4 ftco-animate">
          <div class="cause-entry">
            <a href="#" class="img" style="background-image: url('{{ asset('assets/images/UKRANIA.jpg') }}');"></a>
            <div class="text p-3 p-md-4">
              <h3><a href="#">S.O.S UCRANIA</a></h3>
              <p>¡Los primeros víveres y donativos empiezan a llegar, muchas gracias!</p>

              <span class="donation-time mb-3 d-block"></span>
              <div class="progress custom-progress-success">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 28%;"
                     aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <span class="fund-raised d-block"></span>
            </div>
          </div>
        </div>

        {{-- Ayuda Social --}}
        <div class="col-md-4 ftco-animate">
          <div class="cause-entry">
            <a href="#" class="img" style="background-image: url('{{ asset('assets/images/VIVERES.jpg') }}');"></a>
            <div class="text p-3 p-md-4">
              <h3><a href="#">AYUDA SOCIAL</a></h3>
              <p>Desde el departamento de ayuda social y la Asociación Salva la Vida, se repartirán lotes de comida a las
                 familias que más lo necesitan tras el servicio dominical.</p>

              <span class="donation-time mb-3 d-block"></span>
              <div class="progress custom-progress-success">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 28%;"
                     aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <span class="fund-raised d-block"></span>
            </div>
          </div>
        </div>

        {{-- Impresoras 3D --}}
        <div class="col-md-4 ftco-animate">
          <div class="cause-entry">
            <a href="#" class="img" style="background-image: url('{{ asset('assets/images/PANDEMIA.jpg') }}');"></a>
            <div class="text p-3 p-md-4">
              <h3><a href="#">IMPRESORAS 3D</a></h3>
              <p>Seguimos suministrando material contra el coronavirus a todos los profesionales expuestos en sus puestos de trabajo.</p>

              <span class="donation-time mb-3 d-block"></span>
              <div class="progress custom-progress-success">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 28%;"
                     aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <span class="fund-raised d-block"></span>
            </div>
          </div>
        </div>

      </div>

      {{-- Paginación (si la necesitas más adelante) --}}
      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul></ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
