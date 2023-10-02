<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('id_Porcino_Macho') }}
            {{ Form::select('id_Porcino_Macho', $machosDisponibles->pluck('id', 'id'), $reproduccione->id_Porcino_Macho, ['class' => 'form-control' . ($errors->has('id_Porcino_Macho') ? ' is-invalid' : ''), 'placeholder' => 'Id Porcino Macho']) }}
            {!! $errors->first('id_Porcino_Macho', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_Porcino_Hembra') }}
            {{ Form::select('id_Porcino_Hembra', $hembrasDisponibles->pluck('id', 'id'), $reproduccione->id_Porcino_Hembra, ['class' => 'form-control' . ($errors->has('id_Porcino_Hembra') ? ' is-invalid' : ''), 'placeholder' => 'Id Porcino Hembra']) }}
            {!! $errors->first('id_Porcino_Hembra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_Inicio') }}
            {{ Form::date('Fecha_Inicio', $reproduccione->Fecha_Inicio, ['class' => 'form-control' . ($errors->has('Fecha_Inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio', 'id' => 'Fecha_dinamica']) }}
            {!! $errors->first('Fecha_Inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_Final') }}
            {{ Form::date('Fecha_Final', $reproduccione->Fecha_Final, ['class' => 'form-control' . ($errors->has('Fecha_Final') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Final']) }}
            {!! $errors->first('Fecha_Final', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
