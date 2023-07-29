<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $corrale->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('granjas_id') }}
            {{ Form::text('granjas_id', $corrale->granjas_id, ['class' => 'form-control' . ($errors->has('granjas_id') ? ' is-invalid' : ''), 'placeholder' => 'Granjas Id']) }}
            {!! $errors->first('granjas_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('disponibilidad') }}
            {{ Form::text('disponibilidad', $corrale->disponibilidad, ['class' => 'form-control' . ($errors->has('disponibilidad') ? ' is-invalid' : ''), 'placeholder' => 'Disponibilidad']) }}
            {!! $errors->first('disponibilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>