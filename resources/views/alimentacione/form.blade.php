<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group">
                {{ Form::label('id_lote') }}
                {{ Form::select('id_lote',$lote->pluck('Nombre','id'), $alimentacione->id_lote, ['class' => 'form-control' . ($errors->has('id_lote') ? ' is-invalid' : ''), 'placeholder' => 'Id Lote', 'id' => 'lotes']) }}
                {!! $errors->first('id_lote', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6">
                <label for="">Nombre Etapa</label>
                <input type="text" readonly placeholder="Nombre Etapa" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">Id Etapa</label>
                <input type="text" readonly placeholder="Id Etapa" class="form-control">
            </div>
            {{-- <textarea placeholder="{{$etapa}}" name="" id="" cols="30" rows="10"></textarea> --}}
        </div>
    </div>
</div>
