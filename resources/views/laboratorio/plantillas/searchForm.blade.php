<h1 id="tipo_examen_title">{{ $data->title }}</h1>

<form action="{{ route($data->examen . '.' . $data->opcion) }}" method="GET" class="my-4">
    <div class="d-flex justify-content-center align-items-center mb-2">
        <span>Buscar:</span>
        <input class="form-control w-50 mx-2" name="texto" type="text" id="input-buscar" placeholder="Cédula o nombres del paciente"
            value="{{ isset($texto) ? $texto : '' }}">
        <button id="btn-buscar" class="btn btn-primary" type="submit" examen="{{ $data->examen }}">Buscar</button>
    </div>

    <div id="spinner" class="spinner-container">
        <img class="spinner" src="{{ asset('images/gif/spinner.gif') }}" width="48px" height="48px"></img>
        <span>Buscando paciente...</span>
    </div>

    
    @if (isset($ultimaCita))
        @if (is_int($ultimaCita))
            <div class="alert alert-danger" role="alert">
                No hay resultados de la búsqueda!!!
            </div>
        @endif
    @endif


    @isset($datos)
        @if (count($datos) <= 0)
            <div class="alert alert-danger" role="alert">
                No hay resultados de la búsqueda!!!
            </div>
        @endif
    @endisset
</form>

@if ($data->showInfo)
    <h3>Información del paciente</h3>
    <div id="info-container" class="container">

        <div>
            <span>Nombres</span>
            <span id="nombres">{{ isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->nombres : '' }}</span>
        </div>
        <div>
            <span>Apellidos:</span>
            <span id="apellidos">{{ isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->apellidos : '' }}</span>
        </div>
        <div>
            <span>Cédula:</span>
            <span id="cedula">{{ isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->cedula : '' }}</span>
        </div>
        <div>
            <span>Sexo:</span>
            <span id="sexo">{{ isset($ultimaCita) && !is_int($ultimaCita) ? $ultimaCita->sexo : '' }}</span>
        </div>
    </div>
@endif
