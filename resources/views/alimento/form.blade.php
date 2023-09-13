<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('Nombre', $alimento->Nombre, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Marca') }}
                    {{ Form::text('Marca', $alimento->Marca, ['class' => 'form-control' . ($errors->has('Marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
                    {!! $errors->first('Marca', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Precio') }}
                    {{ Form::text('Precio', $alimento->Precio, ['class' => 'form-control' . ($errors->has('Precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                    {!! $errors->first('Precio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('Cantidad', $alimento->Cantidad, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Descripción') }}
                    {{ Form::text('Descripción', $alimento->Descripción, ['class' => 'form-control' . ($errors->has('Descripción') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
                    {!! $errors->first('Descripción', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('etapa_alimento_id') }}
                    {{ Form::text('etapa_alimento_id', $alimento->etapa_alimento_id, ['class' => 'form-control' . ($errors->has('etapa_alimento_id') ? ' is-invalid' : ''), 'placeholder' => 'Etapa Alimento Id']) }}
                    {!! $errors->first('etapa_alimento_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button style="margin-top: 10px" type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
