<div>
    @foreach ($movies as $movie )

<div class="container" id="product_container">
    <div class="row" style="height:70vh; margin-bottom:40px; padding:0px 70px;">

        <div class="col">
            <h1>{{ $movie->name }}</h1>
            <h5>Description</h5>
            <p style="line-height: 28px;">
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
                The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                 content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                  their default model text, and a search for 'lorem ipsum'
                 will uncover many web sites still in their infancy. Various 
                 versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            </p>
            <button wire:click='addCart({{ $movie->id }})' style="margin-top:5px; border:none; border-radius:5px" class="btn btn-danger" w-100>Add to Cart</button>
            <a href="{{ url('/store') }}" style="text-decoration:none"><button class="btn btn-success">Check Store</button></a>
        </div>

        <div class="col">
            <div class="card" style="height:70vh;">
                <img class="card-img-top" style="height: 65vh" src="{{ asset($movie->image) }}" alt="Card image cap">
                <div class="card-body" style="background:black; color:white;">
                  <p class="card-text">{{ $movie->name }} : RM {{ $movie->price }}</p>
                </div>
              </div>
        </div>

    </div>
</div>
    
@endforeach

    <div class="row" style="text-align:left; margin-bottom:100px; padding:0px 40px;">
        <h3>Latest releases</h3>
        @foreach ($latestMovies as $latestMovie )

        <div class="col">
            <a href="{{ url('/product_view/'.$latestMovie->id) }}" style="text-decoration: none;">
            <div class="card" style="height:70vh;">
                <img class="card-img-top" style="height: 65vh" src="{{ asset($latestMovie->image) }}" alt="Card image cap">
                <div class="card-body" style="background:black; color:white;">
                  <p class="card-text">{{ $latestMovie->name }} : RM {{ $latestMovie->price }}</p>
                </div>
              </div>
            </a>  
        </div>
            
        @endforeach
    </div>    
</div>
