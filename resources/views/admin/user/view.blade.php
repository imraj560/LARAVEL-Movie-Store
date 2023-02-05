@extends('layouts.admin');

@section('title','View Users')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <div class="card">

        <div class="card-header">
         View Users
         <a href="{{ url('admin/user/create') }}" class="btn btn-primary btn-sm text-white float-end text-white">Add User</a>
        </div>

        <div class="card-body">

            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)

                     <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role_as == '0' ? 'User' : 'Admin' }}</td>
                        <td>
                            @if($user->role_as == '1')

                              <button class="btn btn-danger btn-xs" style="color:white">
                              <a style="color:white;" onclick="return confirm('Sure you want to Delete?')" href="{{ url('admin/user/destroy/'.$user->id) }}">Delete</a>
                            </button>
                            <button class="btn btn-primary btn-xs" style="color:white">
                                <a style="color:white;" href="{{ url('admin/user/edit/'.$user->id) }}">Edit</a>
                             </button>

                            @else

                            <button class="btn btn-info btn-xs">No Auth</button>

                            @endif

                        </td>
                    </tr>

                    @empty

                    @endforelse

                </tbody>
            </table>

            {{ $users->links() }}

        </div>
      </div>
    </div>
  </div>



@endsection
