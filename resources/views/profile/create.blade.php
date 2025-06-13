<x-master title="Créer un profil">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8"> <!-- Wider layout -->
                <div class="card border-0 shadow-lg rounded-4">

                    <!-- Header -->
                    <div class="card-header text-white text-center rounded-top-4 p-4"
                        style="background: linear-gradient(135deg, #0062E6 0%, #33AEFF 100%);">
                        <h2 class="fw-bold mb-0">
                            <i class="bi bi-person-plus me-2"></i>
                            Création de compte
                        </h2>
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf

                            <div class="row">
                                <!-- LEFT COLUMN -->
                                <div class="col-md-6">

                                    {{-- Nom complet --}}
                                    <div class="form-floating mb-3">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                               id="floatingName" placeholder="Nom complet" value="{{ old('name') }}">
                                        <label for="floatingName"><i class="bi bi-person-fill me-2"></i>Nom complet</label>
                                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                               id="floatingEmail" placeholder="exemple@domaine.com" value="{{ old('email') }}">
                                        <label for="floatingEmail"><i class="bi bi-envelope-fill me-2"></i>Email</label>
                                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    {{-- Mot de passe --}}
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                               id="floatingPassword" placeholder="Mot de passe">
                                        <label for="floatingPassword"><i class="bi bi-lock-fill me-2"></i>Mot de passe</label>
                                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    {{-- Confirmation --}}
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password_confirmation" class="form-control"
                                               id="floatingConfirm" placeholder="Confirmez le mot de passe">
                                        <label for="floatingConfirm"><i class="bi bi-lock-fill me-2"></i>Confirmation</label>
                                    </div>
                                </div>

                                <!-- RIGHT COLUMN -->
                                <div class="col-md-6">

                                    {{-- Description --}}
                                    <div class="form-floating mb-3">
                                        <textarea name="bio" class="form-control @error('bio') is-invalid @enderror"
                                                  placeholder="Parlez un peu de vous..." id="floatingBio"
                                                  style="height: 120px;">{{ old('bio') }}</textarea>
                                        <label for="floatingBio"><i class="bi bi-card-text me-2"></i>Description</label>
                                        @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    {{-- Image --}}
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-lg text-white"
                                        style="background: linear-gradient(135deg, #28A745 0%, #7DD66B 100%);">
                                    <i class="bi bi-check-circle-fill me-2"></i>Ajouter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
