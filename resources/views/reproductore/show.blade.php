@extends('layouts.app')

@section('template_title')
    {{ $reproductore->name ?? "{{ __('Show') Reproductore" }}
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Datos Reproductor {{ $reproductore->id }}</span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Identificador:</label>
                                <input type="text" readonly placeholder="{{ $reproductore->id }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Fecha Nacimiento:</label>
                                <input type="text" readonly placeholder="{{ $reproductore->Fecha_nacimiento }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Raza:</label>
                                <input type="text" readonly placeholder="{{ $reproductore->Raza }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Genero:</label>
                                <input type="text" readonly placeholder="{{ $reproductore->Genero }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Peso:</label>
                                <input type="text" readonly placeholder="{{ $reproductore->Peso }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Procedencia:</label>
                                <input type="text" readonly placeholder="{{ $reproductore->Procedencia }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <a style="margin-top: 10px" class="btn btn-primary" href="{{ route('reproductores.index') }}">
                            Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
