<!-- documento que se convierte a pdf -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        @import url('https://fonts.googleapis.com/css2? family= Nunito & family= Raleway & display=swap');

        * {
            font-family: 'Raleway', sans-serif;
            color: #727E8C;
            font-size: 15px;
        }

        table {
            text-align: center;
            font-size: 8px;
        }

        th {
            font-size: 14px;
            padding: 8px;
            background-color: #E6E6E6;
            border-bottom: 1px solid #fff;
            color: #727E8C;
            border-right: 1px solid transparent;
        }

        td {
            font-size: 13px;
            padding: 8px;
            background-color: #e6e6e652;
            border-bottom: 1px solid #fff;
            color: #7D8992;
            border-top: 1px solid transparent;
            border-right: solid 1px transparent;
        }

        .center {
            text-align: center;
        }
    </style>

</head>

<body>
    <p>Fecha y hora : {{ now()->format('d/m/Y H:i:s') }}</p>
    <table>
        <thead>
            <tr style="text-align: center">
                <th style="background-color:transparent"><img src="{{ public_path('assets/img/LOGO-3.png') }}"
                        style="width: 155px; height: 120px;"></th>
                <th style="width: 400px;background-color:transparent">
                    <p style="font-size: 25px">REPORTE ETAPA LOTE</p>
                </th>

            </tr>
        </thead>
    </table>
    <br>
    <div class="center">
        <table class='table table-striped line' id="table1">
            <thead class="thead line" style="width: 1500px">
                <tr class="line">
                    <th class="line">No</th>
                    <th>Nombre</th>
                    <th>Etapa</th>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th>Peso Inicial</th>
                    <th>Peso Final</th>
                    <th>Cantidad Inicial</th>
                    <th>Cantidad Final</th>
                    <th>Muertes Totales</th>
                </tr>
            </thead>
            <tbody class="line">
                @foreach ($etapaLotes as $key => $etapaLote)
                    <tr class="line">
                        <td>{{ ++$key }}</td>
                        <td>{{ $etapaLote->Nombre }}</td>
                        <td>{{ $etapaLote->id_etapa }}</td>
                        <td>{{ $etapaLote->Fecha_inicial }}</td>
                        <td>{{ $etapaLote->Fecha_final }}</td>
                        <td>{{ $etapaLote->Peso_inicial }}</td>
                        <td>{{ $etapaLote->Peso_final }}</td>
                        <td>{{ $etapaLote->Cantidad_inicial }}</td>
                        <td>{{ $etapaLote->Cantidad_final }}</td>
                        <td>{{ $etapaLote->Muertes_totales }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>


</html>
