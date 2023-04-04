<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="bi bi-tv-fill" style="font-size:30px;"></i> Flix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                @guest
                @else
                <li class="nav-item">  <a href="{{ url('/store') }}" class="nav-link" href="#">Shop</a></li>
                @endguest
               

                  
                
            </ul>
           
            @guest

            @if(Route::has('login'))

            <a href="{{ route('login') }}" style="text-decoration:none; color:black;margin-left:5px; margin-right:5px;">Log In</a> 
            <i class="bi bi-box-arrow-in-left"></i>

            @endif


            @if(Route::has('register'))

            <a href="{{ route('register') }}" style="text-decoration:none; color:black;margin-left:10px; margin-right:5px;">Sign Up</a> 
            <i class="bi bi-person-circle"></i>

            @endif

            @else

                <a href="{{ url('/cart') }}" style="text-decoration:none; color:black;">Cart</a> 
                <span class="badge bg-dark text-white ms-1 rounded-pill"><livewire:frontend.cart-count/></span>

                @if(Auth::user()->role_as == 1)

                     <button class="btn btn-primary" style="margin-left:5px; color:white; padding:3px 10px"><a href="{{ url('admin/dashboard') }}" style="text-decoration:none; color:white;">Dash</a></button>
                

                @endif
               

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                                document.getElementById('logout-form').submit();"
                style="text-decoration:none; color:black;margin-left:5px; margin-right:5px;">Log Out</a> 
                <i class="bi bi-x-circle"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                


               
                

            @endguest
          
               
        </div>
    </div>
</nav>