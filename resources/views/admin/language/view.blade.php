@extends('layouts.admin')

@section('title','View Language')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <div class="card">

        <div class="card-header">
         Languages

         <a href="{{ url('admin/language/create') }}" class="btn btn-primary btn-sm text-white float-end text-white">Add Language</a>
        </div>

        <div class="card-body">

            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($languages as $language)

                     <tr>
                        <td>{{ $language->name }}</td>
                        <td>{{ $language->status == '0' ? 'Active' : 'Not Active' }}</td>
                        <td>
                            <button class="btn btn-danger btn-xs" style="color:white">
                                <a href="{{ url('admin/language/delete/'.$language->id) }}" style="text-decoration: none; color:white;" onclick="return confirm('Are you Sure?')" href="">Remove</a>
                            </button>
                        </td>
                    </tr>

                    @empty

                    @endforelse

                </tbody>
            </table>

            {{ $languages->links() }}

        </div>
      </div>
    </div>
  </div>

@endsection
