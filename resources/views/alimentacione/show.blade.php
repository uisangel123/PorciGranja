@extends('layouts.app')

@section('template_title')
    {{ $alimentacione->name ?? "{{ __('Show') Alimentacione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Alimentacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('alimentacion.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label>Id Lote:</label>
                                <input type="text" readonly placeholder="{{ $alimentacione->id_lote }}"
                                    class="form-control">
                            </div>
                            @include('alimentacion.show')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
