@foreach ($alimentacion as $key => $alimentacion)
    <div class="">
        <div class="form-group">
            <input type="hidden" readonly placeholder="{{ $alimentacion->id_alimentacion }}" class="form-control">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label>Semana:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->Semana }}" class="form-control">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label>Dia 1:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->dia_1 }}" class="form-control">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label>Dia 2:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->dia_2 }}" class="form-control">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label>Dia 3:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->dia_3 }}" class="form-control">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label>Dia 4:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->dia_4 }}" class="form-control">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label>Dia 5:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->dia_5 }}" class="form-control">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label>Dia 6:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->dia_6 }}" class="form-control">
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label>Dia 7:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->dia_7 }}" class="form-control">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Prom Semanal:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->promedio_semanal }}" class="form-control">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Prom Diario:</label>
            <input type="text" readonly placeholder="{{ $alimentacion->promedio_diario }}" class="form-control">
        </div>
    </div>
@endforeach
