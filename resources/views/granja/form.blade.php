<div class="box box-info padding-1">
    <div class="box-body">
      <div class="row" style=" padding: 20px">
        <div class="col-6">
          <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $granja->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $granja->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
      </div>
    </div>
    <div class="box-footer mt20" style="padding: 10px">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>




