@extends('layouts.app')
@section('title','Movie Store')

@section('content')

<div id="banner">

    <div id="text_banner">
        <h1><span style="font-size:60px;">Moana</span>, daughter of chief Tui, embarks on a journey to return the heart of goddess Te Fitti from Maui, a demigod</h1>
        <button class="btn btn-default" id="shop_button"><a href="{{ url('/store') }}" style="text-decoration:none; color:black;"><i class="bi bi-house"></i> Shop</a></button>
    </div>

</div>

<div class="row" id="services">
    <h1>Explore</h1>
    <p>Buy contents on high definition, we have all kinds of TV series and upcoming movies</p>

    <div class="col-12 col-lg-4">
        <i class="bi bi-badge-hd-fill"></i>
        <p>High Definition Stream</p>
    </div>
    <div class="col-12 col-lg-4">
        <i class="bi bi-hdd-network"></i>
        <p>Fast Servers</p>
    </div>
    <div class="col-12 col-lg-4">
        <i class="bi bi-tv-fill"></i>
        <p>Multiple Screens</p>
    </div>  
      

</div>



<div class="row" id="animations">

    <h4>Popular Animations</h4>

    @forelse ($movies_animation as $movie)

   

        <div class="col" id="animation_col">
            <a href="{{ url('/product_view/'.$movie->id) }}" style="text-decoration: none;">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ $movie->image }}" alt="Card image cap">
                <div class="card-body" style="background:black; color:white;">
                  <p class="card-text">{{ $movie->name }} : RM {{ $movie->price }}</p>
                </div>
              </div>
            </a>
            
        </div>


        
    @empty
        
    @endforelse
   
</div>





<div class="row" id="thrillers">

    <h4>Thrillers</h4>

    @forelse ($movies_thrillers as $thriller)

   

        <div class="col-md col-sm-6 col-xl-2 col-lg-4" id="thrillers_col">
            <a href="{{ url('/product_view/'.$thriller->id) }}" style="text-decoration: none;">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ $thriller->image }}" alt="Card image cap">
                <div class="card-body" style="background:black; color:white;">
                  <p class="card-text">{{ $thriller->name }} : RM {{ $thriller->price }}</p>
                </div>
              </div>
            </a> 
        </div>


        
    @empty
        
    @endforelse
   
</div>

<div class="row" id="customer">
    <h1>Happy Customers</h1>
    <p>Our Viewers are very happy with our services and content</p>

    <div class="col-12 col-lg-4">
        <div class="text-center">
            <img src="{{ asset('uploads/movies/profile1.jpeg') }}" width="100px" class="rounded-circle" alt="...">
          </div>
        <p>They alaways seem to have the latest content and its available on all platforms</p>
    </div>
    <div class="col-12 col-lg-4">
        <div class="text-center">
            <img src="{{ asset('uploads/movies/profile2.jpg') }}" width="100px"  class="rounded-circle" alt="...">
          </div>
        <p>They have pretty fast servers, the streaming is alaways smooth fast</p>
    </div>
    <div class="col-12 col-lg-4">
        <div class="text-center">
            <img src="{{ asset('uploads/movies/profile3.jpg') }}" width="100px"  class="rounded-circle" alt="...">
          </div>
        <p>I have alaways loved the quality of the Content provided</p>
    </div>  
      

</div>




<div class="row" id="soon">

    <h4>Coming Soon</h4>

    @forelse ($movies_soon as $soon)

   

        <div class="col-xl-4 col-lg-4 col-md col-sm-6" id="soon_col">
            <a href="{{ url('/product_view/'.$soon->id) }}" style="text-decoration: none;">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ $soon->image }}" alt="Card image cap">
                <div class="card-body" style="background:black; color:white;">
                  <p class="card-text">{{ $soon->name }} : RM {{ $soon->price }}</p>
                </div>
              </div>
            </a>  
        </div>


        
    @empty
        
    @endforelse
   
</div>

<div class="row" id="customer" style="margin-bottom: 50px">
    <h1>We Represent</h1>
    <p>We stream and sell content from popular content creators</p>

    <div class="col-12 col-lg-3">
        <div class="text-center">
            <img src="{{ asset('uploads/movies/netflix.png') }}" width="90px" height="70px" alt="...">
          </div>
        <p>Netflix</p>
    </div>
    <div class="col-12 col-lg-3">
        <div class="text-center">
            <img src="{{ asset('uploads/movies/prime.png') }}" width="100px" height="70px" class="rounded-circle" alt="...">
          </div>
        <p>Amazon Prime</p>
    </div>
    <div class="col-12 col-lg-3">
        <div class="text-center">
            <img src="{{ asset('uploads/movies/movie_logo.png') }}" width="100px" height="80px" alt="...">
          </div>
        <p>Fox Pictures</p>
    </div>  

    <div class="col-12 col-lg-3">
        <div class="text-center">
            <img src="{{ asset('uploads/movies/hbo.png') }}" width="100px" height="80px" alt="...">
          </div>
        <p>HBO</p>
    </div>  
      

</div













@endsection


