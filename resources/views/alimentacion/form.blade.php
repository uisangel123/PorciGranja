<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            @if (Request::route()->getName() == 'alimentacion.create')
                <div class="form-group">
                    {{ Form::hidden('id_alimentacion', $alimentacion->id_alimentacion, ['class' => 'form-control' . ($errors->has('id_alimentacion') ? ' is-invalid' : ''), 'placeholder' => 'Id Alimentacion']) }}
                    {!! $errors->first('id_alimentacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('Semana') }}
                        {{ Form::text('Semana[]', $alimentacion->Semana, ['class' => 'form-control' . ($errors->has('Semana') ? ' is-invalid' : ''), 'placeholder' => 'Semana']) }}
                        {!! $errors->first('Semana', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_1') }}
                        {{ Form::text('dia_1[]', $alimentacion->dia_1, ['class' => 'form-control' . ($errors->has('dia_1') ? ' is-invalid' : ''), 'placeholder' => 'Dia 1', 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_2') }}
                        {{ Form::text('dia_2[]', $alimentacion->dia_2, ['class' => 'form-control' . ($errors->has('dia_2') ? ' is-invalid' : ''), 'placeholder' => 'Dia 2', 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_2', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_3') }}
                        {{ Form::text('dia_3[]', $alimentacion->dia_3, ['class' => 'form-control' . ($errors->has('dia_3') ? ' is-invalid' : ''), 'placeholder' => 'Dia 3', 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_3', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_4') }}
                        {{ Form::text('dia_4[]', $alimentacion->dia_4, ['class' => 'form-control' . ($errors->has('dia_4') ? ' is-invalid' : ''), 'placeholder' => 'Dia 4', 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_4', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_5') }}
                        {{ Form::text('dia_5[]', $alimentacion->dia_5, ['class' => 'form-control' . ($errors->has('dia_5') ? ' is-invalid' : ''), 'placeholder' => 'Dia 5', 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_5', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_6') }}
                        {{ Form::text('dia_6[]', $alimentacion->dia_6, ['class' => 'form-control' . ($errors->has('dia_6') ? ' is-invalid' : ''), 'placeholder' => 'Dia 6', 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_6', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_7') }}
                        {{ Form::text('dia_7[]', $alimentacion->dia_7, ['class' => 'form-control' . ($errors->has('dia_7') ? ' is-invalid' : ''), 'placeholder' => 'Dia 7', 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_7', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('prom_semanal') }}
                        {{ Form::text('promedio_semanal[]', $alimentacion->promedio_semanal, ['class' => 'form-control' . ($errors->has('promedio_semanal') ? ' is-invalid' : ''), 'placeholder' => 'Promedio Semanal', 'readonly']) }}
                        {!! $errors->first('promedio_semanal', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('prom_diario') }}
                        {{ Form::text('promedio_diario[]', $alimentacion->promedio_diario, ['class' => 'form-control' . ($errors->has('promedio_diario') ? ' is-invalid' : ''), 'placeholder' => 'Promedio Diario', 'readonly']) }}
                        {!! $errors->first('promedio_diario', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
        </div>
    </div>
</div>
@elseif (Request::route()->getName() == 'alimentacion.edit')
@foreach ($alimentacion as $key => $alimentacion)
    <div class="box box-info padding-1">
        <div class="box-body">
            <main class="row itemDiv {{ $alimentacion->id }}">
                <div class="form-group row">
                    {{ Form::hidden('id_alimentacion', $alimentacion->id_alimentacion, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('id_alimentacion') ? ' is-invalid' : ''), 'placeholder' => 'Id Alimentacion', 'id' => $alimentacion->id]) }}
                    {!! $errors->first('id_alimentacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('Semana') }}
                        {{ Form::text('Semana[]', $alimentacion->Semana, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('Semana') ? ' is-invalid' : ''), 'placeholder' => 'Semana', 'id' => $alimentacion->id]) }}
                        {!! $errors->first('Semana', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_1') }}
                        {{ Form::text('dia_1[]', $alimentacion->dia_1, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('dia_1') ? ' is-invalid' : ''), 'placeholder' => 'Dia 1', 'id' => $alimentacion->id, 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_2') }}
                        {{ Form::text('dia_2[]', $alimentacion->dia_2, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('dia_2') ? ' is-invalid' : ''), 'placeholder' => 'Dia 2', 'id' => $alimentacion->id, 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_2', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_3') }}
                        {{ Form::text('dia_3[]', $alimentacion->dia_3, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('dia_3') ? ' is-invalid' : ''), 'placeholder' => 'Dia 3', 'id' => $alimentacion->id, 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_3', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_4') }}
                        {{ Form::text('dia_4[]', $alimentacion->dia_4, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('dia_4') ? ' is-invalid' : ''), 'placeholder' => 'Dia 4', 'id' => $alimentacion->id, 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_4', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_5') }}
                        {{ Form::text('dia_5[]', $alimentacion->dia_5, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('dia_5') ? ' is-invalid' : ''), 'placeholder' => 'Dia 5', 'id' => $alimentacion->id, 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_5', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_6') }}
                        {{ Form::text('dia_6[]', $alimentacion->dia_6, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('dia_6') ? ' is-invalid' : ''), 'placeholder' => 'Dia 6', 'id' => $alimentacion->id, 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_6', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('dia_7') }}
                        {{ Form::text('dia_7[]', $alimentacion->dia_7, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('dia_7') ? ' is-invalid' : ''), 'placeholder' => 'Dia 7', 'id' => $alimentacion->id, 'oninput' => 'calcularPromedioDiario(this)']) }}
                        {!! $errors->first('dia_7', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('prom_semanal') }}
                        {{ Form::text('promedio_semanal[]', $alimentacion->promedio_semanal, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('promedio_semanal') ? ' is-invalid' : ''), 'placeholder' => 'Promedio Semanal', 'id' => $alimentacion->id, 'readonly']) }}
                        {!! $errors->first('promedio_semanal', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('prom_diario') }}
                        {{ Form::text('promedio_diario[]', $alimentacion->promedio_diario, ['class' => 'form-control item' .$alimentacion->id . ($errors->has('promedio_diario') ? ' is-invalid' : ''), 'placeholder' => 'Promedio Diario', 'id' => $alimentacion->id, 'readonly']) }}
                        {!! $errors->first('promedio_diario', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::hidden('id[]', $alimentacion->id, ['class' => 'form-control inputNumerico' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'P Aire', 'id' => $alimentacion->id]) }}
                    <p><small class="text-muted" style="visibility: hidden"></small></p>
                    {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </main>
        </div>
    </div>
@endforeach
@endif
<div class="row">
    <div id="dinamico"></div> 
    <div class="col-md-1">
        <button class="btn btn-primary" type="button" id="agregarSemana"
            style="font-size: 10px; margin-top: 20px">Añadir
            semana</button>
    </div>
</div>
<br>
<br>
<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary xd">{{ __('Submit') }}</button>
</div>
@if(Request::route()->getName() == 'alimentacion.edit')
<div class="custom-select">
    <label for="confirmacion" style="font-size: 13px; margin-bottom: -5px">¿El proceso editado llegó a su fin?</label>
    <label for="confirmacion" style="font-size: 13px">Si escoge Sí, se finalizara por completo*</label>
    <div class="select-wrapper">
        <select name="confirmacion12" id="confirmacion12">
            <option value="0">No</option>
            <option value="1">Sí</option>
        </select>
    </div>
</div>
@endif
