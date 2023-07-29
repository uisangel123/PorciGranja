@extends('layouts.app')

@section('template_title')
    Porcino
@endsection

@section('content')
    @include('layouts.nav_menu')

    @include('layouts.menu')

    <main id="main" class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Porcino') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('porcinos.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>Identificador</th>

                                            <th>Raza</th>
                                            <th>Genero</th>
                                            <th>Peso</th>
                                            <th>Descripción</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($porcinos as $porcino)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $porcino->Raza }}</td>
                                                <td>{{ $porcino->Genero }}</td>
                                                <td>{{ $porcino->Peso }}</td>
                                                <td>{{ $porcino->Descripción }}</td>

                                                <td>
                                                    <form action="{{ route('porcinos.destroy', $porcino->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('porcinos.show', $porcino->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('porcinos.edit', $porcino->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {!! $porcinos->links() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
