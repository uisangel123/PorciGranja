@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Porcino
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
                        <span class="card-title">{{ __('Create') }} Porcino</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('porcinos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('porcino.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

