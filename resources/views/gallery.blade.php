@extends('layouts.app')

@section('title', 'Congreso SED')

@section('content')

  {{-- Portada --}}
  <div class="hero-wrap" style="background-image: url('{{ asset('assets/images/SED19.png') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax="properties: { translateY: '70%' }">
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">CONGRESO SED</h1>
        </div>
      </div>
    </div>
  </div>

  {{-- Galería --}}
  <section class="ftco-section ftco-gallery">
    <div class="container">

      <div class="d-md-flex">
        <a href="{{ asset('assets/images/SED23/SED1.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/SED1.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
        <a href="{{ asset('assets/images/SED23/SED2.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/SED2.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
        <a href="{{ asset('assets/images/SED23/SED4.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/SED4.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
        <a href="{{ asset('assets/images/SED23/SED5.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/SED5.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
      </div>

      <div class="d-md-flex">
        <a href="{{ asset('assets/images/SED23/SED6.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/SED6.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
        <a href="{{ asset('assets/images/SED23/SED8.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/SED8.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
        <a href="{{ asset('assets/images/SED23/N1.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/N1.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
        <a href="{{ asset('assets/images/SED23/N2.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/N2.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
      </div>

      <div class="d-md-flex">
        <a href="{{ asset('assets/images/SED23/N3.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/N3.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
        <a href="{{ asset('assets/images/SED23/N4.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/N4.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
        <a href="{{ asset('assets/images/SED23/N5.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/N5.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
        <a href="{{ asset('assets/images/SED23/N6.jpg') }}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate"
           style="background-image: url('{{ asset('assets/images/SED23/N6.jpg') }}');">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="icon-search"></span>
          </div>
        </a>
      </div>

    </div>
  </section>

@endsection

@push('scripts')
<script>
  (function($){
    $(document).ready(function(){

      // Lightbox para la galería
      $('.ftco-gallery').magnificPopup({
        delegate: 'a.image-popup',   // selecciona las imágenes dentro
        type: 'image',
        gallery: {
          enabled: true,
          preload: [0,2],            // precarga anterior/siguiente
          navigateByImgClick: true
        },
        removalDelay: 300,           // suaviza la animación de salida
        mainClass: 'mfp-fade',       // clase para transición fade
        zoom: {
          enabled: true,
          duration: 300
        }
      });

    });
  })(jQuery);
</script>
@endpush
