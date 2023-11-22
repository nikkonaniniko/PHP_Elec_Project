<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<!-- header section starts -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="100px" src="images/logo.png"
                    alt="logo" /></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('games') }}">Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>


                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('show_cart') }}"><i class="bi bi-cart4"></i></a>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="nav-label">{{ Auth::user()->name }} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a href="{{ url('show_orders') }}">Orders</a></li>
                                    <li><a href={{ route('profile.show') }}>Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <input class="btn mx-2 py-2" type="submit" value="Logout">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                            </li>

                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- end header section -->
