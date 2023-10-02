@extends('layouts.app')

@section('template_title')
    {{ $reproduccione->name ?? "{{ __('Show') Reproduccione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Reproduccione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reproducciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Porcino Macho:</strong>
                            {{ $reproduccione->id_Porcino_Macho }}
                        </div>
                        <div class="form-group">
                            <strong>Id Porcino Hembra:</strong>
                            {{ $reproduccione->id_Porcino_Hembra }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $reproduccione->Fecha_Inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Final:</strong>
                            {{ $reproduccione->Fecha_Final }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
