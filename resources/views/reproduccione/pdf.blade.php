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
                <th style="background-color:transparent"><img src="{{public_path('assets/img/pr1.png')}}" style="width: 240px; height: 120px;"></th>
                <th style="width: 400px;background-color:transparent">
                    <p style="font-size: 25px">REPORTE REPRODUCTORES</p>
                </th>

            </tr>
        </thead>
    </table>
    <br>
    <div class="center">
        <table class='table table-striped line' id="table1">
            <thead class="thead line" style="width: 1500px">
                <tr class="line">
                    <th class="line" style="width: 30px;">No</th>
                    <th style="width: 120px;">Porcino Macho</th>
                    <th style="width: 120px;">Porcino Hembra</th>
                    <th style="width: 109px;">Fecha Inicio</th>
                    <th style="width: 109px;">Fecha Final</th>
                    <th style="width: 100px;">Estado</th>
                </tr>
            </thead>
            <tbody class="line">
                @foreach ($reproducciones as $key => $reproduccione)
                    <tr class="line">
                        <td>{{ ++$key }}</td>
                        <td>{{ $reproduccione->id_Porcino_Macho }}</td>
                        <td>{{ $reproduccione->id_Porcino_Hembra }}</td>
                        <td>{{ $reproduccione->Fecha_Inicio }}</td>
                        <td>{{ $reproduccione->Fecha_Final }}</td>
                        <td>{{ $reproduccione->Estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>


</html>


