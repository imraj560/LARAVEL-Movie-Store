@extends('layouts.admin')

@section('title','View Genre')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <div class="card">

        <div class="card-header">
         Genre

         <a href="{{ url('admin/genre/create') }}" class="btn btn-primary btn-sm text-white float-end text-white">Add Genre</a>
        </div>

        <div class="card-body">

            <table class="table table-stripped">
                <thead>
                    <th>Name</th>
                    <th>Status</th>
                </thead>



                <tbody>

                    @forelse ($genres as $genre)

                        <tr>
                            <td>{{ $genre->name }}</td>
                            <td>{{ $genre->status == '1' ? 'Not Active' : 'Active' }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm">
                                    <a href="{{ url('admin/genre/delete/'.$genre->id) }}" style="text-decoration: none; color:white;" onclick="return confirm('Sure You want to delete?')" href="">Delete</a>
                                </button>
                            </td>
                        </tr>
                    @empty

                    @endforelse


                </tbody>

            </table>


            {{ $genres->links() }}

        </div>
      </div>
    </div>
  </div>

@endsection
