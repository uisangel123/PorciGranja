@extends('layouts.app')

@section('template_title')
    {{ $granja->name ?? "{{ __('Show') Granja" }}
@endsection

@section('content')
@include('layouts.nav_menu')

    @include('layouts.menu')
<main id="main" class="main"> 
    <div class="pagetitle">
                      <h1>Detalles Granja</h1>
                      <nav>
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                          <li class="breadcrumb-item"><a href="{{ route('granjas.index') }}">Inicio Granja</a></li>
                          <li class="breadcrumb-item active">Detalles Granja</li>
                        </ol>
                      </nav>
                    </div><!--Links de navegacion-->
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

    <div class="box box-info padding-1">
    <div class="box-body">
      <div class="row" style=" padding: 20px">
        <div class="col-6">
          <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $granja->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $granja->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
      </div>
    </div>
    <div class="box-footer mt20" style="padding: 10px">
        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('granjas.index') }}"> {{ __('Back') }}</a>
                        </div>
    </div>
</div>
</main>
@endsection


