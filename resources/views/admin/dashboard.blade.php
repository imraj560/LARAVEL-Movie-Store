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

       <div class="row">
        <canvas id="myChart"></canvas>
       </div>
    </div>
  </div>

@endsection

@section('scripts')

<script>
  const ctx = document.getElementById('myChart');

  var labels =  {{ Js::from($labels) }};
  var data =  {{ Js::from($data) }};

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'orders',
        data: data,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@endsection
