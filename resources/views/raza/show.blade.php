@extends('layouts.app')

@section('template_title')
    {{ $raza->name ?? "{{ __('Show') Raza" }}
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
                    <span class="card-title">{{ __('Detalles') }} Raza</span>
                </div>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <strong>Nombre:</strong>
                    {{ $raza->Nombre }}
                </div>
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    {{ $raza->Descripcion }}
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('razas.index') }}"> {{ __('Regresar') }}</a>
                </div>
            </div>

        </div>
    </main>
@endsection
