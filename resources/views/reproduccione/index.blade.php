@extends('layouts.app')

@section('template_title')
    Reproduccione
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
                                    {{ __('Reproduccione') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('reproducciones.create') }}"
                                        class="btn btn-primary btn-sm float-right" data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success cerrarMensaje">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover datatable">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Porcino Macho</th>
                                            <th>Porcino Hembra</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Final</th>
                                            <th>Estado</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reproducciones as $reproduccione)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $reproduccione->id_Porcino_Macho }}</td>
                                                <td>{{ $reproduccione->id_Porcino_Hembra }}</td>
                                                <td>{{ $reproduccione->Fecha_Inicio }}</td>
                                                <td>{{ $reproduccione->Fecha_Final }}</td>
                                                <td>{{ $reproduccione->Estado }}</td>

                                                <td>
                                                    <form action="{{ route('reproducciones.destroy', $reproduccione->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('reproducciones.show', $reproduccione->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('reproducciones.edit', $reproduccione->id) }}"><i
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
                    {!! $reproducciones->links() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
