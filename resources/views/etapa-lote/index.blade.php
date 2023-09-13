@extends('layouts.app')

@section('template_title')
    Etapa Lote
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
                                {{ __('Etapa Lote') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('etapa-lotes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Fecha Inicial</th>
										<th>Fecha Final</th>
										<th>Peso Inicial</th>
										<th>Peso Final</th>
										<th>Cantidad Inicial</th>
										<th>Cantidad Final</th>
										<th>Muertes Totales</th>
										<th>Porcentaje Mortalidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($etapaLotes as $etapaLote)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $etapaLote->Nombre }}</td>
											<td>{{ $etapaLote->Fecha_inicial }}</td>
											<td>{{ $etapaLote->Fecha_final }}</td>
											<td>{{ $etapaLote->Peso_inicial }}</td>
											<td>{{ $etapaLote->Peso_final }}</td>
											<td>{{ $etapaLote->Cantidad_inicial }}</td>
											<td>{{ $etapaLote->Cantidad_final }}</td>
											<td>{{ $etapaLote->Muertes_totales }}</td>
											<td>{{ $etapaLote->Porcentaje_Mortalidad }}</td>

                                            <td>
                                                <form action="{{ route('etapa-lotes.destroy',$etapaLote->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('etapa-lotes.show',$etapaLote->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('etapa-lotes.edit',$etapaLote->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @if (auth()->user()->rol === 'admin')
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-fw fa-trash"></i>
                                                                {{ __('Delete') }}</button>
                                                        @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $etapaLotes->links() !!}
            </div>
        </div>
    </div>
</main>
@endsection
