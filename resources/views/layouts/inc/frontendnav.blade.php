 <header>
            <div class="logo_space"><a style="text-decoration: none;" href="{{ url('/') }}"><img src="{{ asset('uploads/movies/movie_logo.png') }}" height="80px" width="70px" /></a></div>
            <div class="hamburger" onclick="toggleClass()">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <nav class="nav-bar">
                <ul>
                    @guest

                        @if(Route::has('login'))

                        <li><a href="{{ route('login') }}">Login</a></li>

                        @endif

                        @if(Route::has('register'))

                        <li><a href="{{ route('register') }}">Register</a></li>

                        @endif

                    @else

                        <li><a href="">Hi, {{ Auth::user()->name }}</a></li>
                        <li><a href="">Store</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">

                                LogOut</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                        </li>

                    @endguest


                </ul>
            </nav>
        </header>
