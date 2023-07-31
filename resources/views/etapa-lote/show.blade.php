@extends('layouts.app')

@section('template_title')
    {{ $etapaLote->name ?? "{{ __('Show') Etapa Lote" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Etapa Lote</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('etapa-lotes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $etapaLote->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Lote:</strong>
                            {{ $etapaLote->id_lote }}
                        </div>
                        <div class="form-group">
                            <strong>Id Corral:</strong>
                            {{ $etapaLote->id_corral }}
                        </div>
                        <div class="form-group">
                            <strong>Id Etapa:</strong>
                            {{ $etapaLote->id_etapa }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicial:</strong>
                            {{ $etapaLote->Fecha_inicial }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Final:</strong>
                            {{ $etapaLote->Fecha_final }}
                        </div>
                        <div class="form-group">
                            <strong>Peso Inicial:</strong>
                            {{ $etapaLote->Peso_inicial }}
                        </div>
                        <div class="form-group">
                            <strong>Peso Final:</strong>
                            {{ $etapaLote->Peso_final }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Inicial:</strong>
                            {{ $etapaLote->Cantidad_inicial }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Final:</strong>
                            {{ $etapaLote->Cantidad_final }}
                        </div>
                        <div class="form-group">
                            <strong>Muertes Totales:</strong>
                            {{ $etapaLote->Muertes_totales }}
                        </div>
                        <div class="form-group">
                            <strong>Porcentaje Mortalidad:</strong>
                            {{ $etapaLote->Porcentaje_Mortalidad }}
                        </div>
                        <div class="form-group">
                            <strong>Id Alimento:</strong>
                            {{ $etapaLote->id_alimento }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $etapaLote->Observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
