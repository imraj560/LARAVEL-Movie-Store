@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <h2>{{ session('message') }}</h2>
      @endif
      <div class="me-md-3 me-xl-5">
          <h2>Dashboard</h2>
         <hr>
       </div>
       <div class="row">
          <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
              <label>Total Orders: {{ $orders }}</label>
              <h4></h4>
              <a href="{{ url('admin/order/view') }}" class="text-white">View</a>
            </div>

          </div>

          <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
              <label>Today Movies: {{ $movies }}</label>
              <h4></h4>
              <a href="{{ url('admin/movie/view') }}" class="text-white">View</a>
            </div>

          </div>
       </div>
    </div>
  </div>

@endsection
