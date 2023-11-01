@extends('layouts.app')

@section('template_title')
    Alimentacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Alimentacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('alimentacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
										<th>Id Alimentacion</th>
										<th>Promedio Semanal</th>
										<th>Promedio Diario</th>
										<th>Semana</th>
										<th>Dia 1</th>
										<th>Dia 2</th>
										<th>Dia 3</th>
										<th>Dia 4</th>
										<th>Dia 5</th>
										<th>Dia 6</th>
										<th>Dia 7</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alimentacions as $alimentacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $alimentacion->id_alimentacion }}</td>
											<td>{{ $alimentacion->promedio_semanal }}</td>
											<td>{{ $alimentacion->promedio_diario }}</td>
											<td>{{ $alimentacion->Semana }}</td>
											<td>{{ $alimentacion->dia_1 }}</td>
											<td>{{ $alimentacion->dia_2 }}</td>
											<td>{{ $alimentacion->dia_3 }}</td>
											<td>{{ $alimentacion->dia_4 }}</td>
											<td>{{ $alimentacion->dia_5 }}</td>
											<td>{{ $alimentacion->dia_6 }}</td>
											<td>{{ $alimentacion->dia_7 }}</td>

                                            <td>
                                                <form action="{{ route('alimentacions.destroy',$alimentacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('alimentacions.show',$alimentacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('alimentacions.edit',$alimentacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $alimentacions->links() !!}
            </div>
        </div>
    </div>
@endsection
