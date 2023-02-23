@extends('layouts.app')
@section('title','Welcome Page')

@section('content')
<div class="banner">
    <div class="banner-item">
        <h1>Be the First to buy before stock lasts</h1>
        @guest
              <button class="btn btn-primary login_button"><a href="{{ route('login') }}" style="text-decoration:none; color:black; font-weight:500;">Login</a></button>

        @else

          <button class="btn btn-primary login_button"><a href="{{ url('/store') }}" style="text-decoration:none; color:black; font-weight:500;">Store</a></button>

        @endguest



    </div>
</div>

@endsection

@section('script')

<script>

    const toggleClass= ()=>{

    const navBar = document.querySelector(".nav-bar");
    navBar.classList.toggle("active");

    }
</script>

@endsection
