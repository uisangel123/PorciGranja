<div class="box box-info padding-1">
    <div class="box-body">

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
            {{ Form::select('Porcino_Macho',$reproductoreMacho->pluck('id','id'), $reproductore->Porcino_Macho, ['class' => 'form-control' . ($errors->has('Porcino_Macho') ? ' is-invalid' : ''), 'placeholder' => 'Porcino Macho']) }}
            {!! $errors->first('Porcino_Macho', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Porcino_Hembra') }}
            {{ Form::select('Porcino_Hembra',$reproductoreHembra->pluck('id','id'), $reproductore->Porcino_Hembra, ['class' => 'form-control' . ($errors->has('Porcino_Hembra') ? ' is-invalid' : ''), 'placeholder' => 'Porcino Hembra']) }}
            {!! $errors->first('Porcino_Hembra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_nacimiento') }}
            {{ Form::date('Fecha_nacimiento', $reproductore->Fecha_nacimiento, ['class' => 'form-control' . ($errors->has('Fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento', 'id' => 'Fecha_dinamica']) }}
            {!! $errors->first('Fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
