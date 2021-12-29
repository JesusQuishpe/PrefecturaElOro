<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enfermeria</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/errors.css') }}" rel="stylesheet">
</head>

<body>
    @include('enfermeria.modal');
    <div class="container">
        <h1 class="title text-center">Enfermería</h1>
        <div id="content">
            <div id="alerta" class="d-none"></div>
            <table id="tb-enfermeria" class="table">
                <thead class="table-dark text-center">
                    <tr>
                        <th>N° Cita</th>
                        <th>Nombres</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Sexo</th>
                        <th>Area</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    

                </tbody>
            </table>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}" type="module"></script>
    <script src="{{ asset('js/enfermeria.js') }}" type="module"></script>
</body>

</html>
{{--
    @if (isset($datos))
                        @foreach ($datos as $dato)
                            <tr class="table-light text-center align-middle">
                                <td scope="row">{{$dato->id_cita}}</td>
                                <td>{{$dato->nombre_completo}}</td>
                                <td>{{$dato->fecha_nacimiento}}</td>
                                <td>{{$dato->sexo}}</td>
                                <td>{{$dato->area}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-primary me-2" 
                                            data-id="{{$dato->id_enfermeria}}"
                                            area="{{$dato->area}}" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modal-enf-nuevo">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-danger">No hay datos que mostrar</div>
                    @endif--}}
