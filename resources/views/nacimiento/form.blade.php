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
            {{ Form::text('Cantidad_Porcinos_Total', $nacimiento->Cantidad_Porcinos_Total, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos_Total') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos Total', 'id' => 'total', 'onchange' => 'cantidadesCerdos()', 'onkeypress' => 'return soloNumeros(event,"Cantidad_Porcinos_Muertos")']) }}
            {!! $errors->first('Cantidad_Porcinos_Total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_Porcinos_Criales') }}
            {{ Form::text('Cantidad_Porcinos_Criales', $nacimiento->Cantidad_Porcinos_Criales, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos_Criales') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos Criales', 'id' => 'Criales', 'onchange' => 'cantidadesCerdos()', 'onkeypress' => 'return soloNumeros(event,"Cantidad_Porcinos_Muertos")']) }}
            {!! $errors->first('Cantidad_Porcinos_Criales', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_Porcinos_Reproductores') }}
            {{ Form::text('Cantidad_Porcinos_Reproductores', $nacimiento->Cantidad_Porcinos_Reproductores, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos_Reproductores') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos Reproductores', 'id' => 'reproductores', 'onchange' => 'cantidadesCerdos()', 'onkeypress' => 'return soloNumeros(event,"Cantidad_Porcinos_Muertos")']) }}
            {!! $errors->first('Cantidad_Porcinos_Reproductores', '<div class="invalid-feedback">:message</div>') !!}<!-- 'onkeyup' => 'prueba()',-->
        </div>

        <div class="form-group">
            {{ Form::label('Cantidad_Porcinos_Muertos') }}
            {{ Form::text('Cantidad_Porcinos_Muertos', $nacimiento->Cantidad_Porcinos_Muertos, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos_Muertos') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos Muertos', 'id' => 'muertos', 'onchange' => 'cantidadesCerdos()', 'onkeypress' => 'return soloNumeros(event,"Cantidad_Porcinos_Muertos")']) }}
            {!! $errors->first('Cantidad_Porcinos_Muertos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Cantidad_Porcinos_Vivos') }}
            {{ Form::text('Cantidad_Porcinos_Vivos', $nacimiento->Cantidad_Porcinos_Vivos, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos_Vivos') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos Muertos', 'id' => 'vivos', 'onchange' => 'cantidadesCerdos()', 'onkeypress' => 'return soloNumeros(event,"Cantidad_Porcinos_Muertos")']) }}
            {!! $errors->first('Cantidad_Porcinos_Vivos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Lote destinario') }}
            {{ Form::select('id_lote',$lote->pluck('Nombre','id'), $nacimiento->id_lote, ['class' => 'form-control' . ($errors->has('id_lote') ? ' is-invalid' : ''), 'placeholder' => 'Lote']) }}
            {!! $errors->first('id_lote', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" id="submit1" class="btn btn-primary">Guardar</button>
    </div>
</div>
