<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb939f18a3.js" crossorigin="anonymous"></script>
    <title>Odontología</title>
    <link rel="stylesheet" href="{{ asset('scss/odontologia/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('scss/odontologia/odontograma.css') }}">

</head>

<body>
    <div id="loader-animation">
        <div class="loader-content">
            <div class="loaders">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="loader-text">
                <span>Guardando ficha</span>
            </div>
        </div>
    </div>
    <input id="idOdo" type="hidden" value="{{$idOdo}}">
    <input id="cedula" type="hidden" value="{{$datos->cedula}}">
    <!--Modals-->
    <div id="modal-principal" class="modal-container">
        <div class="modal-background">
            <div class="modal">
                <div class="modal-head">
                    <h2>Principal</h2>
                </div>
                <div class="modal-body">
                    <div class="body-row">
                        <span>Fecha:</span>
                        <input type="datetime-local" id="input-fecha">
                    </div>
                    <div class="body-row">
                        <span>Rango edad:</span>
                        <select name="" id="sel-rango">
                            <option>Menor de 1 año</option>
                            <option>1-4 años</option>
                            <option>5-9 años programado</option>
                            <option>5-14 años no programado</option>
                            <option>15-19 años</option>
                            <option>20-34 años</option>
                            <option>35-49 años</option>
                            <option>50-64 años</option>
                            <option>65 +</option>
                        </select>
                    </div>
                    <div class="body-col">
                        <span>Motivo de consulta:</span>
                        <textarea name="" id="ta-motivo" cols="30" rows="10"></textarea>
                    </div>
                    <div class="body-col">
                        <span>Enfermedad o problema actual:</span>
                        <textarea name="" id="ta-enfermedad" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="modal-buttons-container">
                        <button id="btn-continuar">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-diagnostico" class="modal-container">
        <div class="modal-background">
            <div id="modal" class="modal">
                <div class="modal-head">
                    <h2>Diagnóstico</h2>
                </div>
                <div class="modal-body">
                    <div class="body-row">
                        <span>Tipo:</span>
                        <select name="" id="select-tipo-diag">
                            <option>Presuntivo</option>
                            <option>Definitivo</option>
                        </select>
                    </div>
                    <div class="body-col">
                        <span>Descripción del diagnostico</span>
                        <textarea name="" id="ta-diag" cols="30" rows="8" maxlength="500"></textarea>
                    </div>
                    <div class="body-col">
                        <span>CIE</span>
                        
                        <select name="" id="select-cie">
                            <option>ESTOMATITIS ULCERATIVA NECROTIZANTE</option>
                            <option>askhdkjashdkj</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="modal-buttons-container">
                        <button id="btn-guardar-diag">Guardar</button>
                        <button id="btn-cancelar-diag">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-tratamiento" class="modal-container">
        <div class="modal-background">
            <div id="modal" class="modal">
                <div class="modal-head">
                    <h2>Tratamiento</h2>
                </div>
                <div class="modal-body">
                    <div class="body-row">
                        <span class="texto">Sesión:</span>
                        <span id="sesion-trat"></span>
                    </div>
                    <div class="body-row">
                        <span class="texto">Fecha:</span>
                        <input type="date" name="" id="fecha-trat" />
                    </div>
                    <div class="body-col">
                        <span class="texto">Diagnósticos y complicaciones</span>
                        <textarea name="" id="ta-diag-compli" cols="30" rows="8" maxlength="500"></textarea>
                    </div>
                    <div class="body-col">
                        <span class="texto">Procedimientos</span>
                        <textarea name="" id="ta-proc" cols="30" rows="8" maxlength="500"></textarea>
                    </div>
                    <div class="body-col">
                        <span class="texto">Prescripciones</span>
                        <textarea name="" id="ta-pres" cols="30" rows="8" maxlength="500"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="modal-buttons-container">
                        <button id="btn-guardar-trat">Guardar</button>
                        <button id="btn-cancelar-trat">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fin modals-->
    <aside id="sidebar" class="sidebar">
       @include('odontologia.plantillas.informacion')
    </aside>
    <div class="main-odo">
        @csrf
        <nav class="navbar">
            <div class="start-options">
                <i id="btn-menu" class="fas fa-bars fa-lg"></i>
            </div>
            
            <div class="end-options">
                <a href="{{ asset('assets/Certificado.docx') }}" download><i id="certificado" class="fas fa-file-download fa-lg"></i></a>
            </div>
        </nav>
        <div class="odo-container">
            <div class="container-button">
                <button type="button" id="btn-guardar-ficha">GUARDAR FICHA</button>
            </div>

            <div class="tabs-container">
                <ul class="tabs" id="tabs">
                    <li class="tabs-item active">General</li>
                    <li class="tabs-item">Indicadores</li>
                    <li class="tabs-item">Indices CPO-ceo</li>
                    <li class="tabs-item">Diagnósticos</li>
                    <li class="tabs-item">Tratamientos</li>
                    <li class="tabs-item">Odontograma</li>
                    <li class="tabs-item">Acta de cons...</li>
                </ul>
                <div class="panels">
                    <div class="panels-item active">
                        @include('odontologia.plantillas.general')
                    </div>
                    <div class="panels-item">
                        @include('odontologia.plantillas.indicadores')
                    </div>
                    <div class="panels-item">
                        @include('odontologia.plantillas.indices')
                    </div>
                    <div class="panels-item">
                        @include('odontologia.plantillas.diagnosticos')
                    </div>
                    <div class="panels-item">
                        @include('odontologia.plantillas.tratamientos')
                    </div>
                    <div class="panels-item">
                        @include('odontologia.plantillas.odontograma')
                    </div>
                    <div class="panels-item">
                        @include('odontologia.plantillas.acta')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>
    <script src="{{ asset('js/ficha.js') }}" type="module"></script>
    <script src="{{ asset('js/odo.js') }}" type="module"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>