<nav class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('app/images/orgup.png') }}" class="sidebar-brand" width="60">
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>

            @can('dashboard-view')
                <li class="nav-item {{ request()->is('admin/dashboard') ? ' active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
            @endcan

            @can('course-list')
                <li class="nav-item {{ request()->is('admin/course*') ? ' active' : '' }}">
                    <a href="{{ route('admin.course.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Kelas</span>
                    </a>
                </li>
            @endcan

            @can('article-list')
                <li class="nav-item {{ request()->is('admin/article*') ? ' active' : '' }}">
                    <a href="{{ route('admin.article.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Artikel</span>
                    </a>
                </li>
            @endcan

            @can('account-management')
                <li
                    class="nav-item {{ request()->is('admin/permission*', 'admin/role*', 'admin/instructor*', 'admin/student*') ? ' active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#account-management" role="button"
                        aria-expanded="{{ request()->is('admin/permission*', 'admin/role*', 'admin/instructor*', 'admin/student*') ? 'true' : 'false' }}">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Manajemen Akun</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->is('admin/permission*', 'admin/role*', 'admin/instructor*', 'admin/student*') ? 'show' : '' }}"
                        id="account-management">
                        <ul class="nav sub-menu">
                            @can('instructor-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.instructor.index') }}"
                                        class="nav-link {{ request()->is('admin/instructor*') ? ' active' : '' }}">
                                        Instruktur
                                    </a>
                                </li>
                            @endcan
                            @can('student-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.student.index') }}"
                                        class="nav-link {{ request()->is('admin/student*') ? ' active' : '' }}">
                                        Siswa
                                    </a>
                                </li>
                            @endcan
                            @can('permission-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permission.index') }}"
                                        class="nav-link {{ request()->is('admin/permission*') ? ' active' : '' }}">
                                        Permission
                                    </a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.role.index') }}"
                                        class="nav-link {{ request()->is('admin/role*') ? ' active' : '' }}">
                                        Role
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
        </ul>
    </div>
</nav>
