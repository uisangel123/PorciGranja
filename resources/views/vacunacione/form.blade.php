<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $vacunacione->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_lote_vacunación') }}
            {{ Form::text('id_lote_vacunación', $vacunacione->id_lote_vacunación, ['class' => 'form-control' . ($errors->has('id_lote_vacunación') ? ' is-invalid' : ''), 'placeholder' => 'Id Lote Vacunación']) }}
            {!! $errors->first('id_lote_vacunación', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_Vacunación') }}
            {{ Form::text('Fecha_Vacunación', $vacunacione->Fecha_Vacunación, ['class' => 'form-control' . ($errors->has('Fecha_Vacunación') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Vacunación']) }}
            {!! $errors->first('Fecha_Vacunación', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>