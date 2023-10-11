<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('id_faseReproduccion') }}
            {{ Form::select('id_faseReproduccion', $reproducciones->pluck('id', 'id'), $nacimiento->id_faseReproduccion, ['class' => 'form-control' . ($errors->has('id_faseReproduccion') ? ' is-invalid' : ''), 'placeholder' => 'Id Fasereproduccion']) }}
            {!! $errors->first('id_faseReproduccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_Nacimiento') }}
            {{ Form::date('Fecha_Nacimiento', $nacimiento->Fecha_Nacimiento, ['class' => 'form-control' . ($errors->has('Fecha_Nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento', 'id' => 'Fecha_dinamica']) }}
            {!! $errors->first('Fecha_Nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Peso_Promedio') }}
            {{ Form::text('Peso_Promedio', $nacimiento->Peso_Promedio, ['class' => 'form-control' . ($errors->has('Peso_Promedio') ? ' is-invalid' : ''), 'placeholder' => 'Peso Promedio']) }}
            {!! $errors->first('Peso_Promedio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_Porcinos_Total') }}
            {{ Form::text('Cantidad_Porcinos_Total', $nacimiento->Cantidad_Porcinos_Total, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos_Total') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos Total', 'id' => 'total', 'onchange' => 'cantidadesCerdos()']) }}
            {!! $errors->first('Cantidad_Porcinos_Total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_Porcinos_Criales') }}
            {{ Form::text('Cantidad_Porcinos_Criales', $nacimiento->Cantidad_Porcinos_Criales, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos_Criales') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos Criales', 'id' => 'Criales', 'onchange' => 'cantidadesCerdos()']) }}
            {!! $errors->first('Cantidad_Porcinos_Criales', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_Porcinos_Reproductores') }}
            {{ Form::text('Cantidad_Porcinos_Reproductores', $nacimiento->Cantidad_Porcinos_Reproductores, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos_Reproductores') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos Reproductores', 'id' => 'reproductores', 'onchange' => 'cantidadesCerdos()']) }}
            {!! $errors->first('Cantidad_Porcinos_Reproductores', '<div class="invalid-feedback">:message</div>') !!}<!-- 'onkeyup' => 'prueba()',-->
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" id="btn-registrar" style="display: none" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
            Registrar Reproductor
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro Reproductor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="box box-info padding-1">
                            <div class="box-body">
                                <form method="POST" action="{{ route('reproductores.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        {{ Form::label('id') }}
                                        {{ Form::text('id', $reproductore->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Id Repro']) }}
                                        {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Raza') }}
                                        {{ Form::text('Raza', $reproductore->Raza, ['class' => 'form-control' . ($errors->has('Raza') ? ' is-invalid' : ''), 'placeholder' => 'Raza']) }}
                                        {!! $errors->first('Raza', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Genero') }}
                                        {{ Form::select('Genero', ['Macho' => 'Macho', 'Hembra' => 'Hembra'], $reproductore->Genero, ['class' => 'form-control' . ($errors->has('Genero') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el Género']) }}
                                        {!! $errors->first('Genero', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Peso') }}
                                        {{ Form::text('Peso', $reproductore->Peso, ['class' => 'form-control' . ($errors->has('Peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
                                        {!! $errors->first('Peso', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Porcino_Macho') }}
                                        {{ Form::text('Porcino_Macho', $reproductore->Porcino_Macho, ['class' => 'form-control' . ($errors->has('Porcino_Macho') ? ' is-invalid' : ''), 'placeholder' => 'Porcino Macho']) }}
                                        {!! $errors->first('Porcino_Macho', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Porcino_Hembra') }}
                                        {{ Form::text('Porcino_Hembra', $reproductore->Porcino_Hembra, ['class' => 'form-control' . ($errors->has('Porcino_Hembra') ? ' is-invalid' : ''), 'placeholder' => 'Porcino Hembra']) }}
                                        {!! $errors->first('Porcino_Hembra', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Fecha_nacimiento') }}
                                        {{ Form::date('Fecha_nacimiento', $reproductore->Fecha_nacimiento, ['class' => 'form-control' . ($errors->has('Fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
                                        {!! $errors->first('Fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </form>

                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_Porcinos_Muertos') }}
            {{ Form::text('Cantidad_Porcinos_Muertos', $nacimiento->Cantidad_Porcinos_Muertos, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos_Muertos') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos Muertos', 'id' => 'muertos', 'onchange' => 'cantidadesCerdos()']) }}
            {!! $errors->first('Cantidad_Porcinos_Muertos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" id="submit1" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
