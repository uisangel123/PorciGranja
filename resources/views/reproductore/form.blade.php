<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('id') }}
                    {{ Form::text('id', $reproductore->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Identificador']) }}
                    {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Fecha_nacimiento') }}
                    {{ Form::date('Fecha_nacimiento', $reproductore->Fecha_nacimiento, ['class' => 'form-control' . ($errors->has('Fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
                    {!! $errors->first('Fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Raza') }}
                    {{ Form::text('Raza', $reproductore->Raza, ['class' => 'form-control' . ($errors->has('Raza') ? ' is-invalid' : ''), 'placeholder' => 'Raza']) }}
                    {!! $errors->first('Raza', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Genero') }}
                    {{ Form::text('Genero', $reproductore->Genero, ['class' => 'form-control' . ($errors->has('Genero') ? ' is-invalid' : ''), 'placeholder' => 'Genero']) }}
                    {!! $errors->first('Genero', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Peso') }}
                    {{ Form::text('Peso', $reproductore->Peso, ['class' => 'form-control' . ($errors->has('Peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
                    {!! $errors->first('Peso', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Procedencia') }}
                    {{ Form::text('Procedencia', $reproductore->Procedencia, ['class' => 'form-control' . ($errors->has('Procedencia') ? ' is-invalid' : ''), 'placeholder' => 'Procedencia']) }}
                    {!! $errors->first('Procedencia', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button style="margin-top: 10px" type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
