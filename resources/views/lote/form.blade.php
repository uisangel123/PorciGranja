<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('Nombre', $lote->Nombre, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('id_corral', 'Selecciones un Corral') }}
                    <select name="id_corral" id="id_corral"
                        class=" form-control{{ $errors->has('id_corral') ? ' is-invalid' : '' }}">
                        <option value="">Seleccione un Corral</option>
                        @foreach ($corrales as $corral)
                            <option value="{{ $corral['id'] }}">{{ $corral['name'] }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('id_corral', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    {{ Form::label('id_Datos', 'Selecciones una Piara') }}
                    <select name="id_Datos" id="id_Datos"
                        class=" form-control{{ $errors->has('id_Datos') ? ' is-invalid' : '' }} select-dinamico">
                        <option value="">Seleccione una Piara</option>
                        @foreach ($datos as $dato)
                            <option value="{{ $dato['id'] }}">{{ $dato['id'] }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('id_Datos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group" id="dinamicoDatos"></div>
            </div>
            <div class="col-md-4" style="display: flex; justify-content: center; align-items: center">
                <button class="btn btn-primary" id="agregarDatos" type="button">Agregar otra piara</button>
            </div>
            <div class="form-group">
                {{ Form::label('Cantidad_Porcinos') }}
                {{ Form::text('Cantidad_Porcinos', $lote->Cantidad_Porcinos, ['class' => 'form-control' . ($errors->has('Cantidad_Porcinos') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Porcinos', 'id' => 'cantidad']) }}
                {!! $errors->first('Cantidad_Porcinos', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
