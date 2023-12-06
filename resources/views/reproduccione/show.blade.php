
@extends('layouts.app')

@section('template_title')
{{ $reproduccione->name ?? "{{ __('Show') Reproduccione" }}
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
                    <span class="card-title">Datos Proceso Reproduccion {{$reproduccione->name}}</span>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Macho:</label>
                            <input type="text" readonly placeholder="{{ $reproduccione->id_Porcino_Macho }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hembra:</label>
                            <input type="text" readonly placeholder="{{ $reproduccione->id_Porcino_Hembra }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha Inicial:</label>
                            <input type="text" readonly placeholder="{{ $reproduccione->Fecha_Inicio }}"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Fecha Final:</label>
                            <input type="text" readonly placeholder="{{ $reproduccione->Fecha_Final }}" class="form-control">
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