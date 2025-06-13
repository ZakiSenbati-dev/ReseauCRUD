<x-master title="Connexion">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg rounded-4">

                <!-- Header -->
                    <div
                        class="card-header text-white text-center rounded-top-4 p-4"
                        style="background: linear-gradient(135deg, #0062E6 0%, #33AEFF 100%);"
                    >
                        <h2 class="fw-bold mb-0">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Connexion
                        </h2>
                    </div>

                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Login (Nom d'utilisateur ou identifiant) --}}
                        <div class="form-floating mb-4">
                            <input
                            type="text"
                            name="login"
                            class="form-control @error('login') is-invalid @enderror"
                            id="floatingLogin"
                            placeholder="Nom d'utilisateur"
                            value="{{ old('login') }}"
                            >
                            <label for="floatingLogin">
                            <i class="bi bi-person-fill me-2"></i>Login
                            </label>
                            @error('login')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Mot de passe --}}
                        <div class="form-floating mb-4">
                            <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="floatingPassword"
                            placeholder="Mot de passe"
                            >
                            <label for="floatingPassword">
                            <i class="bi bi-lock-fill me-2"></i>Mot de passe
                            </label>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg text-white"
                                    style="background: linear-gradient(135deg, #28A745 0%, #7DD66B 100%);">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Se connecter
                            </button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
