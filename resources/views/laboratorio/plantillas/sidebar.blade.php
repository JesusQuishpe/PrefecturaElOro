<aside>
    <div class="logo-container">
        <span class="logo-text">Laboratorio</span>
    </div>
    <ul class="menu">
        <li class="menu-separator-text">Tipos de examen</li>
        <li>
            <div class="item">Bioquímica Sanguinea</div>
            <ul class="submenu" tipo="Bioquimica">
                <li action="Nuevo"><a href="{{ route('bioquimica.nuevo') }}">Nuevo</a></li>
                <li action="Editar"><a href="{{ route('bioquimica.editar') }}">Editar</a></li>
                <li action="Todos"><a href="{{ route('bioquimica.todos') }}">Todos los resultados</a></li>
            </ul>
        </li>
        <li>
            <div class="item">Coprologia para EDA</div>
            <ul class="submenu" tipo="Coprologia">
                <li action="Nuevo"><a href="{{ route('coprologia.nuevo') }}">Nuevo</a></li>
                <li action="Editar"><a href="{{ route('coprologia.editar') }}">Editar</a></li>
                <li action="Todos"><a href="{{ route('coprologia.todos') }}">Todos los resultados</a></li>
            </ul>
        </li>
        <li>
            <div class="item">Coproparasitario</div>
            <ul class="submenu">
                <li action="Nuevo"><a href="{{ route('coproparasitario.nuevo') }}">Nuevo</a></li>
                <li action="Editar"><a href="{{ route('coproparasitario.editar') }}">Editar</a></li>
                <li action="Todos"><a href="{{ route('coproparasitario.todos') }}">Todos los resultados</a></li>
            </ul>
        </li>
        <li>
            <div class="item">Examen de orina</div>
            <ul class="submenu">
                <li action="Nuevo"><a href="{{ route('examen-orina.nuevo') }}">Nuevo</a></li>
                <li action="Editar"><a href="{{ route('examen-orina.editar') }}">Editar</a></li>
                <li action="Todos"><a href="{{ route('examen-orina.todos') }}">Todos los resultados</a></li>
            </ul>
        </li>
        <li>
            <div class="item">HelicoBacter Pylori IgG Heces</div>
            <ul class="submenu">
                <li>Nuevo</li>
                <li>Editar</li>
                <li>Todos los resultados</li>
            </ul>
        </li>
        <li>
            <div class="item">HelicoBacter Pylori IgG</div>
            <ul class="submenu">
                <li>Nuevo</li>
                <li>Editar</li>
                <li>Todos los resultados</li>
            </ul>
        </li>
        <li>
            <div class="item">Hematología</div>
            <ul class="submenu">
                <li>Nuevo</li>
                <li>Editar</li>
                <li>Todos los resultados</li>
            </ul>
        </li>
        <li>
            <div class="item">Hemoglobina glicosilada</div>
            <ul class="submenu">
                <li>Nuevo</li>
                <li>Editar</li>
                <li>Todos los resultados</li>
            </ul>
        </li>
        <li>
            <div class="item">Prueba de embarazo</div>
            <ul class="submenu">
                <li>Nuevo</li>
                <li>Editar</li>
                <li>Todos los resultados</li>
            </ul>
        </li>
        <li>
            <div class="item">Pruebas tiroideas</div>
            <ul class="submenu">
                <li>Nuevo</li>
                <li>Editar</li>
                <li>Todos los resultados</li>
            </ul>
        </li>
        <li class="menu-separator-text">Otros</li>
        <li class="item">Historial</li>
    </ul>
</aside>