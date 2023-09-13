@extends('layouts.app')

@section('template_title')
    {{ $etapa->name ?? "{{ __('Show') Etapa" }}
@endsection

@section('content')
    @include('layouts.nav_menu')

    @include('layouts.menu')
    <main id="main" class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa-solid fa-house"></i></i> {{ strtoupper('inicio') }}</a>
            </li>
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
                    <span class="card-title">Datos etapa {{ $etapa->Nombre }}</span>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" readonly placeholder="{{ $etapa->Nombre }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Descripción:</label>
                            <input type="text" readonly placeholder="{{ $etapa->Descripción }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a style="margin-top: 10px" class="btn btn-primary" href="{{ route('etapas.index') }}">Regresar</a>
                </div>
            </div>
        </div>
    </main>
@endsection
