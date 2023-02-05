@extends('layouts.app')
@section('title','Welcome Page')

@section('content')


@endsection

@section('script')

<script>

    const toggleClass= ()=>{

    const navBar = document.querySelector(".nav-bar");
    navBar.classList.toggle("active");

    }
</script>

@endsection
