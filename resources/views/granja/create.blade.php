@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Granja
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
                        <span class="card-title">{{ __('Create') }} Granja</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('granjas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('granja.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
