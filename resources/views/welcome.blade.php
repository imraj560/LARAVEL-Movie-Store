@extends('layouts.app')
@section('title','Movie Store')

@section('content')

<div id="banner">

    <div id="text_banner">
        <h1>Moana, daughter of chief Tui, embarks on a journey to return the heart of goddess Te Fitti from Maui, a demigod</h1>
        <button class="btn btn-primary" id="shop_button"><a href="{{ url('/store') }}" style="text-decoration:none; color:white;"><i class="bi bi-house"></i> Shop</a></button>
    </div>

</div>



<div class="row" id="animations">

    <h4>Popular Animations</h4>

    @forelse ($movies_animation as $movie)

   

        <div class="col-md col-sm-6 col-xl-2 col-lg-4" id="animation_col">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ $movie->image }}" alt="Card image cap">
                <div class="card-body" style="background:black; color:white;">
                  <p class="card-text">{{ $movie->name }} : RM {{ $movie->price }}</p>
                </div>
              </div>
        </div>


        
    @empty
        
    @endforelse
   
</div>


<div class="row" id="soon">

    <h4>Coming Soon</h4>

    @forelse ($movies_soon as $soon)

   

        <div class="col-xl-4 col-lg-4 col-md col-sm-6" id="soon_col">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ $soon->image }}" alt="Card image cap">
                <div class="card-body" style="background:black; color:white;">
                  <p class="card-text">{{ $soon->name }} : RM {{ $soon->price }}</p>
                </div>
              </div>
        </div>


        
    @empty
        
    @endforelse
   
</div>


<div class="row" id="thrillers">

    <h4>Thrillers</h4>

    @forelse ($movies_thrillers as $thriller)

   

        <div class="col-md col-sm-6 col-xl-2 col-lg-4" id="thrillers_col">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ $thriller->image }}" alt="Card image cap">
                <div class="card-body" style="background:black; color:white;">
                  <p class="card-text">{{ $thriller->name }} : RM {{ $movie->price }}</p>
                </div>
              </div>
        </div>


        
    @empty
        
    @endforelse
   
</div>










@endsection


