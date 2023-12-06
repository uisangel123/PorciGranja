@extends('layouts.app')

@section('template_title')
    Lote
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
                                    {{ __('Lote') }}
                                </span>

                                <div class="float-right">

                                    <a href="{{ route('lote.pdf') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        <i class="fa-solid fa-file-pdf"></i> Reporte General Pdf
                                    </a>
                                    <a href="{{ route('lotes.create') }}" class="btn btn-primary btn-sm float-right"
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

                                            <th>Nombre</th>
                                            <th>Id Corral</th>
                                            <th>Id Datos</th>
                                            <th>Cantidad Porcinos</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lotes as $lote)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $lote->Nombre }}</td>
                                                <td>{{ $lote->id_corral }}</td>
                                                <td>{{ $lote->id_Datos }}</td>
                                                <td>{{ $lote->Cantidad_Porcinos }}</td>

                                                <td>
                                                    <form action="{{ route('lotes.destroy', $lote->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('lotes.show', $lote->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Detalles</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('lotes.edit', $lote->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {!! $lotes->links() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
