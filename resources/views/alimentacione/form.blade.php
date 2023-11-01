<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group">
                {{ Form::label('id_lote') }}
                {{ Form::select('id_lote',$lote->pluck('Nombre','id'), $alimentacione->id_lote, ['class' => 'form-control' . ($errors->has('id_lote') ? ' is-invalid' : ''), 'placeholder' => 'Id Lote', 'id' => 'lotes']) }}
                {!! $errors->first('id_lote', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('id_Etapa_Lote') }}
                    {{ Form::text('id_Etapa_Lote', $alimentacione->id_Etapa_Lote, ['class' => 'form-control' . ($errors->has('id_Etapa_Lote') ? ' is-invalid' : ''), 'placeholder' => 'Id Etapa Lote']) }}
                    {!! $errors->first('id_Etapa_Lote', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <label for="">Etapa</label>
                <input type="text" readonly placeholder="Etapa" class="form-control">
            </div>
        </div>
    </div>
</div>
