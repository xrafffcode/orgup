<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @role('admin')
                        <span class="mr-2 d-none d-lg-inline text-gray-600">{{ Auth::user()->email }}</span>
                    @endrole
                    <i class="icon-md" data-feather="chevron-down"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle"
                                src="{{ url('https://cdn.iconscout.com/icon/free/png-256/free-avatar-370-456322.png?f=webp') }}"
                                alt="">
                        </div>
                        <div class="text-center">
                            @role('admin')
                                <span class="badge bg-danger">Admin</span>
                                <br>
                                <p class="tx-12 text-muted">
                                    {{ Auth::user()->email }}
                                </p>
                            @endrole
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link text-body m-0 p-0">
                                    <i class="me-2 icon-md" data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
