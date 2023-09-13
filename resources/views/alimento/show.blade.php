@extends('layouts.app')

@section('template_title')
    {{ $alimento->name ?? "{{ __('Show') Alimento" }}
@endsection

@section('content')
    @include('layouts.nav_menu')

    @include('layouts.menu')
    <main id="main" class="main">
        <nav>
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
        </nav>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Alimento</span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" readonly placeholder="{{ $alimento->Nombre }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Precio:</label>
                                <input type="text" readonly placeholder="{{ $alimento->Precio }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marca:</label>
                                <input type="text" readonly placeholder="{{ $alimento->Marca }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Cantidad:</label>
                                <input type="text" readonly placeholder="{{ $alimento->Cantidad }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descripción:</label>
                                <input type="text" readonly placeholder="{{ $alimento->Descripción }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Etapa Alimento:</label>
                                <input type="text" readonly placeholder="{{ $alimento->etapa_alimento_id }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <a style="margin-top: 10px" class="btn btn-primary" href="{{ route('alimentos.index') }}">
                            Regresar</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
