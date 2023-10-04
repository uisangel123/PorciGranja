@extends('layouts.app')

@section('template_title')
    {{ $reproductore->name ?? "{{ __('Show') Reproductore" }}
@endsection

@section('content')
    @include('layouts.nav_menu')

    @include('layouts.menu')
    <main id="main" class="main">
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">{{ __('Show') }} Reproductore</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('reproductores.index') }}">
                                    {{ __('Back') }}</a>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <strong>Id Repro:</strong>
                                {{ $reproductore->id }}
                            </div>
                            <div class="form-group">
                                <strong>Raza:</strong>
                                {{ $reproductore->Raza }}
                            </div>
                            <div class="form-group">
                                <strong>Genero:</strong>
                                {{ $reproductore->Genero }}
                            </div>
                            <div class="form-group">
                                <strong>Peso:</strong>
                                {{ $reproductore->Peso }}
                            </div>
                            <div class="form-group">
                                <strong>Porcino Macho:</strong>
                                {{ $reproductore->Porcino_Macho }}
                            </div>
                            <div class="form-group">
                                <strong>Porcino Hembra:</strong>
                                {{ $reproductore->Porcino_Hembra }}
                            </div>
                            <div class="form-group">
                                <strong>Fecha Nacimiento:</strong>
                                {{ $reproductore->Fecha_nacimiento }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
