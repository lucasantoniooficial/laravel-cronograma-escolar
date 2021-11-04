<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo />
            </a>
        </x-slot>

        <div class="card">
            <div class="card-body login-card-body">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                    <div class="input-group mb-3">
                        <x-input id="email" class="form-control" placeholder="E-mail" type="email" name="email" :value="old('email')" required autofocus />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <x-input id="password" class="form-control"
                                 type="password"
                                 name="password"
                                 placeholder="Senha"
                                 required autocomplete="current-password" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input id="remember_me" type="checkbox" name="remember">
                                <label for="remember_me" class="inline-flex items-center">
                                    {{ __('Lembre-me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary btn-block">Entrar</button>
                        </div>
                    </div>
                    <p class="mb-1">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif
                    </p>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
