<nav class="navbar navbar-expand-lg shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand item" href="{{ url('/') }}" tabindex="0" title="Connor Owen Guitar Logo and Linked Index" aria-lable="Connor Owen Guitar Logo and Linked Index">
                    <img src="images/logo.png" alt="Connor Owen Guitar Logo" class"nav-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item lft lft1">
                            <a href="/home" tabindex="1" title="Home - Connor Owen Guitar" aria-label="Home - Connor Owen Guitar" class="nav-link item">
                                Home
                            </a>
                        </li>
                        <li class="nav-item lft">
                            <a href="/tuition" tabindex="2" title="Tuition - Connor Owen Guitar" aria-label="Tuition - Connor Owen Guitar" class="nav-link item">
                                Tuition
                            </a>
                        </li>
                        <li class="nav-item lft">
                            <a href="/contact" tabindex="3" title="Contact - Connor Owen Guitar" aria-label="Contact - Connor Owen Guitar" class="nav-link item">
                                Contact
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item rhs">
                                    <a class="nav-link item" tabindex="4" href="{{ route('login') }}">{{ __('Admin Login') }}</a>
                                </li>
                            @endif

                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" tabindex="5" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end text-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="/admin">Admin Dashboard</a>
                                    </li>
                                    <li><hr></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>