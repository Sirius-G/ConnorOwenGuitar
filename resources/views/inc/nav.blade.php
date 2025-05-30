<nav class="navbar navbar-expand-md shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand item" href="{{ url('/') }}" tabindex="0" title="Connor Owen Guitar Logo and Linked Index" aria-lable="Connor Owen Guitar Logo and Linked Index">
                    <img src="images/logo.png" alt="Connor Owen Guitar Logo" height="60px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item lft lft1">
                            <a href="/" tabindex="1" title="Bio - Connor Owen Guitar" aria-label="Bio - Connor Owen Guitar" class="nav-link item">
                                Bio
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
                                <a id="navbarDropdown" tabindex="5" class="nav-link dropdown-toggle" href="/admin" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/admin">Admin Dashboard</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>