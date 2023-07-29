@extends('layouts.app')

@section('template_title')
    {{ $porcino->name ?? "{{ __('Show') Porcino" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Porcino</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('porcinos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Raza:</strong>
                            {{ $porcino->Raza }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $porcino->Genero }}
                        </div>
                        <div class="form-group">
                            <strong>Peso:</strong>
                            {{ $porcino->Peso }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $porcino->Descripción }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
