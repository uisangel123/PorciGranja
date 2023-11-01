@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Alimentacione
@endsection

@section('content')
    @include('layouts.nav_menu')

    @include('layouts.menu')
    <main id="main" class="main">
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">{{ __('Create') }} Alimentacione</span>
                        </div>
                        <div class="card-body">
                            <form id="xdform" method="POST" action="{{ route('alimentacion.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf

                                @include('alimentacione.form')
                                @include('alimentacion.form')<!--Hasra aqui llegue por el momento, se creo alimentaciones y alimentacions q el ultimo pienso q solo se usara el form y modal pero no borrare nada por las dudas-->
                                <br>
                                {{-- <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
