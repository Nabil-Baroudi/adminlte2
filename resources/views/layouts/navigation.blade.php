<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block" title="edit profile">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @can('cpanel')
                <li class="nav-item">
                    <a href="/cpanel" class="nav-link">
                        <i class="nav-icon fa fa-user-circle"></i>
                        <p>
                            {{ __('Admin Panel') }}
                        </p>
                    </a>
                </li>
            @endcan
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="/appointments" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('Dashboard') }}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/addAppointment" class="nav-link">
                            <i class="nav-icon fa fa-plus-square"></i>
                            <p>
                                Add Appointment
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
