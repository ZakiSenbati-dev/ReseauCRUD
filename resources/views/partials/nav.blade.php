

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-uppercase" href="{{ route('homepage') }}">
      Publify
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- Accueil -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}"><i class="bi bi-house-door me-1"></i> Accueil</a>
            </li>

            <!-- Tous les profils -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profiles.index') }}"><i class="bi bi-people me-1"></i> Tous les profils</a>
            </li>

            <!-- Ajouter profil : visible uniquement pour les admins -->
            @auth
                @if(auth()->user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profiles.create') }}"><i class="bi bi-plus-circle me-1"></i> Ajouter profil</a>
                    </li>
                @endif
            @endauth

            <!-- Publications -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('publications.index') }}"><i class="bi-file-post me-1"></i> Publications</a>
            </li>

            <!-- Ajouter publication (visible si connecté) -->
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('publications.create') }}"><i class="bi-journal-text me-1"></i> Ajouter publication</a>
                </li>
            @endauth

        </ul>


        <ul class="navbar-nav ms-auto">
            @guest
            <li class="nav-item">
            <a class="nav-link" href="{{ route('login.show')}}"><i class="bi bi-box-arrow-in-right me-1"></i> Se connecter</a>
            </li>
            @endguest

        </ul>
        @auth
           <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{auth()->user()->name}}
                </button>
                <ul class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('login.logout')}}"><i class="bi bi-box-arrow-right me-1"></i>Déconnexion</a>
                </ul>
            </div>
        @endauth

    </div>
  </div>
</nav>
