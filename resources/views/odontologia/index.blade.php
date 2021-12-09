<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/cb939f18a3.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('scss/odontologia/odontologia.css') }}">
</head>

<body>
    @csrf
    <aside class="sidebar">
        <div class="logo-content">
            
            <div class="logo-img">
                <img src="{{ asset('images/imagen_prefecto.png') }}" alt="">
            </div>
        </div>
        <ul id="options">
            <li class="option active">
                <i class="fas fa-users"></i>
                <span>Pacientes</span>
            </li>
            <li class="option">
                <i class="fas fa-clipboard-list"></i>
                <span>Historiales</span>
            </li>
        </ul>
    </aside>
    <main class="main">
        
        <div class="panels">
            
            <div class="panels-item active">
                @include('odontologia.plantillas.pacientes')
            </div>
            <div class="panels-item">
                @include('odontologia.plantillas.historiales')
            </div>
        </div>
    </main>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="{{ asset('js/odontologia.js') }}" type="module"></script>
</body>

</html>
