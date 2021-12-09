<h1 id="pacientes-title">Pacientes en espera</h1>
<table id="tb-pacientes">
    <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Sexo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pacientes as $pac)
            <tr>
                <input type='hidden' id_pac={{ $pac->num }}>
                <td>{{ $pac->cedula }}</td>
                <td>{{ $pac->nombres }}</td>
                <td>{{ $pac->apellidos }}</td>
                <td>{{ $pac->sexo }}</td>
                <td>
                    <form class="inline-block" action="{{ route('NuevaFicha', ['idOdo' => $pac->idOdo]) }}" target="_blank" method="GET">
                        <button class="link" type="submit">Nuevo</button>
                    </form>
                    
                    <form class="inline-block" action="{{ route('OdoDelete', ['idOdo' => $pac->idOdo]) }}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <button class="link" type="submit">Quitar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
