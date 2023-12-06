@extends('layouts.app')

@section('template_title')
    Alimento
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
                                    {{ __('Alimento') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('alimento.pdf') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        <i class="fa-solid fa-file-pdf"></i> Reporte General Pdf
                                    </a>
                                    <a href="{{ route('alimentos.create') }}" class="btn btn-primary btn-sm float-right"
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
                                <table class="table table-striped table-hover datatable">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Nombre</th>
                                            <th>Marca</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Descripción</th>
                                            <th>Etapa Alimento</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alimentos as $alimento)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $alimento->Nombre }}</td>
                                                <td>{{ $alimento->Marca }}</td>
                                                <td>{{ $alimento->Precio }}</td>
                                                <td>{{ $alimento->Cantidad }}</td>
                                                <td>{{ $alimento->Descripción }}</td>
                                                <td>{{ $alimento->etapa_alimento_id }}</td>

                                                <td>
                                                    <form action="{{ route('alimentos.destroy', $alimento->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('alimentos.show', $alimento->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i>Detalles</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('alimentos.edit', $alimento->id) }}"><i
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
                    {!! $alimentos->links() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
