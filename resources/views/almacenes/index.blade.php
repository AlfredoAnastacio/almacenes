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
                                    <h3> LISTADO DE PRODUCTOS </h3>
                                </div><br>
                            </div><br>
                            <div class="row col-sm-12">
                                <div class="col-sm-4" align="right">
                                    <a class="btn" style="background-color: #044B59; color: white;" href="{{ route('almacen',['id'=>1]) }}"><i class="fas fa-eye"></i> Almacén Físico</a>
                                </div>
                                <div class="col-sm-4" align="right">
                                    <a class="btn" style="background-color: #044B59; color: white;" href="{{ route('almacen',['id'=>2]) }}"><i class="fas fa-box"></i> Almacén Virtual</a>
                                </div>
                                <div class="col-sm-4" align="right">
                                    <a class="btn" style="background-color: #044B59; color: white;"><i class="fas fa-plus"></i> Agregar/modificar</a>
                                </div>
                            </div><br>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr align="center">
                                        <th> SKU </th>
                                        <th> Descripción </th>
                                        <th> Marca </th>
                                        <th> Color </th>
                                        <th> Precio </th>
                                    </tr>
                                </thead>
                                <tbody align="center" id="routesTable">
                                    @if (count($productos) === 0)
                                        <tr>
                                            <td colspan="6" align="center">Sin información para mostrar</td>
                                        </tr>
                                    @else
                                        @foreach($productos as $producto)
                                            <tr>
                                                <td> {{ $producto->sku }}</td>
                                                <td> {{ $producto->descripcion }}</td>
                                                <td> {{ $producto->marca }}</td>
                                                <td> {{ $producto->color }}</td>
                                                <td> {{ $producto->precio }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="clearfix">
                                Mostrando {{ $productos->count() }} registros.
                                {{ $productos->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
