@extends('layouts.app')

@section('title','Come Again')

@section('content')

<div class="row" style="width:100%;">

    <div class="col-md-8" style="margin:50px auto;">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif


        <div class="card border-secondary">



            <div class="card-header">
              Thank you so much!
            </div>
            <div class="card-body">
              <h5 class="card-title" style="margin-bottom:30px;">Come Again {{ auth()->user()->name }}</h5>
              <a href="{{ url('/store') }}" class="btn btn-success">Check out more Games</a>
            </div>
          </div>

    </div>
</div>




@endsection
