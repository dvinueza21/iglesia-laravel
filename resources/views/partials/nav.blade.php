<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top" id="ftco-navbar">
  <div class="container">

    {{-- Nombre de la Iglesia --}}
    <a class=" navbar "  href="{{ route('home') }}">
      IGLESIA EL REINO DE LOS CIELOS
    </a>

    {{-- Botón hamburguesa en móviles --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Menú de navegación --}}
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">La Visión</a></li>
        <li class="nav-item"><a href="{{ route('gallery') }}" class="nav-link">Congreso SED</a></li>
        <li class="nav-item"><a href="{{ route('donate') }}" class="nav-link">Donativos</a></li>
        <li class="nav-item"><a href="{{ route('causes') }}" class="nav-link">Obra Social</a></li>
        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contacto</a></li>

        @auth
          <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Panel</a></li>
          <li class="nav-item"><a href="{{ route('profile.edit') }}" class="nav-link">Mi perfil</a></li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-link nav-link" style="display:inline; padding:0;">Cerrar sesión</button>
            </form>
          </li>
        @else
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
