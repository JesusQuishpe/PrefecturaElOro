<div id="content-sidebar">
    <input type="hidden" id="cedula" value="{{$datos->cedula}}">
    <h1>ODONTOLOGIA</h1>
    <img id="dental-logo" src="{{ asset('images/dental-logo.jpg') }}" alt="">
    <h4>INFORMACIÓN DEL PACIENTE</h4>
    <table id="info">
        <tr>
            <td>Nombre:</td>
            <td id="nombres">{{$datos->nombres}}</td>
        </tr>
        <tr>
            <td>Apellidos:</td>
            <td id="apellidos">{{$datos->apellidos}}</td>
        </tr>
        <tr>
            <td>Sexo:</td>
            <td id="sexo">{{$datos->sexo}}</td>
        </tr>
        <tr>
            <td>Edad:</td>
            <td id="edad">22 años</td>
        </tr>
    </table>
    <h4>SIGNOS VITALES</h4>
    <table id="signos">
        <tr>
            <td>Presión:</td>
            <td id="presion">{{$datos->presion}}</td>
        </tr>
        <tr>
            <td>Estatura:</td>
            <td id="estatura">{{$datos->estatura}}</td>
        </tr>
        <tr>
            <td>Temperatura:</td>
            <td id="temperatura">{{$datos->temperatura}}</td>
        </tr>
        <tr>
            <td>Peso:</td>
            <td id="peso">{{$datos->peso}}</td>
        </tr>
    </table>
</div>