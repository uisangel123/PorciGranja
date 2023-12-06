@extends('layouts.app')

@section('template_title')
    Nacimiento
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
                                    {{ __('Nacimiento') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('nacimientos.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        Crear Nuevo
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success cerrarMensaje alert-dismissible fade show " role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                <span>{{ $message }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Id Reproduccion</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Peso Promedio</th>
                                            <th>Porcinos Totales</th>
                                            <th>Criales</th>
                                            <th>Reproductores</th>
                                            <th>Muertos</th>
                                            <th>Vivos</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nacimientos as $nacimiento)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $nacimiento->id_faseReproduccion }}</td>
                                                <td>{{ $nacimiento->Fecha_Nacimiento }}</td>
                                                <td>{{ $nacimiento->Peso_Promedio }}</td>
                                                <td>{{ $nacimiento->Cantidad_Porcinos_Total }}</td>
                                                <td>{{ $nacimiento->Cantidad_Porcinos_Criales }}</td>
                                                <td>{{ $nacimiento->Cantidad_Porcinos_Reproductores }}</td>
                                                <td>{{ $nacimiento->Cantidad_Porcinos_Muertos }}</td>
                                                <td>{{ $nacimiento->Cantidad_Porcinos_Vivos }}</td>

                                                <td>
                                                    <form action="{{ route('nacimientos.destroy', $nacimiento->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('nacimientos.show', $nacimiento->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i>Detalles</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('nacimientos.edit', $nacimiento->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i>Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i>Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {!! $nacimientos->links() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
