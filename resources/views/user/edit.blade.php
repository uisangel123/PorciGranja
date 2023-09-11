@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} User
@endsection

@section('content')
    @include('layouts.nav_menu')

    @include('layouts.menu')
    <main id="main" class="main">


        <div class="pagetitle">
            <h1>Perfil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                            <h2>{{ $user->name }}</h2>
                            <h3>{{ $user->rol }}</h3>
                            <h6>{{ $user->cedula }}</h6>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">



                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar
                                        Perfil</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Cambiar Contraseña</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">



                                <div class="tab-pane fade show active profile-edit" id="profile-edit">

                                    <!-- Profile Edit Form -->

                                    <form method="POST" action="{{ route('users.update', $user->id) }}" role="form"
                                        enctype="multipart/form-data">
                                        {{ method_field('PATCH') }}
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre</label>
                                            <div class="col-md-8 col-lg-9">
                                                {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>


                                        @if (auth()->user()->rol === 'admin')
                                            <!--ver campo rol si es admin y el campo cedula sera editable solo para el admin-->
                                            <div class="row mb-3">
                                                <label for="about"
                                                    class="col-md-4 col-lg-3 col-form-label">Cedula</label>
                                                <div class="col-md-8 col-lg-9">
                                                    {{ Form::text('cedula', $user->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Cedula', 'readonly' => auth()->user()->rol !== 'admin']) }}
                                                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="company" class="col-md-4 col-lg-3 col-form-label">Rol</label>
                                                <div class="col-md-8 col-lg-9">
                                                    {{ Form::select('rol', $roles->pluck('role_name', 'role_name'), $user->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                                                    {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                        @else
                                            {{ Form::hidden('cedula', $user->cedula) }}
                                        @endif

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Telefono</label>
                                            <div class="col-md-8 col-lg-9">
                                                {{ Form::text('telefono', $user->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                                                {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">{{ __('Modificar') }}</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="{{route('users.edit',[ 'user' => Auth::user()->id])}}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="passwordActual" class="col-md-4 col-lg-3 col-form-label">Contraseña Actual</label>
                                            <div class="col-md-8 col-lg-9">
                                            <input id="passwordActual" name="passwordActual" type="password" class="form-control @error('passwordActual') is-invalid
                                            @enderror inputPassword">
                                        </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="passwordNueva" class="col-md-4 col-lg-3 col-form-label">Contraseña nueva</label>
                                            <div class="col-md-8 col-lg-9">
                                            <input id="passwordNueva" name="passwordNueva" type="password" class="form-control @error('passwordNueva') is-invalid
                                            @enderror" onkeydown="compararClave('passwordNueva','PasswordNuevaConfirmar')">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="PasswordNuevaConfirmar" class="col-md-4 col-lg-3 col-form-label">Confirmar Nueva Contraseña</label>
                                            <div class="col-md-8 col-lg-9">
                                            <input id="PasswordNuevaConfirmar" name="PasswordNuevaConfirmar" type="password" class="form-control"  onkeydown="compararClave('passwordNueva','PasswordNuevaConfirmar')">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
