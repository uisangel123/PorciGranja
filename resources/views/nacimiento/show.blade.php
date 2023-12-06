@extends('layouts.app')

@section('template_title')
    {{ $nacimiento->name ?? "{{ __('Show') Nacimiento" }}
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
                    <span class="card-title">Datos Nacimiento:</span>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Id Fasereproduccion:</label>
                            <input type="text" readonly placeholder="{{ $nacimiento->id_faseReproduccion }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Fecha Nacimiento:</label>
                            <input type="text" readonly placeholder="{{ $nacimiento->Fecha_Nacimiento }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Peso Promedio:</label>
                            <input type="text" readonly placeholder="{{ $nacimiento->Peso_Promedio }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Cantidad Porcinos Total:</label>
                            <input type="text" readonly placeholder="{{ $nacimiento->Cantidad_Porcinos_Total }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cantidad Porcinos Criales:</label>
                            <input type="text" readonly placeholder="{{ $nacimiento->Cantidad_Porcinos_Criales }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Cantidad Porcinos Reproductores:</label>
                            <input type="text" readonly placeholder="{{ $nacimiento->Cantidad_Porcinos_Reproductores }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Cantidad Porcinos Muertos:</label>
                            <input type="text" readonly placeholder="{{ $nacimiento->Cantidad_Porcinos_Muertos }}"
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


