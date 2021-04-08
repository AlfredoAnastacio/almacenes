<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/all.min.css') }}">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            table.table td a.settings {
                color: #044B59;
                cursor: pointer;
            }
        </style>
    </head>
    <body>


            <div class="content">
                <div>
                    <h1>ALMACENES DEL PACÍFICO</h1>
                </div><br>
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div align="center">
                                    <h3> LISTADO DE EXISTENCIAS DE PRODUCTOS EN ALMACENES DE TIPO FÍSICO </h3>
                                </div><br>
                            </div><br>
                            <div class="row col-sm-12">
                                <div class="col-sm-12" align="right">
                                    <a class="btn btn-sm" style="background-color: #044B59; color: white;" href="{{ route('home') }}"><i class="fas fa-eye"></i> Regresar</a>
                                </div>
                            </div><br>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr align="center">
                                        <th> Producto </th>
                                        <th> Almacen </th>
                                        <th> Total </th>
                                    </tr>
                                </thead>
                                <tbody align="center" id="routesTable">
                                    @if (count($existencias) === 0)
                                        <tr>
                                            <td colspan="6" align="center">Sin información para mostrar</td>
                                        </tr>
                                    @else
                                        @foreach($existencias as $existencia)
                                            <tr>
                                                <td> {{ $existencia->sku }}</td>
                                                <td> {{ $existencia->nombre_almacen }}</td>
                                                <td> {{ $existencia->total }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
