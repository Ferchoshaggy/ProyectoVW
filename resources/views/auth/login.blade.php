<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>


            <div class="container-fluid fixed-top p-4">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                      <!--  <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a> -->
                        @else
                        <!--  <a href="{{ route('login') }}" class="text-muted">Login</a> -->
                            @if (Route::has('register'))
                           <!--       <a href="{{ route('register') }}" class="ms-4 text-muted">Registro</a> -->
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

        <div class="card-body">

            <x-jet-validation-errors class="mb-3 rounded-0" />

            @if (session('status'))
                <div class="alert alert-success mb-3 rounded-0" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <x-jet-label value="{{ __('Correo') }}" style="color: white"/>

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                 name="email" :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Contraseña') }}" style="color: white"/>

                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="current-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>
<!--
               <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <label class="custom-control-label" for="remember_me">
                            {{ __('Recuerdame') }}
                        </label>
                    </div>
                </div>
-->

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">

 <!--
                        @if (Route::has('password.request'))
                            <a class="me-3" href="{{ route('password.request') }}" style="color: white">
                                {{ __('Olvidades tu contraseña?') }}
                            </a>
                        @endif
-->
                    </div>
                </div>
                <button class="btn btn-dark" style="width: 100%; color:white">
                    {{ __('Ingresar') }}
</button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
