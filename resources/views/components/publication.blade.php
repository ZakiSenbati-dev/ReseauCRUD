


<div class="card my-3 shadow-sm">
    <div class="card-body">
        <div class="row align-items-center mb-3">
            <div class="col-md-6 d-flex align-items-center">
                <a href="{{ route('profiles.show', $publication->profile->id) }}" class="d-flex align-items-center text-decoration-none text-dark">
                    <img class="rounded-circle me-3" src="{{ asset('storage/' . $publication->profile->image) }}" width="60" height="60" alt="Profile">
                    <h6 class="mb-0">{{ $publication->profile->name }}</h6>
                </a>
            </div>
            <div class="col-md-6 text-end">
                @can('update', $publication)
                    <a href="{{ route('publications.edit', $publication->id) }}" class="btn btn-sm btn-primary me-2">Modifier</a>
                @endcan

                @can('delete', $publication)
                    <form action="{{ route('publications.destroy', $publication->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Voulez-vous vraiment supprimer cette publication ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
                    </form>
                @endcan

            </div>
        </div>

        <h5 class="card-title">{{ $publication->titre }}</h5>
        <p class="card-text">{{ $publication->body }}</p>

        @if (!is_null($publication->image) && file_exists(public_path("storage/{$publication->image}")))
            <img class="img-fluid rounded mt-3"  style="max-width: 90%; height: auto;"
             src="{{ asset("storage/{$publication->image}") }}" alt="{{ $publication->titre }}">
        @endif
    </div>
</div>
