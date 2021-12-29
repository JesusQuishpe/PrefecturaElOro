<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="title text-center">Sistema de consultas de pacientes</h1>
        <table class="table">
            <thead class="table-dark text-center">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Peso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                <tr class="text-center align-middle">
                    <td>{{$paciente->id_cita}}</td>
                    <td>{{$paciente->nombre_completo}}</td>
                    <td>{{$paciente->fecha_nacimiento}}</td>
                    <td>{{$paciente->peso}}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary" href="javascript:void(0);" data-id="{{ $paciente->id}}">Editar</a>
                            <a class="btn btn-primary mx-2" target="_blank" href="../ReportesPDF.php">imprimir</a>
                            <a class="btn btn-danger" href="javascript:void(0);" data-id="{{ $paciente->id}}">Borrar</a>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    
    
</body>
</html>