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
        <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
        
    </head>
    <body>
        <div class="content">
            <div>
                <h1>ALMACENES DEL PACÍFICO</h1>
            </div><br>
            <div class="container" style="margin-top: 10px;" align="center">
                <div class="card col-md-5">
                    @if(Session::has('error_message'))
                        <div class="alert alert-danger text-center">
                            <span class="glyphicon glyphicon-ok"></span>
                            <em> {!! session('error_message') !!}</em>
                        </div>
                    @endif
                    <div>
                        <h4 style="margin-top: 10px;">Agregar/Actualizar existencia de producto</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('almacen.store') }}">
                            @csrf
                            <div align="left">
                                <label for="nombre" style="color: red; font-size: 12px;">Todos los campos son requeridos</label>
                            </div>
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                                </div>
                                <select class="form-control form-control-sm selectTo role" id="id_existencia" name="id_existencia">
                                    <option selected disabled style="text-align: right">Seleccione un producto</option>
                                        @foreach($existencias as $existencia)
                                            <option value="{{$existencia->id_existencias}}">{{$existencia->sku}}</option>
                                        @endforeach
                                </select>
                            </div><br>
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-box"></i></span>
                                </div>
                                <select class="form-control form-control-sm" id="id_almacen" name="id_almacen">
                                    <option selected disabled>Seleccione un almacen</option>
                                </select>
                            </div><br>
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-plus"></i></span>
                                </div>
                                <input class="form-control form-control-sm" type="number" id="quantity" name="quantity" placeholder="Ingresa una cantidad" required value="{{ old('quantity') }}">
                            </div><br>
                            <div align="center">
                                <button type="submit" id="save" class="btn btn-primary btn-sm" disabled>Guardar</button>
                                <a href="{{ route('home') }}" class="btn btn-sm" style="background-color: #044B59; color: white;">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js')}}" ></script>
    <script src="{{ asset('js/bootstrap.min.js')}}" ></script>
    <script src="{{ asset('plugins/font-awesome/js/all.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            
            $("#id_almacen").prop('disabled', true);
            $("#quantity").prop('disabled', true);
            $("#save").prop('disabled', true);

            $("#id_existencia").change(function(){
                $("#id_almacen").empty();

                var id_producto = $(this).val();

                $.ajax({
                    url: 'get-data-almacenes/'+id_producto,
                    type: 'get',
                    dataType: 'json',
                    success: function (response) {
                        $.each(response, function (index, value) {
                            $('#id_almacen').append("<option value='" + value.id_almacen + "'>" + value.nombre_almacen + "</option>");
                        });
                    }
                });
                $("#id_almacen").prop('disabled', false);
                $("#quantity").prop('disabled', false);
                $("#save").prop('disabled', false);
            });
        });
    </script>
</html>
