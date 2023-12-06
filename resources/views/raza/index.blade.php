@extends('layouts.app')

@section('template_title')
    Raza
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
                                    {{ __('Raza') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('razas.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Crear Nuevo') }}
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
                                            <th>No</th>

                                            <th>Nombre</th>
                                            <th>Descripcion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($razas as $raza)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $raza->Nombre }}</td>
                                                <td>{{ $raza->Descripcion }}</td>

                                                <td>
                                                    <form action="{{ route('razas.destroy', $raza->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('razas.show', $raza->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Detalles') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('razas.edit', $raza->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {!! $razas->links() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
