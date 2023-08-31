@extends('layouts.app')

@section('template_title')
    {{ $etapa->name ?? "{{ __('Show') Etapa" }}
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
                            <span class="card-title">{{ __('Show') }} Etapa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('etapas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $etapa->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $etapa->Descripción }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

