@extends('layouts.app')

@section('template_title')
    {{ $alimento->name ?? "{{ __('Show') Alimento" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Alimento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('alimentos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $alimento->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $alimento->Marca }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $alimento->Precio }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $alimento->Cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $alimento->Descripción }}
                        </div>
                        <div class="form-group">
                            <strong>Etapa Alimento Id:</strong>
                            {{ $alimento->etapa_alimento_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
