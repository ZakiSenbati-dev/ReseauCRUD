
<x-master title="Inscription">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg rounded-4">
                    <div
                        class="card-header text-white text-center rounded-top-4 p-4"
                        style="background: linear-gradient(135deg, #0062E6 0%, #33AEFF 100%);"
                    >
                        <h2 class="fw-bold mb-0">
                            <i class="bi bi-person-plus-fill me-2"></i>
                            Inscription
                        </h2>
                    </div>

                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-floating mb-4">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="floatingName"
                                    placeholder="Nom complet"
                                    value="{{ old('name') }}"
                                    required
                                >
                                <label for="floatingName">
                                    <i class="bi bi-person-fill me-2"></i>Nom complet
                                </label>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="floatingEmail"
                                    placeholder="Email"
                                    value="{{ old('email') }}"
                                    required
                                >
                                <label for="floatingEmail">
                                    <i class="bi bi-envelope-fill me-2"></i>Email
                                </label>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="floatingPassword"
                                    placeholder="Mot de passe"
                                    required
                                >
                                <label for="floatingPassword">
                                    <i class="bi bi-lock-fill me-2"></i>Mot de passe
                                </label>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    id="floatingPasswordConfirm"
                                    placeholder="Confirmer le mot de passe"
                                    required
                                >
                                <label for="floatingPasswordConfirm">
                                    <i class="bi bi-lock-fill me-2"></i>Confirmer le mot de passe
                                </label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg text-white"
                                    style="background: linear-gradient(135deg, #28A745 0%, #7DD66B 100%);">
                                    <i class="bi bi-person-plus-fill me-2"></i>Créer un compte
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
