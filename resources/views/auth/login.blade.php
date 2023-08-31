@extends('layouts.app')

@section('content')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">PorciGranja</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body" style="padding: 0 30px 30px 30px; width: 332px !important">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Acceda a tu cuenta</h5>
                                        <p class="text-center small">Entra con tu correo y contraseña!</p>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="yourUsername" class="form-label p-0">Correo</label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <label for="yourPassword" class="form-label p-0">Contraseña</label>
                                            <div class="input-group">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                            <button class="btn btn-primary" type="button" onclick="verClave()">Mostrar Contraseña</button>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="row mb-3" > 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Recuerdame') }}
                                                    </label>
                                                </div>
                                        </div>
                                        <div class="row mb-3" >
                                            <button class="btn btn-primary w-100" type="submit">Acceder</button>
                                            <p class="small p-0">No tienes cuenta? <a href="{{route('register')}}">Crear una</a></p>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
@endsection
