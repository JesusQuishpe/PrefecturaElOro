<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Area</th>
            <th>Fecha de Nacimiento</th>
            <th>Tratante</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->clientes as $cliente):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $cliente['id']; $Doc=$_GET['a'];?></td>
                <td><?php echo $cliente['nombre'];?></td>
                <td><?php echo $cliente['apellido'];?></td>
                <td><?php echo $cliente['fecha_nac'];?></td>
                <td><?php echo $cliente['peso'];?></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $cliente['id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>