@extends('layouts.app')

@section('template_title')
    {{ $etapaLote->name ?? "{{ __('Show') Etapa Lote" }}
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
                        <span class="card-title">Datos Etapa-Lote {{ $etapaLote->Nombre }}</span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Nombre }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Lote:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->id_lote }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Corral:</label>
                                <input type="text" readonly
                                    placeholder="{{ $etapaLote->id_corral }}"class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Etapa:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->id_lote }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha Inicial:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Fecha_inicial }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Peso Inicial:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Peso_inicial }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha Final:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Fecha_final }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Peso Final:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Peso_final }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cantidad Inicial:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Cantidad_inicial }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Muertes Totales:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Muertes_totales }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cantidad Final:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Cantidad_final }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Porcentaje Mortalidad:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Porcentaje_Mortalidad }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alimento:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->id_alimento }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Observaciones:</label>
                                <input type="text" readonly placeholder="{{ $etapaLote->Observaciones }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <a style="margin-top: 10px" class="btn btn-primary" href="{{ route('etapa-lotes.index') }}">
                            Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
