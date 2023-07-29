@extends('layouts.app')

@section('template_title')
    {{ $granja->name ?? "{{ __('Show') Granja" }}
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
                            <span class="card-title">{{ __('Show') }} Granja</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('granjas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $granja->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $granja->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
