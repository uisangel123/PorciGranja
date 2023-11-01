<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('Nombre', $etapaLote->Nombre, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('id_lote') }}
                    {{ Form::select('id_lote', $lotes->pluck('Nombre', 'id'), $etapaLote->id_lote, ['class' => 'form-control' . ($errors->has('id_lote') ? ' is-invalid' : ''), 'placeholder' => 'Id Lote']) }}
                    {!! $errors->first('id_lote', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="form-group">
                    {{ Form::label('id_corral') }}
                    {{ Form::select('id_corral', $corrales->pluck('name', 'id'), $etapaLote->id_corral, ['class' => 'form-control' . ($errors->has('id_corral') ? ' is-invalid' : ''), 'placeholder' => 'Id Corral']) }}
                    {!! $errors->first('id_corral', '<div class="invalid-feedback">:message</div>') !!}
                </div> --}}
                <div class="form-group">
                    {{ Form::label('id_etapa') }}
                    {{ Form::select('id_etapa', $etapas->pluck('Nombre', 'id'), $etapaLote->id_etapa, ['class' => 'form-control' . ($errors->has('id_etapa') ? ' is-invalid' : ''), 'placeholder' => 'Id Etapa']) }}
                    {!! $errors->first('id_etapa', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Fecha_inicial') }}
                    {{ Form::date('Fecha_inicial', $etapaLote->Fecha_inicial, ['class' => 'form-control' . ($errors->has('Fecha_inicial') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicial', 'id' => 'Fecha_dinamica']) }}
                    {!! $errors->first('Fecha_inicial', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Fecha_final') }}
                    {{ Form::date('Fecha_final', $etapaLote->Fecha_final, ['class' => 'form-control' . ($errors->has('Fecha_final') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Final']) }}
                    {!! $errors->first('Fecha_final', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Peso_inicial') }}
                    {{ Form::text('Peso_inicial', $etapaLote->Peso_inicial, ['class' => 'form-control' . ($errors->has('Peso_inicial') ? ' is-invalid' : ''), 'placeholder' => 'Peso Inicial']) }}
                    {!! $errors->first('Peso_inicial', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Peso_final') }}
                    {{ Form::text('Peso_final', $etapaLote->Peso_final, ['class' => 'form-control' . ($errors->has('Peso_final') ? ' is-invalid' : ''), 'placeholder' => 'Peso Final']) }}
                    {!! $errors->first('Peso_final', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Cantidad_inicial') }}
                    {{ Form::text('Cantidad_inicial', $etapaLote->Cantidad_inicial, ['class' => 'form-control' . ($errors->has('Cantidad_inicial') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Inicial']) }}
                    {!! $errors->first('Cantidad_inicial', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Cantidad_final') }}
                    {{ Form::text('Cantidad_final', $etapaLote->Cantidad_final, ['class' => 'form-control' . ($errors->has('Cantidad_final') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Final']) }}
                    {!! $errors->first('Cantidad_final', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Muertes_totales') }}
                    {{ Form::text('Muertes_totales', $etapaLote->Muertes_totales, ['class' => 'form-control' . ($errors->has('Muertes_totales') ? ' is-invalid' : ''), 'placeholder' => 'Muertes Totales']) }}
                    {!! $errors->first('Muertes_totales', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Porcentaje_Mortalidad') }}
                    {{ Form::text('Porcentaje_Mortalidad', $etapaLote->Porcentaje_Mortalidad, ['class' => 'form-control' . ($errors->has('Porcentaje_Mortalidad') ? ' is-invalid' : ''), 'placeholder' => 'Porcentaje Mortalidad']) }}
                    {!! $errors->first('Porcentaje_Mortalidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('id_alimento') }}
                    {{ Form::select('id_alimento', $alimentos->pluck('Nombre', 'id'), $etapaLote->id_alimento, ['class' => 'form-control' . ($errors->has('id_alimento') ? ' is-invalid' : ''), 'placeholder' => 'Id Alimento']) }}
                    {!! $errors->first('id_alimento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Observaciones') }}
                    {{ Form::text('Observaciones', $etapaLote->Observaciones, ['class' => 'form-control' . ($errors->has('Observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                    {!! $errors->first('Observaciones', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button style="margin-top: 10px" type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
