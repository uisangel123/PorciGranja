@extends('layouts.app')

@section('template_title')
    Vacunacione
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
                                    {{ __('Vacunacione') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('vacunaciones.create') }}" class="btn btn-primary btn-sm float-right"
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

                                            <th>Nombre</th>
                                            <th>Id Lote Vacunación</th>
                                            <th>Fecha Vacunación</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vacunaciones as $vacunacione)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $vacunacione->nombre }}</td>
                                                <td>{{ $vacunacione->id_lote_vacunación }}</td>
                                                <td>{{ $vacunacione->Fecha_Vacunación }}</td>

                                                <td>
                                                    <form action="{{ route('vacunaciones.destroy', $vacunacione->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('vacunaciones.show', $vacunacione->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('vacunaciones.edit', $vacunacione->id) }}"><i
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
                    {!! $vacunaciones->links() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
