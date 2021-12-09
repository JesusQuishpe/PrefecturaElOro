<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enfermeria</title>
    <link rel="stylesheet" href="{{ asset('scss/enfermeria/enfermeria.css') }}">
</head>

<body>
    @include('enfermeria.modal');
    <div class="main">
        <div class="container">
            <h1 class="title" align="center">Enfermería</h1>
            <div id="content">
                @csrf
                <table class="tb-enfermeria" id="tb-enfermeria">
                    <thead>
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
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/enfermeria.js') }}" type="module"></script>
</body>

</html>