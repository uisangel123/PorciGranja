<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $corrale->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('granjas_id', 'Seleccione una Granja') }}
            <select name="granjas_id" id="granjas_id" class=" form-select{{ $errors->has('granjas_id') ? ' is-invalid' : '' }}">
                <option value="">Seleccione La Granja</option>
                @foreach ($granjas as $granja)
                    <option value="{{ $granja['id'] }}">{{ $granja['nombre'] }}</option>
                @endforeach
            </select>
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