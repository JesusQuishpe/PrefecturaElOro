<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Peso</th>
            <th>Editar</th>
            <th>Imprimir</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->apellido}}</td>
            <td>{{$cliente->fecha_nac}}</td>
            <td>{{$cliente->peso}}</td>
            <td><a class="edit" href="javascript:void(0);" data-id="{{ $cliente->id}}">Editar</a></td>
            <td><a class="imprimir" target="_blank" href="../ReportesPDF.php">imprimir</a></td>
            <td><a class="delete" href="javascript:void(0);" data-id="{{ $cliente->id}}">Borrar</a></td>
        </tr>
        @endforeach
        
    </tbody>
</table>
