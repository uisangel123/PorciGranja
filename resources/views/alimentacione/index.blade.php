@extends('layouts.app')

@section('template_title')
    Alimentacione
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
                                    {{ __('Alimentacione') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('alimentacion.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Create New') }}
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

                                            <th>Id Lote</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alimentaciones as $alimentacione)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $alimentacione->id_lote }}</td>

                                                <td>
                                                    <form action="{{ route('alimentacion.destroy', $alimentacione->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('alimentacion.show', $alimentacione->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('alimentacion.edit', $alimentacione->id) }}"><i
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
                    {!! $alimentaciones->links() !!}
                </div>
            </div>
        </div>
    </main>
@endsection
