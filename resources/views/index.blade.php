@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
  {{-- Podcast embebido --}}
<iframe src="https://embed.acast.com/63f25ac7edc2dc0011dfb10b" frameBorder="0" width="100%" height="190px"></iframe>

  {{-- Hero --}}
  <div class="hero-wrap"
       style="background-image: url('{{ asset('assets/images/BARCELONA.png') }}');"
       data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"></h1>
          <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"></p>

          {{-- Botón ver video (ajusta la ruta real del mp4) --}}
          <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <a href="{{ asset('assets/images/ENOC_CAMPA.mp4') }}"
               class="btn btn-white btn-outline-white px-4 py-3"
               target="_blank" rel="noopener noreferrer">
              <span class="icon-play mr-2"></span> Ver video
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <br>

  {{-- Audio (no autoplay) 
  <audio id="musica1" controls>
    <source src="{{ asset('assets/audio/tema.mp3') }}" type="audio/mpeg">
  </audio>--}}

  {{-- CTA cards --}}
<section class="ftco-section">
  <div class="container">
    <div class="row">
      
      {{-- Donativos --}}
      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 d-flex services p-4 py-5 d-block text-center shadow-sm rounded">
          <div class="icon d-flex mb-3 justify-content-center"><span class=""></span></div>
          <div class="media-body">
            <h3 class="heading"><strong>Hacer un Donativo</strong></h3>
            <p>  
              El que es generoso prospera; el que reanima será reanimado. (Proverbios 11:24-25)</p>
            <a href="{{ route('donate') }}" class="btn btn-primary btn-sm mt-3">Donar ahora</a>
          </div>
        </div>
      </div>

@php
  $boletinFile = public_path('assets/docs/BOLETIN.pdf');
  $boletinUrl  = asset('assets/docs/BOLETIN.pdf');
@endphp

{{-- Boletín semanal --}}
<div class="col-md-4 d-flex align-self-stretch ftco-animate">
  <div class="media block-6 d-flex services p-4 py-5 d-block text-center shadow-sm rounded">
    <div class="icon d-flex mb-3 justify-content-center"><span class=""></span></div>
    <div class="media-body">
      <h3 class="heading"><strong>Boletín Semanal</strong></h3>
      <p>Descarga nuestro boletín y no te pierdas ninguna de nuestras actividades como Iglesia.</p>

      @if (file_exists($boletinFile))
        <a href="{{ $boletinUrl }}" target="_blank" rel="noopener" download
           class="btn btn-secondary btn-sm mt-3">
          Descargar
        </a>
      @else
        <a href="{{ route('documents.index') }}" class="btn btn-outline-secondary btn-sm mt-3">
          Ver documentos
        </a>
        <div class="small text-muted mt-2">BOLETIN.pdf no encontrado en /public/assets/docs</div>
      @endif
    </div>
  </div>
</div>


      {{-- Prédicas en audio --}}
      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 d-flex services p-4 py-5 d-block text-center shadow-sm rounded">
          <div class="icon d-flex mb-3 justify-content-center"><span class=""></span></div>
          <div class="media-body">
            <h3 class="heading"><strong>Prédicas en Audio</strong></h3>
            <p>No te pierdas ninguno de nuestros mensajes y suscríbete a nuestro canal de Spotify.</p>
            <a href="https://acortar.link/HmsQ7d" target="_blank" class="btn btn-success btn-sm mt-3">Escuchar</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- =====================  GALERÍA MOSAICO  ===================== --}}
