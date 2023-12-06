@extends('layouts.app')

@section('content')
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="{{ asset('assets/img/porcigranja11-removebg-preview.png') }}" style="width: 240px;height: 55px !important;">
                               
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body" >

                                <div class="pt-2 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Registrarse</h5>
                                    <p class="text-center small">Ingrese sus datos personales para crear una cuenta</p>
                                </div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="cedula">{{ __('Cedula') }}</label>
                                            <input id="cedula" type="text"
                                                class="form-control @error('cedula') is-invalid @enderror" name="cedula"
                                                value="{{ old('cedula') }}" required autocomplete="cedula"
                                                onkeypress="return soloNumeros(event,'cedula')">
                                            @error('cedula')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="name">{{ __('Nombre') }}</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="email">{{ __('Correo') }}</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="telefono">{{ __('telefono') }}</label>
                                            <input id="telefono" type="text"
                                                class="form-control error @error('telefono') is-invalid @enderror"
                                                name="telefono" value="{{ old('telefono') }}" required
                                                autocomplete="telefono" onkeypress="return soloNumeros(event,'telefono')" minlength="10" maxlength="10">
                                            @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="password">{{ __('Contraseña') }}</label>
                                            <div class="input-group"
                                                style="display: flex; align-items: center; padding: 0;">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">
                                                <button class="btn eye-control" id="icono-password" type="button"
                                                    onclick="verClave('password','icono-password')" style="width: 50px">
                                                    <i class="fas fa-eye-slash"></i>
                                                </button>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                                            <div class="input-group"
                                                style="display: flex; align-items: center; padding: 0;">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                                <button class="btn eye-control" id="icono-password1" type="button"
                                                    onclick="verClave('password-confirm','icono-password1')"
                                                    style="width: 50px">
                                                    <i class="fas fa-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Ya tienes cuenta? <a
                                                    href="{{ route('login') }}">Acceder</a></p>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
