<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 16px;
            }

            .content {
                margin: 0 auto;
            }

            table {
                border: none;
            }

            .logo {
                width: 200px;
                height: auto;
            }

            .head {
                background-color: #5e86b9;
            }

            .info {
                background-color: #b9bcbe;
            }

            .padding {
                padding: :10px;
            }

            .text-white {
                color: white;
            }

            .text-center {
                text-align: center;
            }

            .text-lg {
                font-size: 18px;
            }

            .uppercase {
                text-transform: uppercase;
            }
        </style>

    </head>
    <body>
        <table class="content">
            <tr>
                <td class="bg-blue-400">
                    <table class="" cellspacing="0" cellpadding="0">
                        <tr class="head">
                            <td class="padding"><img src="{{asset('images/logo.png')}}" class="logo"/></td>

                            <td class="padding text-white" colspan="3">
                                <h3 class="text-2xl">Tarjeta de embarque</h3>
                                <h4>Grupo {{ rand(1, 3) }}</h4>
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <h4 class="uppercase">Nombre</h4>
                                <p class="uppercase text-lg">{{ $ticket->passenger_name }}</p>
                            </td>
                            <td>
                                <h4 class="uppercase">Teléfono</h4>
                                <p class="uppercase text-lg">{{ $ticket->passenger_phone }}</p>
                            </td>
                        </tr>
                        <tr class="info">
                            <td class="padding">
                                <h4 class="uppercase">Tarifa</h4>
                                <p class="uppercase text-lg">{{ $ticket->type }}</p>
                            </td>
                            <td>
                                <h4 class="uppercase">Origen</h4>
                                <p class="uppercase text-lg">{{ $ticket->flight->origin->city->name }}</p>
                            </td>
                            <td>
                                <h4 class="uppercase">Destino</h4>
                                <p class="uppercase text-lg">{{ $ticket->flight->destination->city->name }}</p>
                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr class="info">
                            <td class="padding">
                                <h4 class="uppercase">Fecha</h4>
                                <p class="uppercase text-lg">{{ DateHelper::beautify($ticket->flight->departure_time, 'weekday_month_year') }}</p>
                            </td>
                            <td>
                                <h4 class="uppercase">Hora</h4>
                                <p class="uppercase text-lg">{{ DateHelper::beautify($ticket->flight->departure_time, 'time') }}</p>
                            </td>
                            <td>
                                <h4 class="uppercase">Asiento</h4>
                                <p class="uppercase text-lg">{{ $ticket->seat }}</p>
                            </td>
                            <td class="padding">
                                <h4 class="uppercase">Vuelo</h4>
                                <p class="uppercase text-lg">{{ $ticket->flight->name }}</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="padding"></td>
            </tr>
            <tr>
                <td class="padding" colspan="3">
                    <center><img src="data:image/png;base64, {!! base64_encode(QrCode::size(150)->format('png')->generate($ticket->reservation_code)) !!}"></center>
                    <h4 class="text-center">{{ $ticket->reservation_code }}</h4>
                    <h5 class="text-center">Tu vuelo tiene una duración de {{ $ticket->flight->duration }} minutos.</h5>
                </td>
            </tr>
        </table>
    </body>
</html>
