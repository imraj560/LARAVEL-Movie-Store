@extends('layouts.admin')

@section('title','Create User')

@section('content')

<div class="row">
    <div class="col-md-6 grid-margin" style="margin:0 auto;">
      @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <div class="card">

        <div class="card-header">
         Create User
        
        </div>

        <div class="card-body">

            <form method="post" action="{{ url('admin/user/store') }}">

                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                     @error('name')
                          <span style="color:red; font-size:15px;">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="name" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                     @error('email')
                          <span style="color:red; font-size:15px;">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="name" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="">
                     @error('password')
                          <span style="color:red; font-size:15px;">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="name" class="form-label">User Role</label>
                    <select class="form-control" id="role_as" name="role_as">
                        <option value="">Choose a Role</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                      </select>
                     @error('role_as')
                          <span style="color:red; font-size:15px;">{{ $message }}</span>
                      @enderror
                  </div>

                  <button type="submit" class="btn btn-success w-100">Create User</button>



            </form>


        </div>
      </div>
    </div>
  </div>




@endsection
