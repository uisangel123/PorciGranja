@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Nacimiento
@endsection

@section('content')
    @include('layouts.nav_menu')

    @include('layouts.menu')
    <main id="main" class="main">
        <section class="content container-fluid">
            <div class="">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">{{ __('Update') }} Nacimiento</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('nacimientos.update', $nacimiento->id) }}" role="form"
                                enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf

                                @include('nacimiento.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
