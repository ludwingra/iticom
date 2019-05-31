 <!-- Sidebar Menu -->
 <ul class="sidebar-menu" data-widget="tree">
    <li class="header">Navegación</li>
    <!-- Optionally, you can add icons to the links -->
    
    <li {{ request()->is('admin/users*') ? 'class=active' : '' }}>
        <a href="{{ route('user.index') }}">
            <i class="fa fa-user"></i> <span>Usuarios</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Oredenes de trabajo</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="#">Ordenes de trabajo</a>
            </li>
            <li>
                <a href="#">Crear Orden de trabajo</a>
            </li>
        </ul>
    </li>

    <li class="">
        <a href="#"><i class="fa fa-link"></i> <span>Link</span></a>
    </li>
    <li>
        <a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a>
    </li>
</ul>
<!-- /.sidebar-menu -->