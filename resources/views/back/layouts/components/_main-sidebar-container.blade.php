<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link text-black navbar-white">
        <img src="{{ asset_own('back/img/alek-favicion5v.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text"><span style="color: #005dae">Akasi</span><span
                style="color: #ff0e0d">LearningKey</span></span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset_own('back/img/placeholder.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="@if(Auth::user()->hasRole('Instructor')) {{route('instructors.edit', ['id'=> Auth::user()->id])}} @else javascript:void(0); @endif" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link @if ($page_code[0]=='dash2023') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item @if ($page_code[0]=='trainings') menu-open @endif">
                    <a href="#" class="nav-link @if ($page_code[0]=='trainings') active @endif">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                            Trainings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item @if ($page_code[1]=='courses') menu-open @endif">
                            <a href="{{route('courses.index')}}" class="nav-link @if ($page_code[1]=='courses') active @endif">
                                <i class="fas fa-hand-point-right nav-icon"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                        <li class="nav-item @if ($page_code[1]=='schedules') menu-open @endif">
                            <a href="{{route('schedules.index')}}" class="nav-link @if ($page_code[1]=='schedules') active @endif">
                                {{-- <i class="far fa-circle nav-icon"></i> --}}
                                <i class="fas fa-hand-point-right nav-icon"></i>
                                <p>Schedules</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->hasRole('Admin'))
                    <li class="nav-item @if ($page_code[0]=='settings') menu-open @endif">
                        <a href="#" class="nav-link @if ($page_code[0]=='settings') active @endif">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item @if ($page_code[1]=='users') menu-open @endif">
                                <a href="{{route('users.index')}}" class="nav-link @if ($page_code[1]=='users') active @endif">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item @if ($page_code[1]=='topics') menu-open @endif">
                                <a href="{{route('training_topics.index')}}" class="nav-link @if ($page_code[1]=='topics') active @endif">
                                    <i class="fas fa-hand-point-right nav-icon"></i>
                                    <p>Training Topics</p>
                                </a>
                            </li>
                            <li class="nav-item @if ($page_code[1]=='categories') menu-open @endif">
                                <a href="{{route('courses.categories.index')}}" class="nav-link @if ($page_code[1]=='categories') active @endif">
                                    <i class="fas fa-hand-point-right nav-icon"></i>
                                    <p>Courses Categories</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-header">Action</li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="logout(event);">
                    <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                    <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
