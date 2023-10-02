@extends('layouts.app')

@section('template_title')
    {{ $nacimiento->name ?? "{{ __('Show') Nacimiento" }}
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
                                <span class="card-title">{{ __('Show') }} Nacimiento</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('nacimientos.index') }}"> {{ __('Back') }}</a>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <strong>Id Fasereproduccion:</strong>
                                {{ $nacimiento->id_faseReproduccion }}
                            </div>
                            <div class="form-group">
                                <strong>Fecha Nacimiento:</strong>
                                {{ $nacimiento->Fecha_Nacimiento }}
                            </div>
                            <div class="form-group">
                                <strong>Peso Promedio:</strong>
                                {{ $nacimiento->Peso_Promedio }}
                            </div>
                            <div class="form-group">
                                <strong>Cantidad Porcinos Total:</strong>
                                {{ $nacimiento->Cantidad_Porcinos_Total }}
                            </div>
                            <div class="form-group">
                                <strong>Cantidad Porcinos Criales:</strong>
                                {{ $nacimiento->Cantidad_Porcinos_Criales }}
                            </div>
                            <div class="form-group">
                                <strong>Cantidad Porcinos Reproductores:</strong>
                                {{ $nacimiento->Cantidad_Porcinos_Reproductores }}
                            </div>
                            <div class="form-group">
                                <strong>Cantidad Porcinos Muertos:</strong>
                                {{ $nacimiento->Cantidad_Porcinos_Muertos }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
