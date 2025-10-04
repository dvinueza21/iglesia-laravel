@extends('layouts.app')

@section('title', 'Donativos')

@section('content')

<div class="hero-wrap position-relative group">
  <div class="overlay"></div>

  {{-- Video de fondo --}}
  <video id="donateVideo" autoplay muted loop playsinline 
    class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover" style="z-index:-1;">
    <source src="{{ asset('assets/images/OFRENDAS.mp4') }}" type="video/mp4">
    Tu navegador no soporta la reproducción de video.
  </video>

  {{-- Botón oculto que aparece al pasar el ratón --}}
  <button id="toggleVideo" 
          class="btn btn-light btn-sm position-absolute" 
          style="top:20px; right:20px; z-index:10; opacity:0; transition: opacity 0.3s;">
    ⏸ Pausar
  </button>

  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-10 ftco-animate text-center text-white">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"></h1>
        <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
          
        </p>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h2 class="mb-4">Apoya Nuestra Obra</h2>
        <p>Con tu ayuda, seguimos expandiendo la obra social y espiritual de nuestra iglesia.</p>
      </div>
    </div>
</section>

{{-- Script para controlar el video --}}
@push('scripts')
<script>
  const video = document.getElementById('donateVideo');
  const toggleBtn = document.getElementById('toggleVideo');
  const hero = document.querySelector('.hero-wrap');

  // Mostrar botón solo al pasar el ratón
  hero.addEventListener('mouseenter', () => toggleBtn.style.opacity = 1);
  hero.addEventListener('mouseleave', () => toggleBtn.style.opacity = 0);

  // Pausar/Reanudar video
  toggleBtn.addEventListener('click', () => {
    if (video.paused) {
      video.play();
      toggleBtn.textContent = '⏸ Pausar';
    } else {
      video.pause();
      toggleBtn.textContent = '▶️ Reanudar';
    }
  });
</script>
@endpush

@endsection
