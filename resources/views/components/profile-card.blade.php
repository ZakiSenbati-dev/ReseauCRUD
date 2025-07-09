

<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
    <div class="card shadow-sm border-0 h-100">
        <div class="position-relative">
            <!-- When you click on the image or any text it goes to the link -->
            <!-- stretched-link is used here for the image area -->
            <a href="{{ route('profiles.show', $profile->id) }}">
                <img src="{{ asset('storage/'.$profile->image) }}" alt="{{ $profile->name }}"
                     class="card-img-top rounded-top" style="object-fit: cover; height: 200px;">
            </a>
        </div>

        <div class="card-body position-relative">
            <!-- Make just the name and bio clickable with a stretched-link inside this section -->
            <a href="{{ route('profiles.show', $profile->id) }}" class="stretched-link"></a>

            <h5 class="card-title fw-bold mb-1">{{ $profile->name }}</h5>
            <p class="card-text text-muted">{{ Str::limit($profile->bio, 80) }}</p>
        </div>

        @auth
            @if(auth()->user()->is_admin)
                <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center px-3 pb-3">
                    <!-- Edit button form -->
                    <form action="{{ route('profiles.edit', $profile->id) }}" method="GET" class="mb-0 position-relative">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary">Modifier</button>
                    </form>

                    <!-- Delete button form -->
                    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="mb-0 position-relative"
                        onsubmit="return confirm('Voulez-vous vraiment supprimer cette profile ?')">
                        @csrf
                        @method('DELETE')
                        <!-- Hidden field to keep track of current page -->
                        <input type="hidden" name="page" value="{{ request('page', 1) }}">
                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</div>
