@extends('layouts.app')

@section('template_title')
    {{ $lote->name ?? "{{ __('Show') Lote" }}
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
                            <span class="card-title">{{ __('Show') }} Lote</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lotes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $lote->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Corral:</strong>
                            {{ $lote->id_corral }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

