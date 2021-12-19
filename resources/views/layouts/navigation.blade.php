<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" data-widget="pushmenu" role="button" class="nav-link"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit()">
                <i class="fas fa-sign-out-alt"></i>
            </a>
            <form action="{{route('logout')}}" method="post" id="form-logout">
                @csrf
            </form>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{auth()->user()->hasRole('Admin') ? route('admin.index') : route('teacher.index')}}" class="brand-link d-flex">
        <span class="brand-image align-self-center">CE</span>
        <span class="brand-text font-weight-light">Cronograma Escolar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(auth()->user()->hasRole('Admin'))
                    <li class="nav-item">
                        <a href="{{route('admin.index')}}" class="nav-link {{request()->routeIs('admin.index') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.teachers.index')}}" class="nav-link {{request()->routeIs('admin.teachers.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Professores
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.events.index')}}" class="nav-link {{request()->routeIs('admin.events.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Eventos
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.teams.index')}}" class="nav-link {{request()->routeIs('admin.teams.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Turmas
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.holidays.index')}}" class="nav-link {{request()->routeIs('admin.holidays.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Calendário anual
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{route('teacher.index')}}" class="nav-link {{request()->routeIs('teacher.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Turmas
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
