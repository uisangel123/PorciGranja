<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('name') }}
                    {{ Form::text('name', $corrale->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('disponibilidad') }}
                    {{ Form::text('disponibilidad', $corrale->disponibilidad, ['class' => 'form-control' . ($errors->has('disponibilidad') ? ' is-invalid' : ''), 'placeholder' => 'Disponibilidad']) }}
                    {!! $errors->first('disponibilidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button style="margin-top: 10px" type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
