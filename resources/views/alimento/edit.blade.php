@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Alimento
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
                    @if ($segment == 'edit' || count(Request::segments()) - 2 == $key)
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

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Actualizar Alimento {{ $alimento->Nombre }}</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('alimentos.update', $alimento->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('alimento.form')

                    </form>
                </div>
            </div>
        </div>
    @endsection
