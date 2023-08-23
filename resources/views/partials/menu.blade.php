<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menú</h3>
        <ul class="nav side-menu">
            @if(auth()->user()->getTipo->description == 'admin')
            <li>
                <a href="javascript:void(0)" onclick="generarToken();"> 
                    <i class="fa fa-gears"></i> 
                    Generar Token 
                    </a>
            </li>
            <li>
                <a href="{{url('/home')}}"><i class="fa fa-home"></i> Activos</a> 
            </li>
            <li>
                <a href="{{url('movimientosActivos')}}"><i class="fa fa-exchange"></i>Lista de Movimientos</a>
            </li>
            <li>
                <a href="{{url('usuarios')}}"><i class="fa fa-users"></i>Listar Usuarios</a>
            </li>
            <li>
                <a href="{{url('usuarios/create')}}"><i class="fa fa-users"></i>Crear Usuarios</a>
            </li>
            
            @endif
            <li>
                <a href="{{url('usuarios/'.auth()->user()->id)}}"><i class="fa fa-table"></i>Ir a mi Perfil</a>
            </li>
        </ul>
    </div>  
</div>


