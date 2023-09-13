@extends('layouts.app')

@section('template_title')
    {{ $corrale->name ?? "{{ __('Show') Corrale" }}
@endsection

@section('content')
    @include('layouts.nav_menu')

    @include('layouts.menu')

    <main id="main" class="main">
        <ol class="breadcrumb" style="padding: 0 0 0 10px">
            <li class="breadcrumb-item"><i class="fa-solid fa-house"></i></i> {{ strtoupper('inicio') }}</a></li>
            <?php $segments = ''; ?>
            @foreach (Request::segments() as $key => $segment)
                @if ($segment == 'edit' || count(Request::segments()) - 1 == $key)
                    @continue
                @endif
                <?php $segments .= '/' . $segment; ?>
                <li class="breadcrumb-item">
                    <a href="{{ $segments }}"> {{ strtoupper($segment) }}</a>
                </li>
            @endforeach
        </ol>
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <span class="card-title">Datos Corral {{$corrale->name}}</span>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" readonly placeholder="{{ $corrale->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Granja:</label>
                            <input type="text" readonly placeholder="{{ $corrale->granjas_id }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Disponibilidad:</label>
                            <input type="text" readonly placeholder="{{ $corrale->disponibilidad }}"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a style="margin-top: 10px" class="btn btn-primary" href="{{ route('corrales.index') }}">Regresar</a>
                </div>
            </div>
        </div>
    </main>
@endsection