<style>
  /* grid responsive */
  .gallery-grid{
    display:grid;
    gap:14px;
    grid-template-columns: repeat(2, 1fr);          /* móvil: 2 */
  }
  @media (min-width:768px){
    .gallery-grid{ grid-template-columns: repeat(3, 1fr); } /* tablet: 3 */
  }
  @media (min-width:1200px){
    .gallery-grid{ grid-template-columns: repeat(4, 1fr); } /* desktop: 4 */
  }

  /* item base */
  .gallery-item{
    position:relative; overflow:hidden; border-radius:10px;
    background-size:cover; background-position:center;
    aspect-ratio: 4/5;                      /* alto por defecto (tipo retrato) */
    box-shadow: 0 6px 18px rgba(0,0,0,.08);
  }

  /* variantes para el mosaico */
  .wide  { grid-column: span 2; aspect-ratio: 16/9; } /* panorámica */
  .tall  { aspect-ratio: 3/4; }                      /* más alta */
  .big   { grid-column: span 2; grid-row: span 2; aspect-ratio: 1/1; } /* cuadrado grande */

  /* overlay icon */
  .gallery-item .overlay{
    position:absolute; inset:0; display:flex; align-items:center; justify-content:center;
    background:rgba(0,0,0,.25); opacity:0; transition:opacity .25s ease;
  }
  .gallery-item:hover .overlay{ opacity:1; }
  .gallery-item .overlay span{ color:#fff; font-size:26px; }
</style>

<section class="ftco-section pt-4">
  <div class="container">
    <div class="gallery-grid">

      {{-- Define tu lista UNA vez y decide qué items son grandes/anchos --}}
      @php
        $imgs = [
          ['file'=>'IGLE1.jpg',  'class'=>''],        // normal
          ['file'=>'IGLE8.jpg',  'class'=>'tall'],
          ['file'=>'IGLE9.jpg',  'class'=>'wide'],    // 2 columnas, panorámica
          ['file'=>'IGLE6.jpg',  'class'=>''],
          ['file'=>'IGLE2.jpg',  'class'=>''],
          ['file'=>'IGLE3.jpg',  'class'=>'big'],     // cuadrado grande (2x2)
          ['file'=>'BAUTI.JPEG', 'class'=>''],
          ['file'=>'OLIM.JPEG',  'class'=>'tall'],
          ['file'=>'REU.JPEG',   'class'=>'wide'],
          ['file'=>'ENCC.JPEG',  'class'=>''],
          ['file'=>'OLIM2.JPEG', 'class'=>''],
          ['file'=>'BBQ.JPEG',   'class'=>'tall'],
        ];
      @endphp

      @foreach($imgs as $it)
        @php $url = asset('assets/images/'.$it['file']); @endphp
        <a href="{{ $url }}" class="image-popup gallery-item {{ $it['class'] }}"
           style="background-image:url('{{ $url }}')"
           aria-label="Foto {{ $loop->iteration }}">
          <div class="overlay"><span class="icon-search"></span></div>
        </a>
      @endforeach

    </div>
  </div>
</section>
{{-- =====================  /GALERÍA MOSAICO  ===================== --}}



  {{-- Últimas actividades (corrige enlaces e imágenes) --}}
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Últimas Actividades</h2>
        </div>
      </div>

      <div class="row">
        {{-- Tarjeta 1 --}}
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20"
               style="background-image: url('{{ asset('assets/images/gcv1.jpg') }}');"></a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="{{ url('/contact') }}" target="_blank" rel="noopener noreferrer">Por confirmar</a></div>
              </div>
              <h3 class="heading mb-4">Grupos con vida</h3>
              <p class="time-loc">
                <span class="mr-2"><i class="icon-clock-o"></i> POR CONFIRMAR</span>
                <span><i class="icon-map-o"></i> Hogares</span>
              </p>
              <p>Es nuestro anhelo volver a reunirnos...</p>
            </div>
          </div>
        </div>

        {{-- Tarjeta 2 --}}
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20"
               style="background-image: url('{{ asset('assets/images/OLIMPIADASII.jpeg') }}');"></a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="https://web.whatsapp.com/" target="_blank" rel="noopener noreferrer">
                  ESTADIO SARRAIMA <u>+info +34603422977</u></a></div>
              </div>
              <h3 class="heading mb-4">Olimpiadas evangélicas</h3>
              <p class="time-loc">
                <span class="mr-2"><i class="icon-clock-o"></i> 11:00</span>
                <span><i class="icon-map-o"></i> Montjuïc</span>
              </p>
              <p>Nueva edición de las olimpiadas en el estadio Sarraima...</p>
            </div>
          </div>
        </div>

        {{-- Tarjeta 3 --}}
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20"
               style="background-image: url('{{ asset('assets/images/empanadash.jpg') }}');"></a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="{{ url('/contact') }}">Todos los domingos <u>+info aquí</u></a></div>
              </div>
              <h3 class="heading mb-4">Proyecto Pro Templo</h3>
              <p class="time-loc">
                <span class="mr-2"><i class="icon-clock-o"></i> 11:00</span>
                <span><i class="icon-map-o"></i> Servicio de cafetería</span>
              </p>
              <p>Seguimos trabajando para conseguir los recursos...</p>
            </div>
          </div>
        </div>

      </div> {{-- row --}}
    </div> {{-- container --}}
  </section>

    </section>
@endsection