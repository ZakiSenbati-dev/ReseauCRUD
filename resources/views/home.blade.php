<x-master title="Tableau de bord GOAT">
    <div class="container py-5">

        {{-- Titre principal --}}
        <div class="text-center mb-5">
            <h1 class="fw-bold">GOAT Dashboard</h1>
            <p class="text-muted">Bienvenue sur votre interface d'administration</p>
            <p class="small">Page visitée <strong>{{ $compteur }}</strong> fois.</p>
        </div>

        {{-- Statistiques principales --}}
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 text-center bg-light">
                    <h4 class="mb-2 text-primary">Total Profils</h4>
                    <p class="display-5 fw-bold">{{ $profilesCount }}</p>
                    <a href="{{ route('profiles.index') }}" class="btn btn-outline-primary mt-2">Voir tous les profils</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 text-center bg-light">
                    <h4 class="mb-2 text-success">Total Publications</h4>
                    <p class="display-5 fw-bold">{{ $publicationsCount }}</p>
                    <a href="{{ route('publications.index') }}" class="btn btn-outline-success mt-2">Voir toutes les publications</a>
                </div>
            </div>
        </div>

        {{-- Contenu récent --}}
        <div class="row g-4">
            {{-- Derniers profils --}}
            <div class="col-md-6">
                <div class="card shadow-sm rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h5 class="mb-0">Derniers profils</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($latestProfiles as $profile)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $profile->name }}</strong><br>
                                    <small class="text-muted">{{ $profile->email }}</small>
                                </div>
                                <small class="text-muted">{{ $profile->created_at->diffForHumans() }}</small>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Aucun profil disponible.</li>
                        @endforelse
                    </ul>
                    <div class="card-footer text-end bg-white">
                        <a href="{{ route('profiles.create') }}" class="btn btn-sm btn-outline-primary">+ Ajouter un profil</a>
                    </div>
                </div>
            </div>

            {{-- Dernières publications --}}
            <div class="col-md-6">
                <div class="card shadow-sm rounded-4">
                    <div class="card-header bg-success text-white rounded-top-4">
                        <h5 class="mb-0">Dernières publications</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($latestPublications as $publication)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ Str::limit($publication->titre, 40) }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($publication->body, 50) }}</small>
                                </div>
                                <small class="text-muted">{{ $publication->created_at->diffForHumans() }}</small>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Aucune publication disponible.</li>
                        @endforelse
                    </ul>
                    <div class="card-footer text-end bg-white">
                        <a href="{{ route('publications.create') }}" class="btn btn-sm btn-outline-success">+ Ajouter une publication</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-master>
