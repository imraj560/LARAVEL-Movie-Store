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
              <label>Total Orders</label>
              <h4></h4>
              <a  class="text-white">View</a>
            </div>

          </div>

          <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
              <label>Today Order</label>
              <h4></h4>
              <a  class="text-white">View</a>
            </div>

          </div>

          <div class="col-md-3">
            <div class="card card-body bg-warning text-white mb-3">
              <label>This Month Order</label>
              <h4></h4>
              <a  class="text-white">View</a>
            </div>

          </div>

          <div class="col-md-3">
            <div class="card card-body bg-danger text-white mb-3">
              <label>This Year Order</label>
              <h4></h4>
              <a  class="text-white">View</a>
            </div>

          </div>
       </div>
    </div>
  </div>

@endsection
