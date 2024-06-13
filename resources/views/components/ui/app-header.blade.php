<header id="react-header" class="react-header">
    <div class="menu-part">
        <div class="container">
            <!--================= Menu Start Here =================-->
            <div class="react-main-menu">
                <nav>
                    <!--================= Menu Toggle btn =================-->
                    <div class="menu-toggle">
                        <div class="logo">
                            <a href="{{ route('app.landing') }}" class="logo-text">
                                <img src="{{ asset('app/images/orgup.png') }}" alt="logo" width="80">
                            </a>
                        </div>
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!--================= Menu Structure =================-->
                    <div class="react-inner-menus">
                        <ul id="backmenu" class="react-menus home react-sub-shadow">
                            <li>
                                <a href="{{ route('app.landing') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('app.course.index') }}">Kelas</a>
                            </li>
                            <li>
                                <a href="{{ route('app.instructor.index') }}">Instruktur</a>
                            </li>
                            <li>
                                <a href="{{ route('app.article.index') }}">Artikel</a>
                            </li>
                            <li>
                                <a href="{{ route('app.about') }}">Tentang OrgUp</a>
                            </li>
                        </ul>
                        <div class="searchbar-part">
                            @auth
                                <div class="react-login">
                                    @role('student')
                                        <a href="{{ route('student.dashboard') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>{{ Auth::user()->profile()->name }}
                                        </a>
                                    @else
                                        <a href="{{ route('admin.dashboard') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>{{ Auth::user()->profile()->name }}
                                        </a>
                                    @endrole

                                    <a style="margin-left: 20px;" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-power">
                                            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                            <line x1="12" y1="2" x2="12" y2="12"></line>
                                        </svg>
                                        Keluar
                                    </a>
                                </div>
                            @else
                                <div class="react-login">
                                    <a href="{{ route('login') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>Masuk</a>

                                    <a href="{{ route('register') }}" style="margin-left: 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user-plus">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg>
                                        Daftar
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </nav>
            </div>
            <!--=================  Menu End Here  =================-->
        </div>
    </div>
</header>
