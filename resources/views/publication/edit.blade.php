


<x-master title="Créer un profil">

    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg rounded-4">

                    <!-- Header coloré -->
                    <div
                        class="card-header text-white text-center rounded-top-4 p-4"
                        style="background: linear-gradient(135deg, #0062E6 0%, #33AEFF 100%);"
                    >
                        <h2 class="fw-bold mb-0">
                        <i class="bi bi-person-plus me-2"></i>
                        Modifier publication
                        </h2>
                    </div>

                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('publications.update', $publication->id) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        {{-- Nom complet --}}
                        <div class="form-floating mb-4">
                            <input
                            type="text"
                            name="titre"
                            class="form-control @error('titre') is-invalid @enderror"
                            id="floatingName"
                            placeholder="Titre"
                            value="{{ old('titre', $publication->titre) }}"
                            >
                            <label for="floatingName">
                            <i class="bi bi-person-fill me-2"></i>Titre
                            </label>
                            @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Description --}}
                        <div class="form-floating mb-4">
                            <textarea
                            name="body"
                            class="form-control @error('body') is-invalid @enderror"
                            placeholder="Parlez un peu de vous..."
                            id="floatingBio"
                            style="height: 100px;"
                            >{{ old('body', $publication->body) }}</textarea>
                            <label for="floatingBio">
                            <i class="bi bi-card-text me-2"></i>Description
                            </label>
                            @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image">
                            <img src="{{ asset('storage/'.$publication->image) }}" width="200" alt="">

                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg text-white"
                                    style="background: linear-gradient(135deg, #28A745 0%, #7DD66B 100%);">
                            <i class="bi bi-check-circle-fill me-2"></i>Modifier
                            </button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
</x-master>
