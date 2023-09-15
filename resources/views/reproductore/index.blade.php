@extends('layouts.app')

@section('template_title')
    Reproductore
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
                                    {{ __('Reproductores') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('reproductores.create') }}" class="btn btn-primary btn-sm float-right"
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
                                <table class="table table-striped table-hover datatable">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Identificador</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Raza</th>
                                            <th>Genero</th>
                                            <th>Peso</th>
                                            <th>Procedencia</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reproductores as $reproductore)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $reproductore->id }}</td>
                                                <td>{{ $reproductore->Fecha_nacimiento }}</td>
                                                <td>{{ $reproductore->Raza }}</td>
                                                <td>{{ $reproductore->Genero }}</td>
                                                <td>{{ $reproductore->Peso }}</td>
                                                <td>{{ $reproductore->Procedencia }}</td>

                                                <td>
                                                    <form action="{{ route('reproductores.destroy', $reproductore->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('reproductores.show', $reproductore->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('reproductores.edit', $reproductore->id) }}"><i
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
                    {!! $reproductores->links() !!}
                </div>
            </div>
        </div>
    </main>
    @endsection
