@extends('layouts.app')

@section('template_title')
    {{ $vacunacione->name ?? "{{ __('Show') Vacunacione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vacunacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vacunaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $vacunacione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Lote Vacunación:</strong>
                            {{ $vacunacione->id_lote_vacunación }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Vacunación:</strong>
                            {{ $vacunacione->Fecha_Vacunación }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
