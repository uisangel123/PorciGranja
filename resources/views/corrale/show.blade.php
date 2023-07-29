@extends('layouts.app')

@section('template_title')
    {{ $corrale->name ?? "{{ __('Show') Corrale" }}
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
                            <span class="card-title">{{ __('Show') }} Corrale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('corrales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $corrale->name }}
                        </div>
                        <div class="form-group">
                            <strong>Granjas Id:</strong>
                            {{ $corrale->granjas_id }}
                        </div>
                        <div class="form-group">
                            <strong>Disponibilidad:</strong>
                            {{ $corrale->disponibilidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
