<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Raza') }}
            {{ Form::text('Raza', $porcino->Raza, ['class' => 'form-control' . ($errors->has('Raza') ? ' is-invalid' : ''), 'placeholder' => 'Raza']) }}
            {!! $errors->first('Raza', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Genero') }}
            {{ Form::text('Genero', $porcino->Genero, ['class' => 'form-control' . ($errors->has('Genero') ? ' is-invalid' : ''), 'placeholder' => 'Genero']) }}
            {!! $errors->first('Genero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Peso') }}
            {{ Form::text('Peso', $porcino->Peso, ['class' => 'form-control' . ($errors->has('Peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
            {!! $errors->first('Peso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('Descripción', $porcino->Descripción, ['class' => 'form-control' . ($errors->has('Descripción') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('Descripción', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>